<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="items view content">
            <h3><?= h($item->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($item->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Design Draft') ?></th>
                    <td><?= $item->hasValue('design_draft') ? $this->Html->link($item->design_draft->id, ['controller' => 'DesignDrafts', 'action' => 'view', $item->design_draft->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $item->hasValue('order') ? $this->Html->link($item->order->id, ['controller' => 'Orders', 'action' => 'view', $item->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $item->price === null ? '' : $this->Number->format($item->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $item->quantity === null ? '' : $this->Number->format($item->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
