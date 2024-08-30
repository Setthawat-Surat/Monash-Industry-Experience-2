<?php
use Cake\ORM\TableRegistry;

$this->setLayout('School_dashboard');

$campaign_table = TableRegistry::getTableLocator()->get('Campaigns');
$user_id = $this->Identity->get('id');
$created_campaign= $campaign_table->find()->where(['school_id' => $user_id])->all();
?>

<div class="container-fluid">
    <br>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">My Campaigns</h3>
    </div>
    <br>

    <div class="row">
        <?php foreach ($created_campaign as $created_campaigns):?>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h4 class="card-title text-center"><b><?= $created_campaigns->name ?></b></h4><br>
                        <p class="card-text">Start Date: <?= $created_campaigns->start_date?></p>
                        <p class="card-text">End Date: <?= $created_campaigns->end_date?></p>
                        <?php
                        $designDraft_table = TableRegistry::getTableLocator()->get('DesignDrafts');
                        $participated_classroom = $designDraft_table->find()->where(['campaign_id' => $created_campaigns->id])->count();
                        ?>

                        <p class="card-text">Total number of classes participated: <?= $participated_classroom ?></p>
                        <br>
                        <div class="text-center">
                            <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'myDesign', '?' => ['cID' => $created_campaigns->id]]) ?>" class="btn btn-primary">Manage this campaign</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
