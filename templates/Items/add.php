<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var \Cake\Collection\CollectionInterface|string[] $designDrafts
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <legend><?= __('Add Item') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('price');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('design_draft_id', ['options' => $designDrafts, 'empty' => true]);
                    echo $this->Form->control('order_id', ['options' => $orders, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
