<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Months Controller
 *
 * @property \App\Model\Table\MonthsTable $Months
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonthsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $months = $this->paginate($this->Months);

        $this->set(compact('months'));
    }

    /**
     * View method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('month'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $month = $this->Months->newEmptyEntity();
        if ($this->request->is('post')) {
            $month = $this->Months->patchEntity($month, $this->request->getData());
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $month = $this->Months->patchEntity($month, $this->request->getData());
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $month = $this->Months->get($id);
        if ($this->Months->delete($month)) {
            $this->Flash->success(__('The month has been deleted.'));
        } else {
            $this->Flash->error(__('The month could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
