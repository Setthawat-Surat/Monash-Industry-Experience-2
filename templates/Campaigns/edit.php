<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 * @var string[]|\Cake\Collection\CollectionInterface $schools
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $campaign->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Campaigns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="campaigns form content">
            <?= $this->Form->create($campaign) ?>
            <fieldset>
                <legend><?= __('Edit Campaign') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('default_sales_price');
                    echo $this->Form->control('total_fund_raised');
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('end_date', ['empty' => true]);
                    echo $this->Form->control('school_id', ['options' => $schools, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
