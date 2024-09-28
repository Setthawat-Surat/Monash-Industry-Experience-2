<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */

if ($this->Identity->isLoggedIn()) {
    $user_role = $this->Identity->get('role');
    if ($user_role != 'Admin') {
        echo '<script>window.location.href = "' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'access_denied']) . '";</script>';
        exit;
    }
}
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="schools view content">
            <h3><?= h($school->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($school->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rep First Name') ?></th>
                    <td><?= h($school->rep_first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rep Last Name') ?></th>
                    <td><?= h($school->rep_last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rep Email') ?></th>
                    <td><?= h($school->rep_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($school->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($school->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bank Account Name') ?></th>
                    <td><?= h($school->bank_account_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bank Account Number') ?></th>
                    <td><?= h($school->bank_account_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bsb') ?></th>
                    <td><?= h($school->bsb) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo') ?></th>
                    <td><?= h($school->logo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($school->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approval Status') ?></th>
                    <td><?= $school->approval_status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Campaigns') ?></h4>
                <?php if (!empty($school->campaigns)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Default Sales Price') ?></th>
                            <th><?= __('Total Fund Raised') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('School Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($school->campaigns as $campaign) : ?>
                        <tr>
                            <td><?= h($campaign->id) ?></td>
                            <td><?= h($campaign->name) ?></td>
                            <td><?= h($campaign->default_sales_price) ?></td>
                            <td><?= h($campaign->total_fund_raised) ?></td>
                            <td><?= h($campaign->start_date) ?></td>
                            <td><?= h($campaign->end_date) ?></td>
                            <td><?= h($campaign->school_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Campaigns', 'action' => 'view', $campaign->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Campaigns', 'action' => 'edit', $campaign->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campaigns', 'action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
