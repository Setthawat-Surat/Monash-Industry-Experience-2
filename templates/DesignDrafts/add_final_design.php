<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $DesignDrafts
 */
$this->setLayout('Admin_dashboard');
?>

<div id="layoutSidenav_content">
    <section id="add-final-design">
        <main class="d-flex align-items-center justify-content-center vh-100">
            <div class="container-fluid px-4">
                <?= $this->Form->create($DesignDrafts, [
                    'type' => 'file',
                    'url' => [
                        'controller' => 'DesignDrafts',
                        'action' => 'addFinalDesign',
                        '?' => ['dID' => $this->request->getQuery('dID')]
                    ],
                    'id' => 'upload-final-design-form',
                    'class' => 'form-container'
                ]) ?>
                <div class="upload-form-wrapper shadow-sm p-4 bg-white rounded">
                    <h1 class="title text-center mb-4">Upload Final Design</h1>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('final_design', [
                            'type' => 'file',
                            'label' => ['text' => 'Final Design', 'class' => 'form-label'],
                            'required' => true,
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                    <div class="form-group text-center">
                        <?= $this->Form->button('Upload Final Design', [
                            'class' => 'btn btn-primary'
                        ]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </main>
    </section>
</div>


