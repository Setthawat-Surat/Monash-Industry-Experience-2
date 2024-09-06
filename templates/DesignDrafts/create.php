<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $designDraft
 * @var \Cake\Collection\CollectionInterface|string[] $campaigns
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */

$this->setLayout('School_dashboard');
$campaignId = $this->request->getQuery('cID');
?>


<div class="container-fluid"><br>
    <section id="upload-design-form">
        <div class="header-row">
            <!-- Back Link with text -->
            <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]) ?>" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <!-- Heading -->
            <h2 class="h2 mb-0">Upload Designs</h2>
        </div><br>

        <div class="form-container">
            <?= $this->Form->create($designDraft, ['type' => 'file', 'id' => 'upload-design-form']) ?>
            <?= $this->Flash->render() ?>

            <div class="form-group">
                <?= $this->Form->control('design_name', [
                    'label' => [
                        'text' => 'Design Name <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'text',
                    'required' => true,
                    'id' => 'design_name',
                    'class' => 'form-control',
                    'placeholder' => 'Enter design name'
                ]) ?>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <?= $this->Form->control('design_yearlevel', [
                            'label' => [
                                'text' => 'Year Level <span class="required-asterisk">*</span>',
                                'escape' => false
                            ],
                            'type' => 'text',
                            'required' => true,
                            'id' => 'design_yearlevel',
                            'class' => 'form-control',
                            'placeholder' => 'Enter year level'
                        ]) ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <?= $this->Form->control('sales_price', [
                            'label' => [
                                'text' => 'Selling Price <span class="required-asterisk">*</span>',
                                'escape' => false
                            ],
                            'type' => 'number',
                            'required' => true,
                            'id' => 'sales_price',
                            'class' => 'form-control',
                            'placeholder' => 'Enter sells price',
                            'step' => '0.01'
                        ]) ?>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <?= $this->Form->control('logo_position', [
                    'label' => [
                        'text' => 'School Logo Position <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'select',
                    'options' => [
                        'Top-left' => 'Top-left',
                        'Top-right' => 'Top-right',
                        'Bottom-left' => 'Bottom-left',
                        'Bottom-right' => 'Bottom-right',
                        'Center' => 'Center'
                    ],
                    'required' => true,
                    'id' => 'logo_position',
                    'class' => 'form-control',
                    'empty' => 'Select school logo position'
                ]) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->control('specifications', [
                    'label' => 'Design Description',
                    'type' => 'textarea',
                    'id' => 'specifications',
                    'class' => 'form-control',
                    'placeholder' => 'Enter design description'
                ]) ?>
            </div>

            <div class="form-group">
                <label>Upload Student Designs <span class="required-asterisk">*</label>
                <div class="upload-container">
                    <div class="upload-card">
                        <div class="upload-drop_box">
                            <header>
                                <h4>Please select Files</h4>
                            </header>
                            <p>Files Supported: JPG, JPEG, PNG, WebP</p>
                            <?= $this->Form->control('studentDesigns', [
                                'type' => 'file',
                                'id' => 'studentDesigns',
                                'name' => 'studentDesigns[]',
                                'accept' => 'image/*',
                                'class' => 'form-control-file',
                                'label' => false,
                                'multiple' => 'multiple',
                                'required' => true,
                            ]) ?>
                            <br>
                            <div id="fileList" class="file-list"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <?= $this->Form->button('Upload', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</div>








</div>





