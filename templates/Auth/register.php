<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'frontend'; // Use the correct layout for your project
$this->assign('title', 'Register');
?>
<section id="registration-section">
    <div class="container">
        <?= $this->Form->create($user, ['id' => 'registration-form']) ?>
        <h2>Register</h2>

        <?= $this->Flash->render() ?>

        <br><div class="personal-details-header">
            <span>Personal Details</span>
        </div><br>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schoolname', [
                    'label' => 'School Name',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'schoolname',
                    'name' => 'schoolname',
                    'pattern' => '[a-zA-Z\s]*',
                    'title' => 'School Name should only contain letters and spaces'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schooladdress', [
                    'label' => 'School Address',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'schooladdress',
                    'name' => 'schooladdress'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('repfirstname', [
                    'label' => 'Your First Name',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'repfirstname',
                    'name' => 'repfirstname'
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('replastname', [
                    'label' => 'Your Last Name',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'replastname',
                    'name' => 'replastname'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('repemail', [
                    'label' => 'Your Email',
                    'type' => 'email',
                    'required' => true,
                    'id' => 'repemail',
                    'name' => 'repemail',
                ]) ?>
            </div>
        </div>

        <div class="bank-account-details-header">
            <span>Bank Account Details</span>
        </div><br>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('banknumber', [
                    'label' => 'Bank Account Number',
                    'type' => 'number',
                    'required' => true,
                    'id' => 'banknumber',
                    'name' => 'banknumber'
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('bankbsb', [
                    'label' => 'BSB',
                    'type' => 'number',
                    'required' => true,
                    'id' => 'bankbsb',
                    'name' => 'bankbsb'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('bankaccountname', [
                    'label' => 'Bank Account Name',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'bankaccountname',
                    'name' => 'bankaccountname',
                    'pattern' => '[a-zA-Z\s]*',
                    'title' => 'Bank Account Name should only contain letters and spaces'
                ]) ?>
            </div>
        </div>

        <div class="credentials-header">
            <span>Account Credentials</span>
        </div><br>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('email', [
                    'label' => 'Email',
                    'type' => 'email',
                    'required' => true,
                    'id' => 'email'
                ]) ?>
            </div>
            <div class="form-group">
                <div class="password-wrapper">
                <?= $this->Form->control('password', [
                    'label' => 'Password',
                    'type' => 'password',
                    'required' => true,
                    'id' => 'password'
                ]) ?>
                    <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>
        </div>

        <?= $this->Form->button('Register', ['class' => 'submit-btn']) ?>
        <?= $this->Form->end() ?>
    </div>
</section>
