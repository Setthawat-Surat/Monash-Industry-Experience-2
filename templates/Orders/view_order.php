<?php
$this->setLayout('admin_dashboard');
?>

<div id="layoutSidenav_content">
    <section id="view-order">
        <h1 class="text-center">My Orders</h1>

        <?php foreach ($groupedProducts as $schoolName => $products): ?>
            <h4 class="school-title">Order From: <?= h($schoolName) ?></h4>
            <?php
            $schoolAddress = $products[0]->SchoolAddress;
            $repFirstName = $products[0]->RepFirstName;
            $repLastName = $products[0]->RepLastName;
            $repEmail = $products[0]->RepEmail;
            $bankAccount = $products[0]->BankAccount;
            $bsb = $products[0]->BSB;
            ?>
            <p>
                Representative: <?= h($repFirstName . ' ' . $repLastName) ?: "No representative provided" ?><br>
                Email: <?= h($repEmail ?: "No email provided") ?><br>
                Bank Account: <?= h($bankAccount ?: "This school hasn't provide bank account number yet") ?> &ensp; BSB:  <?= h($bsb ?: "This school hasn't provide BSB yet") ?><br>
                Shipping Address: <?= h($schoolAddress ?: "This school hasn't provided any address yet") ?>
            </p><br>
            <table>
                <thead>
                <tr>
                    <th>Design Name</th>
                    <th>Total Quantity</th>
                    <th>Campaign Name</th>
                    <th>Belly Band Required</th>
                    <th>Fundraised Amount</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $index => $product): ?>
                    <?php
                    // Calculate product cost based on quantity
                    $quantity = $product->Total;
                    if ($quantity >= 25 && $quantity <= 49) {
                        $productCost = 17.40;
                    } elseif ($quantity >= 50 && $quantity <= 249) {
                        $productCost = 13.05;
                    } elseif ($quantity >= 250 && $quantity <= 499) {
                        $productCost = 11.60;
                    } elseif ($quantity >= 500) {
                        $productCost = 11.02;
                    } else {
                        $productCost = 20; // Invalid quantity
                    }

                    // Calculate the cost of belly bands if required
                    $bellyBandCost = $product->BellyBand ? 1.25 * $quantity : 0;

                    // Calculate the total price (Product Price * Quantity)
                    $totalPrice = $product->Price * $quantity;

                    // Calculate the fundraised amount (Total Price - Belly Band Cost - Product Cost)
                    $fundraisedAmount = $totalPrice - $bellyBandCost - ($productCost * $quantity);
                    ?>
                    <tr>
                        <td><?= h($product->ProductName) ?></td>
                        <td><?= h($quantity) ?></td>
                        <td><?= h($product->CampaignName) ?></td>
                        <td><?= $product->BellyBand ? 'Yes' : 'No' ?></td>
                        <td><?= h(number_format($fundraisedAmount, 2)) ?></td>
                        <td>
                            <!-- Expand/Collapse Button -->
                            <button class="expand-btn" onclick="toggleBreakdown(<?= $index ?>)">
                                <span id="icon-<?= $index ?>">+</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Hidden breakdown section -->
                    <tr id="breakdown-<?= $index ?>" class="breakdown-row" style="display: none;">
                        <td colspan="6">
                            <strong>Fundraised Amount Breakdown:</strong><br>
                            Total Quantity: <?= h($quantity) ?><br>
                            Product sales price per Unit: $<?= h(number_format($product->Price, 2)) ?><br>
                            Total Price: $<?= h(number_format($totalPrice, 2)) ?><br>
                            Product Cost per Unit: $<?= h(number_format($productCost, 2)) ?><br>
                            Belly Band Cost (if required): $<?= h(number_format($bellyBandCost, 2)) ?><br>
                            <strong>Fundraised Amount: $<?= h(number_format($fundraisedAmount, 2)) ?></strong><br><br>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </section>
</div>
