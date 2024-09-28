<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\School> $schools
 */

if ($this->Identity->isLoggedIn()) {
    $user_role = $this->Identity->get('role');
    if ($user_role != 'Admin') {
        echo '<script>window.location.href = "' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'access_denied']) . '";</script>';
        exit;
    }
}
?>
<div class="schools index content">
    <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Schools') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('rep_first_name') ?></th>
                    <th><?= $this->Paginator->sort('rep_last_name') ?></th>
                    <th><?= $this->Paginator->sort('rep_email') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('bank_account_name') ?></th>
                    <th><?= $this->Paginator->sort('bank_account_number') ?></th>
                    <th><?= $this->Paginator->sort('bsb') ?></th>
                    <th><?= $this->Paginator->sort('approval_status') ?></th>
                    <th><?= $this->Paginator->sort('logo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schools as $school): ?>
                <tr>
                    <td><?= $this->Number->format($school->id) ?></td>
                    <td><?= h($school->name) ?></td>
                    <td><?= h($school->rep_first_name) ?></td>
                    <td><?= h($school->rep_last_name) ?></td>
                    <td><?= h($school->rep_email) ?></td>
                    <td><?= h($school->address) ?></td>
                    <td><?= h($school->code) ?></td>
                    <td><?= h($school->bank_account_name) ?></td>
                    <td><?= h($school->bank_account_number) ?></td>
                    <td><?= h($school->bsb) ?></td>
                    <td><?= h($school->approval_status) ?></td>
                    <td>
                        <?php if (!empty($school->logo)): ?>
                            <?= $this->Html->image('school_logo_img/' . $school->logo, ['alt' => 'School Logo', 'class' => 'school-logo']) ?>
                        <?php else: ?>
                            <?= h('No logo available') ?>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $school->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $school->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?>
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
