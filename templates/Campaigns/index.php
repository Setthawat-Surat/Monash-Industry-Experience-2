<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Campaign> $campaigns
 */
if ($this->Identity->isLoggedIn()) {
    $user_role = $this->Identity->get('role');
    if ($user_role != 'Admin') {
        echo '<script>window.location.href = "' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'access_denied']) . '";</script>';
        exit;
    }
}
?>
<div class="campaigns index content">
    <?= $this->Html->link(__('New Campaign'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Campaigns') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('default_sales_price') ?></th>
                    <th><?= $this->Paginator->sort('total_fund_raised') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('school_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign): ?>
                <tr>
                    <td><?= $this->Number->format($campaign->id) ?></td>
                    <td><?= h($campaign->name) ?></td>
                    <td><?= h($campaign->default_sales_price) ?></td>
                    <td><?= h($campaign->total_fund_raised) ?></td>
                    <td><?= h($campaign->start_date) ?></td>
                    <td><?= h($campaign->end_date) ?></td>
                    <td><?= $campaign->hasValue('school') ? $this->Html->link($campaign->school->name, ['controller' => 'Schools', 'action' => 'view', $campaign->school->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $campaign->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaign->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?>
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
