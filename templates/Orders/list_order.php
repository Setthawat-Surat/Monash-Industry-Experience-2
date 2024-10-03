<?php
$this->setLayout('school_dashboard');

// Load the Items and Orders tables using Table Registry
use Cake\ORM\TableRegistry;
$itemsTable = TableRegistry::getTableLocator()->get('Items');
$ordersTable = TableRegistry::getTableLocator()->get('Orders');
?>

<div class="container-fluid">
    <h1>My Orders</h1><br><br>

    <section id="school-order">
        <?php if (!empty($campaigns)): ?>
            <ul>
                <?php foreach ($campaigns as $campaign): ?>
                    <li>
                        <h2 class="campaign-title" onclick="toggleDrafts(<?= h($campaign->id) ?>)">
                            <?= h($campaign->name) . " Campaign" ?>
                        </h2>

                        <div id="drafts-<?= h($campaign->id) ?>" class="design-drafts hidden">
                            <?php if (!empty($campaign->design_drafts)): ?>
                                <ul>
                                    <?php foreach ($campaign->design_drafts as $draft): ?>
                                        <li>
                                            <span class="draft-name" onclick="toggleDraftDetails(<?= h($draft->id) ?>)">
                                                <?= h($draft->design_name) . " " . "Design" . " " . "(" . h($draft->design_yearlevel) . ")"?>
                                                <i class="fas fa-chevron-down expand-icon"></i>
                                            </span>

                                            <div id="draft-details-<?= h($draft->id) ?>" class="draft-details hidden">

                                                <!-- Fetch items belonging to the design draft -->
                                                <?php $items = $itemsTable->find()
                                                    ->where(['design_draft_id' => $draft->id])
                                                    ->all(); ?>

                                                <?php if ($items->count() > 0): ?>
                                                <br><br>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Contact Email</th>
                                                            <th>Quantity</th>
                                                            <th>Date of Purchase</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($items as $item): ?>
                                                            <!-- Fetch order information related to the item -->
                                                            <?php
                                                            $order = $ordersTable->find()
                                                                ->where(['id' => $item->order_id])
                                                                ->first();
                                                            ?>

                                                            <?php if ($order): ?>
                                                                <tr>
                                                                    <td><?= h($order->customer_name) ?></td>
                                                                    <td><?= h($order->customer_contact_email) ?></td>
                                                                    <td><?= h($item->quantity) ?></td>
                                                                    <td><?= h($order->date_purchase) ?></td>
                                                                </tr>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="8">No order information available for this item.</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php else: ?>
                                                    <p>There are currently no orders for this design.</p>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>Currently, there are no designs available for this campaign. </p>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No campaigns found for your school.</p>
        <?php endif; ?>
    </section>
</div>
