<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Appliers Controller
 *
 * @property \App\Model\Table\AppliersTable $Appliers
 */
class AppliersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Jobs']
        ];
        $this->set('appliers', $this->paginate($this->Appliers));
        $this->set('_serialize', ['appliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Applier id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applier = $this->Appliers->get($id, [
            'contain' => ['Users', 'Jobs']
        ]);
        $this->set('applier', $applier);
        $this->set('_serialize', ['applier']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applier = $this->Appliers->newEntity();
        if ($this->request->is('post')) {
            $applier = $this->Appliers->patchEntity($applier, $this->request->data);
            if ($this->Appliers->save($applier)) {
                $this->Flash->success(__('The applier has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applier could not be saved. Please, try again.'));
            }
        }
        $users = $this->Appliers->Users->find('list', ['limit' => 200]);
        $jobs = $this->Appliers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('applier', 'users', 'jobs'));
        $this->set('_serialize', ['applier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applier id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applier = $this->Appliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applier = $this->Appliers->patchEntity($applier, $this->request->data);
            if ($this->Appliers->save($applier)) {
                $this->Flash->success(__('The applier has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applier could not be saved. Please, try again.'));
            }
        }
        $users = $this->Appliers->Users->find('list', ['limit' => 200]);
        $jobs = $this->Appliers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('applier', 'users', 'jobs'));
        $this->set('_serialize', ['applier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applier id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applier = $this->Appliers->get($id);
        if ($this->Appliers->delete($applier)) {
            $this->Flash->success(__('The applier has been deleted.'));
        } else {
            $this->Flash->error(__('The applier could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function apply($id = null,$applier=null){
		$job = $this->Jobs->get($id);
		$appliers = $job->appliers_id;
		$job->appliers_id = $appliers.','.$applier;
		//$job = array('Jobs',array('id'=>$id,'appliers_id'=>$applier.','));
				$job = $this->Jobs->patchEntity($job, $this->request->data);
		if($this->Jobs->save($job)){
			 $this->Flash->success(__('You applied!'));
		} else {
            $this->Flash->error(__('You have not applied'));
        }
		return $this->redirect(['action' => 'index']);
	}
}
