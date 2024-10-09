<?php

use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

$this->setLayout('school_dashboard');
$campaignId = $this->request->getQuery('cID');
?>
<div class="container-fluid">
    <?= $this->Flash->render(); ?>
    <br>
    <h1 style="text-align: center; margin: 0 auto;"><?= h($campaign->name) ?> Campaign</h1><br><br>

    <div class="text-center mb-3">
        <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'create', '?' => ['cID' => $campaignId]]) ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Design
        </a>
    </div><br>

    <section id="design-card">
        <div class="row">
            <?php foreach ($designDrafts as $draft): ?>
                <div class="col-12 mb-4"> <!-- Use col-12 to ensure full width -->
                    <div class="card position-relative h-100">
                        <div class="card-body">
                            <h4 class="card-text text-center"><?= h($draft->design_yearlevel) . " " . "Designs"?></h4>
                            <p class="card-text"><strong>Specifications:</strong> <?= h($draft->specifications) ?></p>
                            <p class="card-text"><strong>Selling Price:</strong> <?= "$" . h($draft->sales_price) ?></p>
                            <p class="card-text"><strong>Approval Status:</strong> <?= $draft->approval_status ? 'Approved' : 'Pending' ?></p>
                            <p class="card-text"><strong>Belly Bands Required? :</strong> <?= $draft->belly_band ? 'Yes' : 'No' ?></p>
                            <p class="card-text"><strong>School Logo Position:</strong> <?= h($draft->logo_position) ?></p>
                            <p class="card-text text-center"><strong>Your Uploaded Designs:</strong>
                        </div>

                        <!-- Display associated photos -->
                        <?php
                        $designPhotos = TableRegistry::getTableLocator()->get('DesignPhotos');
                        $campaign_designPhotos = $designPhotos->find()->where(['design_draft_id' => $draft->id])->all();
                        ?>
                        <?php if (!empty($campaign_designPhotos)): ?>
                            <div class="card-img-container">
                                <?php foreach ($campaign_designPhotos as $photo): ?>

                                    <?php
                                    //Get file extension
                                    $fileExtension = strtolower(pathinfo($photo->photo, PATHINFO_EXTENSION));
                                    $defaultImage = 'filePlacehloder.png'; //Alternative image path (if in PDF format)

                                    //Check if the file is in PDF format. If it is, use the default image. Otherwise, display the image
                                    if ($fileExtension === 'pdf') {
                                        $imageToDisplay = $defaultImage; //If it is a PDF, use the default image
                                    } else {
                                        $imageToDisplay = 'student_designs_img/' . $photo->photo; //Otherwise, display the actual image
                                    }
                                    ?>
                                    <?= $this->Html->image(
                                        $imageToDisplay ,
                                        ['class' => 'card-img', 'alt' => 'Design Photo']
                                    ) ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php

                        $currentTime = FrozenTime::now();

                        $startDate = new FrozenTime($campaign->start_date);
                        $endDate = new FrozenTime($campaign->end_date);

                        $isOngoing = $currentTime >= $startDate;


                        ?>
                        <div class="card-delete-icon position-absolute" style="top: 10px; right: 10px;">

                            <?= !$isOngoing ? $this->Html->link(
                                '<i class="fa-regular fa-edit text-primary"></i>',
                                ['controller' => 'DesignDrafts', 'action' => 'editDesign', $draft->id, '?' => ['dID' => $draft->id, 'cID' => $campaignId]],
                                [
                                    'escape' => false,
                                    'title' => 'Edit this design?',
                                    'class' => 'mr-2' // Add margin to separate the icons
                                ]
                            ) : '' ?>

                            <?= !$isOngoing ? $this->Form->postLink(
                                '<i class="fa-regular fa-trash-can text-danger"></i>',
                                ['controller' => 'DesignDrafts', 'action' => 'deletedesigns', $draft->id, '?' => ['cID' => $campaignId]],
                                [
                                    'escape' => false,
                                    'confirm' => __('Are you sure you want to delete this design draft?'),
                                    'title' => 'Delete this design?'
                                ]
                            ) : '' ?>

                        </div>

                        <?php if (!empty($draft->final_design_photo)): ?>
                            <p class="card-text text-center"><strong>Final Design:</strong></p>
                            <div class="card-img-container">
                                <?= $this->Html->image(
                                    'final_design/' . h($draft->final_design_photo),
                                    ['class' => 'card-img', 'alt' => 'Final Design Photo']
                                ) ?>
                            </div>
                        <?php else: ?>
                            <p class="card-text text-center"><strong>Final Design:</strong></p>
                            <p class="card-text text-center">Final design hasn't been upload by admin staffs yet.</p><br>
                        <?php endif; ?>

                        <div class="card-body">
                            <?php if($draft->final_design_photo && $draft->approval_status == 0): ?>
                                <p class="card-text"><strong>Confirm your final design?</strong></p>

                                <?= $this->Form->create($draft) ?>

                                <!-- Green Confirm Button -->
                                <?= $this->Form->button('Yes, I like this final design', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-success',
                                    'confirm' => __('Confirm this final design?'),
                                    'formaction' => $this->Url->build([
                                        'action' => 'confirmFinalDesign',
                                        $draft->id,
                                        '?' => ['cID' => $campaignId]
                                    ]),
                                    'style' => 'margin-right: 20px;',
                                ]); ?>

                                <!-- Red Cancel Button -->
                                <?= $this->Form->button('No, I am not happy with this final design', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'confirm' => __('Reject this final design?'),
                                    'formaction' => $this->Url->build([
                                        'action' => 'rejectFinalDesign',
                                        $draft->id,
                                        '?' => ['cID' => $campaignId]
                                    ]),
                                ]); ?>

                                <?= $this->Form->end(); ?>

                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
