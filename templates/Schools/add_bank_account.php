<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
$this->setLayout('School_dashboard');


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Modern Registration Form</title>

</head>
<body>
<div class="form-wrapper">
    <section id="registration-form">
        <h1 class="title">Add Bank Account Details</h1>
        <?= $this->Form->create($school, ['url' => ['controller' => 'Schools', 'action' => 'addBankAccount'], 'type' => 'post', 'id' => 'add-bank-account-form']) ?>
            <div class="form-group">
                <?= $this->Form->control('bank_acc_name', [
                    'label' => 'Bank Account Name',
                    'type' => 'text',
                    'placeholder' => 'John Doe',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('bank_acc_number', [
                    'label' => 'Bank Account Number',
                    'type' => 'text',
                    'placeholder' => '0001234',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('bank_bsb', [
                    'label' => 'BSB',
                    'type' => 'text',
                    'placeholder' => '123456',
                    'required' => true,
                ]) ?>
            </div><br>
            <div class="form-group">
                <?= $this->Form->button('Add') ?>
            </div>
        <?= $this->Form->end() ?>
    </section>
</div>
</body>
</html>

