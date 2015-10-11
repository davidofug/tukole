<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 */
class MessagesController extends AppController
{
public function isAuthorized($user)
{
    // All registered users can add articles
    if (in_array($this->request->action,['chat','add','all','view'])) {
        return true;
    }
    // The owner of a message can edit and delete it
    if (in_array($this->request->action, ['edit', 'delete'])) {
        $msgId = (int)$this->request->params['pass'][0];
        if ($this->Messages->isOwnedBy($msgId, $user['id'])) {
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
    public function index($mid=null)
    {
		$id	   = $this->Auth->user('id'); //Id of the authenticated user
		$query = $this->Messages->find('all')->contain(['Jobs'])->where(['receivers_id'=>$id]);
		$this->set('messages', $this->paginate($query));
		$this->set('_serialize', ['messages']);
		
		$lastmsg	= $this->Messages->find('all')->last();
        $this->set('lastmsg', $lastmsg);
        $this->set('_serialize', ['lastmsg']);
		if($mid !="" OR $mid != null){
			$reply 		= $this->Messages->Replys->find('all')->where(['messages_id'=>$mid]);
		}else{
			$lastmsg_id	= $lastmsg->id; //Id to be used for retreiving replies
			$reply		= $this->Messages->Replys->find('all')->where(['messages_id'=>$lastmsg_id]);
		}
        $this->set('replies', $reply);
        $this->set('_serialize', ['replies']);
    }
    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($mid = null)
    {
		$id	   = $this->Auth->user('id');
		$query = $this->Messages->find('all')->contain(['Jobs'])->where(['receivers_id'=>$id]);
		$this->set('messages', $this->paginate($query));
		$this->set('_serialize', ['messages']);
		
        $message = $this->Messages->get($mid,[
            'contain' => ['Jobs','Replys']
        ]);
        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->Messages->Jobs->find('list', ['limit' => 200]);
        //$senders = $this->Messages->Senders->find('list', ['limit' => 200]);
        //$receivers = $this->Messages->Receivers->find('list', ['limit' => 200]);
       // $this->set(compact('message', 'jobs', 'senders', 'receivers'));
	   $this->set(compact('message', 'jobs'));
        //$this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->Messages->Jobs->find('list', ['limit' => 200]);
        $senders = $this->Messages->Senders->find('list', ['limit' => 200]);
        $receivers = $this->Messages->Receivers->find('list', ['limit' => 200]);
        $this->set(compact('message', 'jobs', 'senders', 'receivers'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	/**
	* All method
	* @param string|null $id member id.
	*/
	public function all($id = null){
	if($id=='' or $id==null){
		$id		=	$this->Auth->user('id');	
	}
	$query = $this->Messages->find('all')->contain(['Jobs'])->where(['receivers_id'=>$id]);
	$this->set('msgs', $this->paginate($query));
	$this->set('_serialize', ['msgs']);
	}
	public function getjob($id=null){
			$this->autoRender = false;
			$this->request->allowMethod('ajax');
			//$query = $this->Jobs->find('all')->where(['id'=>$id]);
			$data = ['name'=>'David','age'=>20];
			echo json_encode($data);
			//$this->set(compact($data));
			//$this->set('_serialize','data');
	}
	public function chat(){
        if ($this->request->is(['patch', 'post', 'put'])) {
			$message = $this->Messages->newEntity();
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message is sent'));
                return $this->redirect(['action' => 'all']);
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
				 debug($this->invalidFields);
        }
	}
}
}
