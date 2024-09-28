<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $designDraft
 */

$this->setLayout('school_dashboard');
$campaignId = $this->request->getQuery('cID');

?>
<body>
<div class="container-fluid"><br>
    <?= $this->Flash->render(); ?>
    <section id="update-design-form">
        <div class="header-row">
            <!-- Back Link with text -->
            <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $campaignId]]) ?>" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <!-- Heading -->
            <h2 class="h2 mb-0">Update Design</h2>
        </div><br>
                <div class="form-container">
                    <!-- Div to display current design photos -->
                    <div id="current-design-photos">
                        <h3 class="text-center">Current Design Photos</h3>
                        <div class="photo-gallery">
                            <?php if (!empty($designDraft->design_photos)): ?>
                                <?php foreach ($designDraft->design_photos as $photo): ?>
                                    <div class="card-img-container">
                                        <?= $this->Html->image( 'student_designs_img/' . $photo->photo, ['alt' => 'Design Photo', 'class' => 'card-img']) ?>
                                        <?= $this->Form->postLink(
                                            '<i class="fa-solid fa-circle-xmark text-danger"></i>', // Solid circle with cross icon
                                            ['controller' => 'DesignPhotos', 'action' => 'deletephotos', $photo->id, '?' => ['dID' => $designDraft->id, 'cID' => $campaignId]],
                                            [
                                                'escape' => false,
                                                'confirm' => __('Are you sure you want to delete this image?'),
                                                'title' => 'Delete this design?',
                                                'class' => 'delete-icon' // Add class for styling if needed
                                            ]
                                        ) ?>

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-center">No design photos available.</p>
                            <?php endif; ?>
                        </div>
                    </div><br><br>

                    <?= $this->Form->create($designDraft , ['type' => 'file']) ?> <!-- Create form with the design draft entity -->

                    <div class="form-group">
                        <?= $this->Form->control('design_name', [
                            'label' => [
                                'text' => 'Design Name',
                                'escape' => false
                            ],
                            'type' => 'text',
                            'required' => false,
                            'value' => $designDraft->design_name,
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
                                        'text' => 'Year Level',
                                        'escape' => false
                                    ],
                                    'type' => 'text',
                                    'required' => false,
                                    'value' => $designDraft->design_yearlevel,
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
                                        'text' => 'Selling Price',
                                        'escape' => false
                                    ],
                                    'type' => 'number',
                                    'required' => false,
                                    'value' => $designDraft->sales_price,
                                    'id' => 'sales_price',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter sells price',
                                    'step' => '0.01',
                                    'min' => '0'
                                ]) ?>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <?= $this->Form->control('logo_position', [
                            'label' => [
                                'text' => 'School Logo Position',
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
                            'value' => $designDraft->logo_position,
                            'empty' => '=== Select school logo position from the list ==='
                        ]) ?>
                    </div>


                    <div class="form-group">
                        <?= $this->Form->control('specifications', [
                            'label' => 'Design Description',
                            'type' => 'textarea',
                            'id' => 'specifications',
                            'class' => 'form-control',
                            'value' => $designDraft->specifications,
                        ]) ?>
                    </div>


                    <div class="form-group">
                        <label>Packaging Option (Belly Bands)</label>
                        <div class="form-check">
                            <?= $this->Form->checkbox('belly_band', [
                                'label' => false,
                                'class' => 'form-check-input',
                                'id' => 'option_one',
                                'value' => '1',
                                'hiddenField' => false,
                                'onclick' => 'toggleCheckbox(this, "option_two")',
                                'checked' => ($designDraft->belly_band == '1') // Check if the value is 1
                            ]); ?>
                            <label class="form-check-label" for="option_one">Yes, I would like to have a belly band.</label>
                        </div>
                        <div class="form-check">
                            <?= $this->Form->checkbox('belly_band', [
                                'label' => false,
                                'class' => 'form-check-input',
                                'id' => 'option_two',
                                'value' => '0',
                                'hiddenField' => false,
                                'onclick' => 'toggleCheckbox(this, "option_one")',
                                'checked' => ($designDraft->belly_band == '0') // Check if the value is 0
                            ]); ?>
                            <label class="form-check-label" for="option_two">No, I don't want a belly band.</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <h3 class="text-center">Upload More Student Designs</h3><br>
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
                                        'required' => false,
                                    ]) ?>
                                    <br>
                                    <div id="fileList" class="file-list"></div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>


                    <!-- Add other form controls here for other fields in the design draft -->

                    <div class="form-group text-center">
                        <?= $this->Form->button('Update design', ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
    </section>
</div>
</body>

