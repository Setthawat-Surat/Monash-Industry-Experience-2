<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
$this->setLayout('school_dashboard');

use Cake\ORM\TableRegistry;

$school_table = TableRegistry::getTableLocator()->get('Schools');
$user_id = $this->Identity->get('id');
$school_rep= $school_table->find()->where(['id' => $user_id])->first();


?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="form-wrapper">
    <section id="registration-form">
        <h1 class="title">Update Bank Account Details</h1>
        <?= $this->Form->create($school, ['url' => ['controller' => 'Schools', 'action' => 'updateBankAccount'], 'type' => 'post', 'id' => 'update-bank-account-form']) ?>
        <div class="form-group">
            <?= $this->Form->control('bank_acc_name', [
                'label' => 'Bank Account Name',
                'type' => 'text',
                'value' => $school_rep->bank_account_name,
                'required' => true,
            ]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('bank_acc_number', [
                'label' => 'Bank Account Number',
                'type' => 'text',
                'value' => $school_rep->bank_account_number,
                'required' => true,
            ]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('bank_bsb', [
                'label' => 'BSB',
                'type' => 'text',
                'value' => $school_rep->bsb,
                'required' => true,
            ]) ?>
        </div><br>
        <div class="form-group">
            <?= $this->Form->button('Update') ?>
        </div>
        <?= $this->Form->end() ?>
    </section>
</div>
</body>
</html>


