<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DesignDraft> $designDrafts
 */
?>
<div class="designDrafts index content">
    <?= $this->Html->link(__('New Design Draft'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Design Drafts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('design_name') ?></th>
                    <th><?= $this->Paginator->sort('design_yearlevel') ?></th>
                    <th><?= $this->Paginator->sort('specifications') ?></th>
                    <th><?= $this->Paginator->sort('approval_status') ?></th>
                    <th><?= $this->Paginator->sort('sales_price') ?></th>
                    <th><?= $this->Paginator->sort('final_design_photo') ?></th>
                    <th><?= $this->Paginator->sort('campaign_id') ?></th>
                    <th><?= $this->Paginator->sort('admin_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($designDrafts as $designDraft): ?>
                <tr>
                    <td><?= $this->Number->format($designDraft->id) ?></td>
                    <td><?= h($designDraft->design_name) ?></td>
                    <td><?= h($designDraft->design_yearlevel) ?></td>
                    <td><?= h($designDraft->specifications) ?></td>
                    <td><?= h($designDraft->approval_status) ?></td>
                    <td><?= h($designDraft->sales_price) ?></td>
                    <td><?= h($designDraft->final_design_photo) ?></td>
                    <td><?= $designDraft->hasValue('campaign') ? $this->Html->link($designDraft->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $designDraft->campaign->id]) : '' ?></td>
                    <td><?= $designDraft->hasValue('admin') ? $this->Html->link($designDraft->admin->id, ['controller' => 'Admins', 'action' => 'view', $designDraft->admin->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $designDraft->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $designDraft->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $designDraft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designDraft->id)]) ?>
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
