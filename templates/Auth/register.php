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
        <?= $this->Form->create($user, ['type' => 'file','id' => 'registration-form']) ?>
        <h2>Register</h2>

        <?= $this->Flash->render() ?>

        <br><div class="personal-details-header">
            <span>Personal Details</span>
        </div><br>



        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('repfirstname', [
                    'label' => [
                        'text' => 'Your First Name <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'id' => 'repfirstname',
                    'name' => 'repfirstname',
                    'pattern' => '[a-zA-Z][a-zA-Z\'\-]*',
                    'title' => 'First Name should only contain letters, dashes, apostrophes.'
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('replastname', [
                    'label' => [
                        'text' => 'Your Last Name <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'id' => 'replastname',
                    'name' => 'replastname',
                    'pattern' => '^[a-zA-Z][a-zA-Z\s]*[a-zA-Z]$',
                    'title' => 'Last Name should only contain letters, dashes, apostrophes.'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('repemail', [
                    'label' => [
                        'text' => 'Your Email <span class="required-asterisk">*</span><br><p class="input-field-description">*** Please note that we will use this email to contact you.</p>',
                        'escape' => false
                    ],
                    'type' => 'email',
                    'required' => true,
                    'id' => 'repemail',
                    'name' => 'repemail',
                ]) ?>
            </div>
        </div>

        <div class="bank-account-details-header">
            <span>School Details</span>
        </div><br>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schoolname', [
                    'label' => [
                        'text' => 'School Name <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'id' => 'schoolname',
                    'name' => 'schoolname',
                    'pattern' => '[a-zA-Z\s]*',
                    'minlength' => 5,
                    'title' => 'School Name should only contain letters and spaces'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schooladdress', [
                    'label' => [
                        'text' => 'Address <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'id' => 'schooladdress',
                    'name' => 'schooladdress'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schoolsuburb', [
                    'label' => [
                        'text' => 'Suburb <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'pattern' => '^[a-zA-Z][a-zA-Z\s]*[a-zA-Z]$',
                    'title' => 'Suburb should contain only letters and spaces in between.',
                    'id' => 'schoolsuburb',
                    'name' => 'schoolsuburb'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schoolpostcode', [
                    'label' => [
                        'text' => 'Postal Code <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'pattern' => '^\d{4}$',
                    'title' => 'Postal Code must be exactly 4 digits and only contains number.',
                    'id' => 'schoolpostcode',
                    'name' => 'schoolpostcode'
                ]) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->control('schoolstate', [
                    'type' => 'select',
                    'options' => [
                        'NSW' => 'New South Wales',
                        'VIC' => 'Victoria',
                        'QLD' => 'Queensland',
                        'SA' => 'South Australia',
                        'WA' => 'Western Australia',
                        'TAS' => 'Tasmania',
                        'ACT' => 'Australian Capital Territory',
                        'NT' => 'Northern Territory'
                    ],
                    'label' => [
                        'text' => 'State <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'empty' => 'Please select a state',
                    'required' => true,
                    'id' => 'schoolstate',
                    'name' => 'schoolstate'
                ]) ?>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('schoollogo', [
                    'label' => 'Logo',
                    'type' => 'file',
                    'required' => false,
                    'id' => 'schoollogo',
                    'name' => 'schoollogo',
                    'accept' => 'image/*',
                ]) ?>
            </div>
        </div>

        <div class="credentials-header">
            <span>Account Credentials</span>
        </div><br>

        <div class="form-row">
            <div class="form-group">
                <?= $this->Form->control('email', [
                    'label' => [
                        'text' => 'Your Email <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'email',
                    'required' => true,
                    'id' => 'email'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <div class="password-wrapper">
                    <?= $this->Form->control('password', [
                        'class' => 'password-input',
                        'label' => [
                            'text' => 'Password <span class="required-asterisk">*</span>',
                            'escape' => false
                        ],
                        'type' => 'password',
                        'required' => true,
                        'id' => 'password',
                        'data-validate' => 'true'
                    ]) ?>
                    <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                </div>
                <div class="password-strength-checklist">
                    <h3 class="checklist-title">Password should be:</h3>

                    <ul class="checklist">
                        <li class="list-item">At least 8 characters long</li>
                        <li class="list-item">At least 1 number</li>
                        <li class="list-item">At least 1 uppercase character</li>
                        <li class="list-item">At least 1 special character</li>
                    </ul>
                </div><br>
            </div>
        </div>



        <?= $this->Form->button('Register', ['class' => 'submit-btn']) ?>
        <?= $this->Form->end() ?>
    </div>
</section>
