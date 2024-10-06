<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
$this->setLayout('school_dashboard');
?>

<title>Upload School Logo</title>
<section id="upload-section">
    <?= $this->Form->create($school, [
        'type' => 'file',
        'url' => ['controller' => 'Schools', 'action' => 'addSchoolLogo'],
        'id' => 'upload-logo-form'
    ]) ?>
    <div class="upload-form-wrapper">
        <h1 class="title">Upload School Logo</h1>
        <div class="form-group">
            <?= $this->Form->control('logo', [
                'type' => 'file',
                'label' => 'School Logo',
                'required' => true
            ]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->button('Upload Logo') ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</section>

