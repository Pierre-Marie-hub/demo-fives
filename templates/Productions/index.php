<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production[]|\Cake\Collection\CollectionInterface $productions
 */
?>
<div class="productions index content">
    <h3 class="centered-text"><?= __('Productions') ?></h3>
    <?= $this->Html->link(__('home'), '/', ['class' => 'button']) ?>
    <?= $this->Html->link(__('New Production'), ['action' => 'add'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Random all data'), ['action' => 'generate'], ['class' => 'button']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('country_id') ?></th>
                    <th><?= $this->Paginator->sort('month_id') ?></th>
                    <th><?= $this->Paginator->sort('coffee') ?></th>
                    <th><?= $this->Paginator->sort('sugar') ?></th>
                    <th><?= $this->Paginator->sort('enable') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productions as $production): ?>
                <tr>
                    <td><?= $this->Number->format($production->id) ?></td>
                    <td><?= $production->has('country') ? $this->Html->link($production->country->name, ['controller' => 'Countries', 'action' => 'view', $production->country->id]) : '' ?></td>
                    <td><?= $production->has('month') ? $this->Html->link($production->month->id, ['controller' => 'Months', 'action' => 'view', $production->month->id]) : '' ?></td>
                    <td><?= $this->Number->format($production->coffee) ?></td>
                    <td><?= $this->Number->format($production->sugar) ?></td>
                    <td><?= h($production->enable) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $production->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $production->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
