<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hirers Controller
 *
 * @property \App\Model\Table\HirersTable $Hirers
 */
class HirersController extends AppController
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
        $this->set('hirers', $this->paginate($this->Hirers));
        $this->set('_serialize', ['hirers']);
    }

    /**
     * View method
     *
     * @param string|null $id Hirer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hirer = $this->Hirers->get($id, [
            'contain' => ['Users', 'Jobs']
        ]);
        $this->set('hirer', $hirer);
        $this->set('_serialize', ['hirer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hirer = $this->Hirers->newEntity();
        if ($this->request->is('post')) {
            $hirer = $this->Hirers->patchEntity($hirer, $this->request->data);
            if ($this->Hirers->save($hirer)) {
                $this->Flash->success(__('The hirer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hirer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Hirers->Users->find('list', ['limit' => 200]);
        $jobs = $this->Hirers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('hirer', 'users', 'jobs'));
        $this->set('_serialize', ['hirer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hirer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hirer = $this->Hirers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hirer = $this->Hirers->patchEntity($hirer, $this->request->data);
            if ($this->Hirers->save($hirer)) {
                $this->Flash->success(__('The hirer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hirer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Hirers->Users->find('list', ['limit' => 200]);
        $jobs = $this->Hirers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('hirer', 'users', 'jobs'));
        $this->set('_serialize', ['hirer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hirer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hirer = $this->Hirers->get($id);
        if ($this->Hirers->delete($hirer)) {
            $this->Flash->success(__('The hirer has been deleted.'));
        } else {
            $this->Flash->error(__('The hirer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
