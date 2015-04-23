<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments */
class PaymentsController extends AppController
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
        $this->set('payments', $this->paginate($this->Payments));
        $this->set('_serialize', ['payments']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Leases']
        ]);
        $this->set('payment', $payment);
        $this->set('_serialize', ['payment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->data);
            if ($this->Payments->save($payment)) {
                $this->Flash->success('The payment has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The payment could not be saved. Please, try again.');
            }
        }
        $leases = $this->Payments->Leases->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'leases'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->data);
            if ($this->Payments->save($payment)) {
                $this->Flash->success('The payment has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The payment could not be saved. Please, try again.');
            }
        }
        $leases = $this->Payments->Leases->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'leases'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success('The payment has been deleted.');
        } else {
            $this->Flash->error('The payment could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
