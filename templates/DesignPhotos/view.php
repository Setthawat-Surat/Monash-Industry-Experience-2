<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignPhoto $designPhoto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Design Photo'), ['action' => 'edit', $designPhoto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Design Photo'), ['action' => 'delete', $designPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designPhoto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Design Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Design Photo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="designPhotos view content">
            <h3><?= h($designPhoto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($designPhoto->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Design Draft') ?></th>
                    <td><?= $designPhoto->hasValue('design_draft') ? $this->Html->link($designPhoto->design_draft->id, ['controller' => 'DesignDrafts', 'action' => 'view', $designPhoto->design_draft->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($designPhoto->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
