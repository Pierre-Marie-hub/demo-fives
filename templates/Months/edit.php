<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $month->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $month->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Months'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="months form content">
            <?= $this->Form->create($month) ?>
            <fieldset>
                <legend><?= __('Edit Month') ?></legend>
                <?php
                    echo $this->Form->control('date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
