<?php
use Cake\ORM\TableRegistry;

$this->setLayout('Admin_dashboard');
$school_table = TableRegistry::getTableLocator()->get('Schools');
$campaign_table = TableRegistry::getTableLocator()->get('Campaigns');
$design_draft_table = TableRegistry::getTableLocator()->get('DesignDrafts');
$design_photo_table = TableRegistry::getTableLocator()->get('DesignPhotos');

$school = $school_table->find()->all();
?>

<div id="layoutSidenav_content">
    <section id="upload-final-design">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 text-center">Upload Final Design</h1><br><br>
                <?= $this->Flash->render(); ?>

                <h5 class="upload-warning"> <i class="fas fa-exclamation-triangle"></i>&nbsp; Awaiting for your final design</h5><br>

                <?php foreach ($school as $schools): ?>
                    <?php
                    $campaign = $campaign_table->find()->where(['school_id' => $schools->id]);
                    $created_campaign_count = $campaign_table->find()->where(['school_id' => $schools->id])->count();
                    $design = $design_draft_table->find()->where(['user_id' => $schools->id]);
                    $final_design_check_flag = true;
                    foreach ($design as $final_design_check):
                        if ($final_design_check->final_design_photo == null):
                            $final_design_check_flag = false;
                        endif;
                        endforeach;
                    ?>
                    <?php if ($created_campaign_count > 0 && !$final_design_check_flag): ?>
                        <h5 class="text-center"><strong><?= h($schools->name) ?></strong></h5><br>
                    <?php endif; ?>
                    <?php foreach ($design as $designs): ?>
                        <?php
                        $design_photo = $design_photo_table->find()->where(['design_draft_id' => $designs->id]);
                        ?>
                        <?php if ($designs->final_design_photo == null): ?>
                            <!-- Card Section -->
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-content">
                                                <h5 class="card-title text-center"><?= h($designs->design_yearlevel . " Design") ?></h5><br>
                                                <p class="card-text">Specification: <?= h($designs->specifications) ?></p>
                                                <p class="card-text">Status: <?= $designs->approval_status ? 'Approved' : 'Awaiting for your final design upload' ?></p>
                                                <p class="card-text">Design photos:</p>
                                                <div class="card-img-container">
                                                    <?php foreach ($design_photo as $photo): ?>
                                                        <?= $this->Html->image(
                                                            'student_designs_img/' . h($photo->photo),
                                                            ['class' => 'card-img', 'alt' => 'Design Photo']
                                                        ) ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <p class="card-text">School logo:</p>
                                                <div class="card-img-container">
                                                    <?= $this->Html->image(
                                                        'school_logo_img/' . h($schools->logo),
                                                        ['class' => 'card-img', 'alt' => 'School logo']
                                                    ) ?>
                                                </div>
                                            </div>
                                            <div class="card-buttons">
                                                <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'addFinalDesign', '?' => ['dID' => $designs->id]]) ?>" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i> Upload Final Design
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'downloadDesigns', $designs->id]) ?>" class="btn btn-secondary">
                                                    <i class="fas fa-download"></i> Download Designs
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <!-- End of Card Section -->
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <h5 class="upload-success"><i class="fas fa-check-circle"></i>&nbsp;Successfully uploaded</h5><br>

                <?php foreach ($school as $schools): ?>
                    <?php
                    $campaign = $campaign_table->find()->where(['school_id' => $schools->id]);
                    $created_campaign_count = $campaign_table->find()->where(['school_id' => $schools->id])->count();
                    $design = $design_draft_table->find()->where(['user_id' => $schools->id]);
                    $final_design_check_flag = true;
                    foreach ($design as $final_design_check):
                        if ($final_design_check->final_design_photo != null):
                            $final_design_check_flag = true;
                            break;
                        else:
                            $final_design_check_flag = false;
                        endif;
                    endforeach;
                    ?>
                    <?php if ($created_campaign_count > 0 && $final_design_check_flag): ?>
                        <h5 class="text-center"><strong><?= h($schools->name) ?></strong></h5><br>
                    <?php endif; ?>
                    <?php foreach ($design as $designs): ?>
                        <?php
                        $design_photo = $design_photo_table->find()->where(['design_draft_id' => $designs->id]);
                        ?>
                        <?php if ($designs->final_design_photo !== null): ?>
                            <!-- Card Section -->
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-content">
                                                <h5 class="card-title text-center"><?= h($designs->design_yearlevel . " Design") ?></h5><br>
                                                <p class="card-text">Specification: <?= h($designs->specifications) ?></p>
                                                <p class="card-text">Status: <?= $designs->approval_status ? 'Approved' : 'Awaiting for your final design upload' ?></p>
                                                <p class="card-text">Design photos:</p>
                                                <div class="card-img-container">
                                                    <?php foreach ($design_photo as $photo): ?>
                                                        <?= $this->Html->image(
                                                            'student_designs_img/' . h($photo->photo),
                                                            ['class' => 'card-img', 'alt' => 'Design Photo']
                                                        ) ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <p class="card-text">School logo:</p>
                                                <div class="card-img-container">
                                                    <?= $this->Html->image(
                                                        'school_logo_img/' . h($schools->logo),
                                                        ['class' => 'card-img', 'alt' => 'School logo']
                                                    ) ?>
                                                </div>
                                                <p class="card-text">Final disign:</p>
                                                <div class="card-img-container">
                                                    <?= $this->Html->image(
                                                        'final_design/' . h($designs->final_design_photo),
                                                        ['class' => 'card-img', 'alt' => 'Final Design Photo']
                                                    ) ?>
                                                </div>
                                            </div>
                                            <div class="card-buttons">
                                                <!--
                                                <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'addFinalDesign', '?' => ['dID' => $designs->id]]) ?>" class="btn btn-primary">
                                                    <i class="fas fa-pencil-alt"></i> Update Final Design
                                                </a>
                                                -->

                                                <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'downloadDesigns', $designs->id]) ?>" class="btn btn-secondary">
                                                    <i class="fas fa-download"></i> Download Designs
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <!-- End of Card Section -->
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </main>
    </section>
</div>
