<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Countries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="countries view content">
            <h3><?= h($country->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($country->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($country->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enable') ?></th>
                    <td><?= $country->enable ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Productions') ?></h4>
                <?php if (!empty($country->productions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('Month Id') ?></th>
                            <th><?= __('Coffee') ?></th>
                            <th><?= __('Sugar') ?></th>
                            <th><?= __('Enable') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($country->productions as $productions) : ?>
                        <tr>
                            <td><?= h($productions->id) ?></td>
                            <td><?= h($productions->country_id) ?></td>
                            <td><?= h($productions->month_id) ?></td>
                            <td><?= h($productions->coffee) ?></td>
                            <td><?= h($productions->sugar) ?></td>
                            <td><?= h($productions->enable) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Productions', 'action' => 'view', $productions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Productions', 'action' => 'edit', $productions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Productions', 'action' => 'delete', $productions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
