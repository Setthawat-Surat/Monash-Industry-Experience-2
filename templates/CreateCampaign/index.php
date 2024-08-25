<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 */

$this->assign('title', 'Campaign');
?>

<div class="space"></div>
<body>
<section id="activity-registration-section">
    <div class="container">
        <h2>Register New Activity</h2>

        <?= $this->Form->create($campaign, ['url' => ['action' => 'create'], 'id' => 'activity-registration-form']) ?>

        <?= $this->Flash->render() ?>

        <div class="form-group">
            <?= $this->Form->control('name', [
                'label' => 'Activity Name',
                'required' => true,
                'pattern' => '[a-zA-Z\s]*',
                'minlength' => '3',
                'title' => 'Activity Name should only contain letters and spaces',
                'placeholder' => 'Enter activity name',
            ]) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->control('default_sales_price', [
                'label' => 'Default Sales Price',
                'required' => true,
                'type' => 'number',
                'min' => '0',
                'step' => '0.01',
                'placeholder' => 'Enter default sales price',
            ]) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->control('start_date', [
                'label' => 'Start Date',
                'required' => true,
                'type' => 'date',
            ]) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->control('end_date', [
                'label' => 'End Date',
                'required' => true,
                'type' => 'date',
            ]) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->button(__('Register Activity'), ['class' => 'submit-btn']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</section>
</body>
</html>
