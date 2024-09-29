<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
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
            <?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Campaigns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Campaign'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="campaigns view content">
            <h3><?= h($campaign->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($campaign->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Sales Price') ?></th>
                    <td><?= h($campaign->default_sales_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Fund Raised') ?></th>
                    <td><?= h($campaign->total_fund_raised) ?></td>
                </tr>
                <tr>
                    <th><?= __('School') ?></th>
                    <td><?= $campaign->hasValue('school') ? $this->Html->link($campaign->school->name, ['controller' => 'Schools', 'action' => 'view', $campaign->school->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($campaign->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($campaign->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($campaign->end_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Design Drafts') ?></h4>
                <?php if (!empty($campaign->design_drafts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Design Name') ?></th>
                            <th><?= __('Design Yearlevel') ?></th>
                            <th><?= __('Specifications') ?></th>
                            <th><?= __('Approval Status') ?></th>
                            <th><?= __('Sales Price') ?></th>
                            <th><?= __('Final Design Photo') ?></th>
                            <th><?= __('Campaign Id') ?></th>
                            <th><?= __('Admin Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($campaign->design_drafts as $designDraft) : ?>
                        <tr>
                            <td><?= h($designDraft->id) ?></td>
                            <td><?= h($designDraft->design_name) ?></td>
                            <td><?= h($designDraft->design_yearlevel) ?></td>
                            <td><?= h($designDraft->specifications) ?></td>
                            <td><?= h($designDraft->approval_status) ?></td>
                            <td><?= h($designDraft->sales_price) ?></td>
                            <td><?= h($designDraft->final_design_photo) ?></td>
                            <td><?= h($designDraft->campaign_id) ?></td>
                            <td><?= h($designDraft->admin_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DesignDrafts', 'action' => 'view', $designDraft->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DesignDrafts', 'action' => 'edit', $designDraft->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DesignDrafts', 'action' => 'delete', $designDraft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designDraft->id)]) ?>
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
