<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Production;
use Cake\ORM\TableRegistry;

/**
 * Productions Controller
 *
 * @property \App\Model\Table\ProductionsTable $Productions
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries', 'Months'],
        ];
        $productions = $this->paginate($this->Productions->find('all')->where(['Productions.enable' => true]));

        $this->set(compact('productions'));
    }

    /**
     * View method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $production = $this->Productions->get($id, [
            'contain' => ['Countries', 'Months'],
        ]);

        $this->set(compact('production'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $production = $this->Productions->newEmptyEntity();
        if ($this->request->is('post')) {
            $production = $this->Productions->patchEntity($production, $this->request->getData());
            $oldProd = $this->Productions->find()
                ->where(['country_id IS' => $production->get('country_id')])
                ->andWhere(['month_id IS' => $production->get('month_id')])
                ->andWhere(['enable IS' => 1]);
            foreach ($oldProd as $row) {
                $row->set(['enable' => false]);
                $this->Productions->save($row);
            }

            if ($this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
        }
        $countries = $this->Productions->Countries->find('list', ['limit' => 200]);
        $months = $this->Productions->Months->find('list', ['limit' => 200]);
        $this->set(compact('production', 'countries', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $production = $this->Productions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $production = $this->Productions->patchEntity($production, $this->request->getData());
            if ($this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
        }
        $countries = $this->Productions->Countries->find('list', ['limit' => 200]);
        $months = $this->Productions->Months->find('list', ['limit' => 200]);
        $this->set(compact('production', 'countries', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $production = $this->Productions->get($id);

        if ($this->Productions->delete($production)) {
            $this->Flash->success(__('The production has been deleted.'));
        } else {
            $this->Flash->error(__('The production could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Get method
     *
     * json data of coffee consummation
     * @return \Cake\Http\Response
     */
    public function get()
    {
        //Get instances of production
        $prods = $this->Productions->find('all')->where(['Productions.enable' => 1])->contain(['Countries', 'Months']);
        $array[0][0] = "Months";

        //Create an array to return
        foreach ($prods->getIterator() as $entry) {
            if (!isset($array[$entry->get('month_id')][0])) {
                $array[$entry->get('month_id')][0] = $entry->get('month')->date->i18nFormat('yyyy-MM');
            }
            if (!isset($array[0][$entry->get('country_id')])) {
                $array[0][$entry->get('country_id')] = $entry->get('country')->name;
            }
            $array[$entry->get('month_id')][$entry->get('country_id')] = $entry->get('coffee');
        }

        return $this->response->withStringBody(json_encode($array));
    }

    /**
     * Generate coffee production
     *
     * @param int[] $periodsID [startMonth,endMonth].
     * @param int[] $countriesID
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function generate()
    {

        //Archive old data
        $productionsHistory = $this->Productions->find()
            ->where(['Productions.enable' => true])
            ->contain(['Countries', 'Months'], true);

        foreach ($productionsHistory->getIterator() as $row) {
            $row->set(['enable' => false, 'sugar' => 3]);
            $this->Productions->save($row);
        }


        //Get countries and months needed for charts
        $countries = TableRegistry::getTableLocator()->get('Countries')->find('all')->getIterator();
        $periods = TableRegistry::getTableLocator()->get('Months')->find('all')->getIterator();

        //Generate new random values
        foreach ($countries as $country) {
            foreach ($periods as $month) {
                $item = new Production();
                $item->set([
                    'coffee' => rand(0, 2500),
                    'country' => $country,
                    'month' => $month,
                    'enable' => true,
                ]);
                $this->Productions->save($item);
            }
        }


        return $this->redirect('/');
    }
}
