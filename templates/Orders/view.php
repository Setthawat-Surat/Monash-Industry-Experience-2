<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer Name') ?></th>
                    <td><?= h($order->customer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Contact Number') ?></th>
                    <td><?= h($order->customer_contact_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Contact Email') ?></th>
                    <td><?= h($order->customer_contact_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Purchase') ?></th>
                    <td><?= h($order->date_purchase) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($order->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Design Draft Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->items as $item) : ?>
                        <tr>
                            <td><?= h($item->id) ?></td>
                            <td><?= h($item->name) ?></td>
                            <td><?= h($item->quantity) ?></td>
                            <td><?= h($item->design_draft_id) ?></td>
                            <td><?= h($item->order_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $item->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $item->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Product Orders') ?></h4>
                <?php if (!empty($order->product_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Order Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->product_orders as $productOrder) : ?>
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
