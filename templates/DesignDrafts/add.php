<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $designDraft
 * @var \Cake\Collection\CollectionInterface|string[] $campaigns
 * @var \Cake\Collection\CollectionInterface|string[] $admins
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Design Drafts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="designDrafts form content">
            <?= $this->Form->create($designDraft) ?>
            <fieldset>
                <legend><?= __('Add Design Draft') ?></legend>
                <?php
                    echo $this->Form->control('design_name');
                    echo $this->Form->control('design_yearlevel');
                    echo $this->Form->control('specifications');
                    echo $this->Form->control('approval_status');
                    echo $this->Form->control('sales_price');
                    echo $this->Form->control('final_design_photo');
                    echo $this->Form->control('campaign_id', ['options' => $campaigns, 'empty' => true]);
                    echo $this->Form->control('admin_id', ['options' => $admins, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
