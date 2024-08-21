<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="schools form content">
            <?= $this->Form->create($school) ?>
            <fieldset>
                <legend><?= __('Add School') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('rep_first_name');
                    echo $this->Form->control('rep_last_name');
                    echo $this->Form->control('rep_email');
                    echo $this->Form->control('address');
                    echo $this->Form->control('code');
                    echo $this->Form->control('bank_account_name');
                    echo $this->Form->control('bank_account_number');
                    echo $this->Form->control('bsb');
                    echo $this->Form->control('approval_status');
                    echo $this->Form->control('logo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
