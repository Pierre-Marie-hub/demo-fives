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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $production->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $production->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Productions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productions form content">
            <?= $this->Form->create($production) ?>
            <fieldset>
                <legend><?= __('Edit Production') ?></legend>
                <?php
                    echo $this->Form->control('country_id', ['options' => $countries]);
                    echo $this->Form->control('month_id', ['options' => $months]);
                    echo $this->Form->control('coffee');
                    echo $this->Form->control('sugar');
                    echo $this->Form->control('enable');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
