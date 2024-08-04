<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignPhoto $designPhoto
 * @var \Cake\Collection\CollectionInterface|string[] $designDrafts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Design Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="designPhotos form content">
            <?= $this->Form->create($designPhoto) ?>
            <fieldset>
                <legend><?= __('Add Design Photo') ?></legend>
                <?php
                    echo $this->Form->control('photo');
                    echo $this->Form->control('design_draft_id', ['options' => $designDrafts, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
