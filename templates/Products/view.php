<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="products view content">
            <h3><?= h($product->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product Name') ?></th>
                    <td><?= h($product->product_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specifications') ?></th>
                    <td><?= h($product->specifications) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sales Price') ?></th>
                    <td><?= h($product->sales_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Final Design Photo') ?></th>
                    <td><?= h($product->final_design_photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Design Draft') ?></th>
                    <td><?= $product->hasValue('design_draft') ? $this->Html->link($product->design_draft->id, ['controller' => 'DesignDrafts', 'action' => 'view', $product->design_draft->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product Orders') ?></h4>
                <?php if (!empty($product->product_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Order Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_orders as $productOrder) : ?>
                        <tr>
                            <td><?= h($productOrder->order_product_id) ?></td>
                            <td><?= h($productOrder->quantity) ?></td>
                            <td><?= h($productOrder->order_id) ?></td>
                            <td><?= h($productOrder->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductOrders', 'action' => 'view', $productOrder->order_product_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductOrders', 'action' => 'edit', $productOrder->order_product_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductOrders', 'action' => 'delete', $productOrder->order_product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOrder->order_product_id)]) ?>
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
