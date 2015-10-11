<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{	
public function isAuthorized($user)
{
    // All registered users can add articles
    if (in_array($this->request->action,['postjob','apply','posted','applied','getjob'])) {
        return true;
    }
    // The owner of an job can edit and delete it
    if (in_array($this->request->action, ['edit', 'delete'])) {
        $jobId = (int)$this->request->params['pass'][0];
        if ($this->Jobs->isOwnedBy($jobId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$query = $this->Jobs->find('all')->where(['status'=>1]);
        $this->set('jobs', $this->paginate($query));
        $this->set('_serialize', ['jobs']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method 
     * Allows logged in administrators to post jobs
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        //$hirers = $this->Jobs->Hirers->find('list', ['limit' => 200]);
        //$appliers = $this->Jobs->Appliers->find('list', ['limit' => 200]);
        $this->set(compact('job'));
        $this->set('_serialize', ['job']);
    }
	/**
	* Postjob method
	* Allows logged in members to post a new job
	*/
	public function postjob()
	{
		$lastjob = $this->Jobs->find('all', [
			'order' => ['id' => 'DESC'],'limit'=>1
		])->all();
		//$lastjob = $jobs->first();
		$this->set(compact('lastjob'));
		$last_job = $lastjob->first();
		//$this->set('_serialize',['lastjob']);
        $job = $this->Jobs->newEntity();
		// In a controller or table method.
			//$data['Jobs']['Hirers']['users_id'] = $this->userid;
			//$data['Jobs']['Hirers']['jobs_id'] = $last_job['id'];
			$job = $this->Jobs->patchEntity($job, $this->request->data);
			$jobhirer = $this->Jobs->Hirers->newEntity();
			$jobhirer->users_id = $this->userid;
			$jobhirer->jobs_id = $last_job['id']+1;
			//$job->Hirers = $jobhirer;
        if ($this->request->is('post')) {
            if ($this->Jobs->save($job,['associated'=>['Hirers']])) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }		
	}
    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        //$hirers = $this->Jobs->Hirers->find('list', ['limit' => 200]);
        //$appliers = $this->Jobs->Appliers->find('list', ['limit' => 200]);
        $this->set(compact('job', 'hirers', 'appliers'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function apply($id = null,$applier=null){
		if(empty($applier)){
			$this->Flash->error(__("Please select the job to apply now!"));
			return;
		}
		$applyto 	= $this->Jobs->get($id);		
		if($applyto->hirers_id != $applier){//Check if the applicant is not the hirer
		$appliers	= explode(',',$applyto->appliers_id); 
		$appliers	= array_filter($appliers);
		$applied	= count($appliers);
		$applying 	= null;
		if(in_array($applier,$appliers)){//Make sure applicant didn't apply for the same job before
			$this->Flash->error(__("It seems you already applied!"));
			return;
		}
		if($applied != 0 && $applied<3){
			foreach($appliers as $applicant):
				if(!empty($applicant) OR $applicant!='')
						$applying.= $applicant.',';
			endforeach;
			$applying = $applying.$applier;
			$applyto->appliers_id = $applying;
			$apply = $this->Jobs->patchEntity($applyto, $this->request->data);
			if ($this->Jobs->save($apply)) {
			$this->Flash->success(__('You have succefully applied for '.$applyto->title));	
			}else{
				$this->Flash->error(__('You can not apply at the moment, try again later!'));
			}
		}else if($applied==0){
				$applyto->appliers_id = $applier;
				$apply = $this->Jobs->patchEntity($applyto, $this->request->data);
				if ($this->Jobs->save($apply)) {
				$this->Flash->success(__('You have succefully applied for '.$applyto->title));	
				}else{
					$this->Flash->error(__('You can not apply at the moment, try again later!'));
				}				
			}else{
				$this->Flash->error(__("You can't apply!"));
			}
		}else{
			$this->Flash->error(__("You can not apply to the job you posted!"));
		}		
		return $this->redirect(['action' => 'index']);
	}
	public function posted ($id = null){
		$query = $this->Jobs->find('all')->where(['hirers_id'=>$id]);
		$this->set('posted', $this->paginate($query));
	}
	public function applied($id = null){
		$query = $this->Jobs->find('all')->where(['appliers_id IN ('.$id.')']);
		$this->set('applied', $this->paginate($query));
	}
	
	public function getjob($id=null){
			$this->autoRender = false;
			$this->request->allowMethod('ajax');
			$query = $this->Jobs->get($id);
			//$data = ['name'=>'David','Age'=>20];
			echo json_encode($query);
	}
}
