<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Production'), ['action' => 'edit', $production->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Production'), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Production'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productions view content">
            <h3><?= h($production->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= $production->has('country') ? $this->Html->link($production->country->name, ['controller' => 'Countries', 'action' => 'view', $production->country->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $production->has('month') ? $this->Html->link($production->month->id, ['controller' => 'Months', 'action' => 'view', $production->month->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($production->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coffee') ?></th>
                    <td><?= $this->Number->format($production->coffee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sugar') ?></th>
                    <td><?= $this->Number->format($production->sugar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enable') ?></th>
                    <td><?= $production->enable ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
