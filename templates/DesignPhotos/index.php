<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DesignPhoto> $designPhotos
 */
?>
<div class="designPhotos index content">
    <?= $this->Html->link(__('New Design Photo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Design Photos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('photo') ?></th>
                    <th><?= $this->Paginator->sort('design_draft_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($designPhotos as $designPhoto): ?>
                <tr>
                    <td><?= $this->Number->format($designPhoto->id) ?></td>
                    <td><?= h($designPhoto->photo) ?></td>
                    <td><?= $designPhoto->hasValue('design_draft') ? $this->Html->link($designPhoto->design_draft->id, ['controller' => 'DesignDrafts', 'action' => 'view', $designPhoto->design_draft->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $designPhoto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $designPhoto->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $designPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designPhoto->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
