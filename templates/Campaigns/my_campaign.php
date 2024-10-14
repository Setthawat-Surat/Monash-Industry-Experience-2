<?php
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;

$this->setLayout('school_dashboard');

$campaign_table = TableRegistry::getTableLocator()->get('Campaigns');
$user_id = $this->Identity->get('id');
$created_campaign = $campaign_table->find()->where(['school_id' => $user_id])->all();

?>

<div class="container-fluid">
    <?= $this->Flash->render(); ?>
    <br>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">My Campaigns</h3>
        <a href="<?= $this->Url->build(['controller' => 'CreateCampaign', 'action' => 'index']); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Campaign
        </a>
    </div>

    <br>

    <div class="row">
        <?php foreach ($created_campaign as $created_campaigns): ?>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body position-relative">
                        <?php

                        $currentTime = FrozenTime::now();

                        $startDate = new FrozenTime($created_campaigns->start_date);
                        $endDate = new FrozenTime($created_campaigns->end_date);

                        $isOngoing = $currentTime >= $startDate;
                        $isEnd = $currentTime >= $endDate;

                        if (!$isOngoing):
                            ?>
                            <?php
                            echo $this->Form->postLink(
                                '<i class="fa-regular fa-trash-can text-danger"></i>',
                                ['controller' => 'Campaigns', 'action' => 'deletecampaign', $created_campaigns->id],
                                [
                                    'escape' => false,
                                    'class' => 'position-absolute',
                                    'style' => 'top: 23px; right: 30px;',
                                    'title' => 'Delete this campaign?',
                                    'confirm' => __('Are you sure you want to delete this campaign?'),
                                    'method' => 'DELETE'
                                ]
                            );
                            ?>
                        <?php endif; ?>

                        <h4 class="card-title text-center"><b><?= h($created_campaigns->name) ?></b></h4><br>
                        <p class="card-text">Start Date: <?= h($created_campaigns->start_date) ?></p>
                        <p class="card-text">End Date: <?= h($created_campaigns->end_date) ?></p>
                        <?php
                        $designDraft_table = TableRegistry::getTableLocator()->get('DesignDrafts');
                        $participated_classroom = $designDraft_table->find()->where(['campaign_id' => $created_campaigns->id])->count();
                        ?>
                        <p class="card-text">Total number of classes participated: <?= h($participated_classroom) ?></p>
                        <br>
                        <div class="text-center">
                            <?= !$isEnd ? $this->Html->link(
                                'Manage this campaign',
                                ['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $created_campaigns->id]],
                                ['class' => 'btn btn-primary']
                            ) : '' ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
