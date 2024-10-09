<style>

</style>

<?php
use Cake\ORM\TableRegistry;

$this->setLayout('frontend');

$school_code = $this->request->getQuery('code');
$school_name = $this->request->getQuery('name');

$school_table = TableRegistry::getTableLocator()->get('Schools');
$campaign_table = TableRegistry::getTableLocator()->get('Campaigns');

// 根据学校代码或名称搜索
if ($school_code) {
    $school = $school_table->find()->where(['code' => $school_code])->first();
} elseif ($school_name) {
    $school = $school_table->find()->where(['name' => $school_name])->first();
}

if ($school) {
    $campaigns = $campaign_table->find()
        ->where([
            'school_id' => $school->id,

        ])
        ->contain(['DesignDrafts'])
        ->all();
} else {
    $campaigns = [];
}

?>

<div class="container">
    <?php if (!empty($campaigns)): ?>
        <?php foreach ($campaigns as $campaign): ?>
            <?php if (!empty($campaign->design_drafts)): ?>
                <h2 class="campaign-header">
                    <?= h($campaign->name) ?> Campaign
                    <span style="color: red;">(Ends: <?= h($campaign->end_date) ?>)</span>
                </h2>
                <div class="campaign-cards-container">
                    <?php foreach ($campaign->design_drafts as $draft): ?>
                        <div class="card">
                            <div class="card-image">
                                <?= $this->Html->image(
                                    !empty($draft->final_design_photo) ? 'final_design/' . h($draft->final_design_photo) : 'final_design/Image_placeholder.jpg',
                                    ['alt' => 'Design Photo']
                                ) ?>
                            </div>
                            <div class="card-content">
                                <div class="card-info">
                                    <h3 class="card-title"><?= h($draft->design_name) ?></h3>
                                    <p class="card-text">Year Level: <?= h($draft->design_yearlevel) ?></p>
                                    <p class="card-text">Descriptions: <?= h($draft->specifications) ?></p>
                                </div>
                                <div class="card-buttons">
                                    <button class="button-green" disabled>
                                        $<?= h($draft->sales_price) ?>
                                    </button>
                                    <button class="button-blue addToCartButton" onclick="addToCart(<?= json_encode($draft, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>)">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <h1 style="text-align: center;">No campaigns found for this school.</h1>
    <?php endif; ?>
    <br>
    <br>
    <div style="text-align: center;">
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'support_school']) ?>" class="nav-button" style="padding: 10px 20px; background-color: #0778f2de; border: none; color: white; font-size: 16px; cursor: pointer; border-radius: 5px;">
            Return
        </a>
    </div>
    <div class="space"></div>
</div>

