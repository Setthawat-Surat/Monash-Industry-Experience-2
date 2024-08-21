<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
$this->setLayout('School_dashboard');

use Cake\ORM\TableRegistry;

$school_table = TableRegistry::getTableLocator()->get('Schools');
$user_id = $this->Identity->get('id');
$school_rep= $school_table->find()->where(['id' => $user_id])->first();
?>

<title>Upload School Logo</title>
<section id="upload-section">
    <?= $this->Form->create($school, [
        'type' => 'file',
        'url' => ['controller' => 'Schools', 'action' => 'addSchoolLogo'],
        'id' => 'upload-logo-form'
    ]) ?>
    <div class="upload-form-wrapper">
        <div class="current-logo-wrapper">
            <?php if (!empty($school_rep->logo)): ?>
                <h2>Current School Logo</h2>
                <?= $this->Html->image('/school_logo_img/' . $school_rep->logo, [
                    'style' => 'max-width: 300px; max-height: 200px; height: auto; border: 1px solid #cccccc; border-radius: 4px; margin-top: 10px;'
                ]) ?>
            <?php else: ?>
                <p>No logo uploaded yet.</p>
            <?php endif; ?>
        </div><br>

        <hr class="separator">

        <br>
        <h1 class="title">Update School Logo</h1>
        <div class="form-group">
            <?= $this->Form->control('logo', [
                'type' => 'file',
                'label' => 'New School Logo',
                'required' => true
            ]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->button('Upload Logo') ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</section>
