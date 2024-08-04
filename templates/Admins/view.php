<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Admin'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Admins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Admin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="admins view content">
            <h3><?= h($admin->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($admin->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($admin->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admin->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Design Drafts') ?></h4>
                <?php if (!empty($admin->design_drafts)) : ?>
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
                        <?php foreach ($admin->design_drafts as $designDraft) : ?>
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
