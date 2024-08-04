<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $designDraft
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Design Draft'), ['action' => 'edit', $designDraft->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Design Draft'), ['action' => 'delete', $designDraft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designDraft->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Design Drafts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Design Draft'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="designDrafts view content">
            <h3><?= h($designDraft->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Design Name') ?></th>
                    <td><?= h($designDraft->design_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Design Yearlevel') ?></th>
                    <td><?= h($designDraft->design_yearlevel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specifications') ?></th>
                    <td><?= h($designDraft->specifications) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approval Status') ?></th>
                    <td><?= h($designDraft->approval_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sales Price') ?></th>
                    <td><?= h($designDraft->sales_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Final Design Photo') ?></th>
                    <td><?= h($designDraft->final_design_photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Campaign') ?></th>
                    <td><?= $designDraft->hasValue('campaign') ? $this->Html->link($designDraft->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $designDraft->campaign->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= $designDraft->hasValue('admin') ? $this->Html->link($designDraft->admin->id, ['controller' => 'Admins', 'action' => 'view', $designDraft->admin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($designDraft->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Design Photos') ?></h4>
                <?php if (!empty($designDraft->design_photos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Design Draft Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($designDraft->design_photos as $designPhoto) : ?>
                        <tr>
                            <td><?= h($designPhoto->id) ?></td>
                            <td><?= h($designPhoto->photo) ?></td>
                            <td><?= h($designPhoto->design_draft_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DesignPhotos', 'action' => 'view', $designPhoto->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DesignPhotos', 'action' => 'edit', $designPhoto->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DesignPhotos', 'action' => 'delete', $designPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designPhoto->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($designDraft->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Name') ?></th>
                            <th><?= __('Specifications') ?></th>
                            <th><?= __('Sales Price') ?></th>
                            <th><?= __('Final Design Photo') ?></th>
                            <th><?= __('Design Draft Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($designDraft->products as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->product_name) ?></td>
                            <td><?= h($product->specifications) ?></td>
                            <td><?= h($product->sales_price) ?></td>
                            <td><?= h($product->final_design_photo) ?></td>
                            <td><?= h($product->design_draft_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
