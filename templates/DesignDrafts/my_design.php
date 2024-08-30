<?php
$this->setLayout('School_dashboard');
$campaignId = $this->request->getQuery('cID');
?>
<div class="container-fluid">
    <?= $this->Flash->render(); ?>
    <br>
    <h1 style="text-align: center; margin: 0 auto;"><?= h($campaign->name) ?> Campaign</h1><br><br>

    <div class="text-center">
        <a href="<?= $this->Url->build(['controller' => 'DesignDrafts', 'action' => 'create', '?' => ['cID' => $campaignId]]) ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Design
        </a>
    </div>


</div>

