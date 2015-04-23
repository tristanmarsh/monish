<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternetConnection Controller
 *
 * @property \App\Model\Table\InternetConnectionTable $InternetConnection */
class InternetConnectionController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leases']
        ];
        $this->set('internetConnection', $this->paginate($this->InternetConnection));
        $this->set('_serialize', ['internetConnection']);
    }

    /**
     * View method
     *
     * @param string|null $id Internet Connection id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internetConnection = $this->InternetConnection->get($id, [
            'contain' => ['Leases']
        ]);
        $this->set('internetConnection', $internetConnection);
        $this->set('_serialize', ['internetConnection']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internetConnection = $this->InternetConnection->newEntity();
        if ($this->request->is('post')) {
            $internetConnection = $this->InternetConnection->patchEntity($internetConnection, $this->request->data);
            if ($this->InternetConnection->save($internetConnection)) {
                $this->Flash->success('The internet connection has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The internet connection could not be saved. Please, try again.');
            }
        }
        $leases = $this->InternetConnection->Leases->find('list', ['limit' => 200]);
        $this->set(compact('internetConnection', 'leases'));
        $this->set('_serialize', ['internetConnection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Internet Connection id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internetConnection = $this->InternetConnection->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internetConnection = $this->InternetConnection->patchEntity($internetConnection, $this->request->data);
            if ($this->InternetConnection->save($internetConnection)) {
                $this->Flash->success('The internet connection has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The internet connection could not be saved. Please, try again.');
            }
        }
        $leases = $this->InternetConnection->Leases->find('list', ['limit' => 200]);
        $this->set(compact('internetConnection', 'leases'));
        $this->set('_serialize', ['internetConnection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Internet Connection id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internetConnection = $this->InternetConnection->get($id);
        if ($this->InternetConnection->delete($internetConnection)) {
            $this->Flash->success('The internet connection has been deleted.');
        } else {
            $this->Flash->error('The internet connection could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
