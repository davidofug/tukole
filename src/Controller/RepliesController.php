<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Replies Controller
 *
 * @property \App\Model\Table\RepliesTable $Replies
 */
class RepliesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs', 'Senders', 'Receivers']
        ];
        $this->set('replies', $this->paginate($this->Replies));
        $this->set('_serialize', ['replies']);
    }

    /**
     * View method
     *
     * @param string|null $id Reply id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reply = $this->Replies->get($id, [
            'contain' => ['Jobs', 'Senders', 'Receivers']
        ]);
        $this->set('reply', $reply);
        $this->set('_serialize', ['reply']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reply = $this->Replies->newEntity();
        if ($this->request->is('post')) {
            $reply = $this->Replies->patchEntity($reply, $this->request->data);
            if ($this->Replies->save($reply)) {
                $this->Flash->success(__('The reply has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reply could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->Replies->Jobs->find('list', ['limit' => 200]);
        $senders = $this->Replies->Senders->find('list', ['limit' => 200]);
        $receivers = $this->Replies->Receivers->find('list', ['limit' => 200]);
        $this->set(compact('reply', 'jobs', 'senders', 'receivers'));
        $this->set('_serialize', ['reply']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reply id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reply = $this->Replies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reply = $this->Replies->patchEntity($reply, $this->request->data);
            if ($this->Replies->save($reply)) {
                $this->Flash->success(__('The reply has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reply could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->Replies->Jobs->find('list', ['limit' => 200]);
        $senders = $this->Replies->Senders->find('list', ['limit' => 200]);
        $receivers = $this->Replies->Receivers->find('list', ['limit' => 200]);
        $this->set(compact('reply', 'jobs', 'senders', 'receivers'));
        $this->set('_serialize', ['reply']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reply id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reply = $this->Replies->get($id);
        if ($this->Replies->delete($reply)) {
            $this->Flash->success(__('The reply has been deleted.'));
        } else {
            $this->Flash->error(__('The reply could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
