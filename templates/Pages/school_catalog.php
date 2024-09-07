<br><br>
<?php
use Cake\ORM\TableRegistry;

$this->setLayout('frontend');
$school_code = $this->request->getQuery('code');
$school_name = $this->request->getQuery('name');

$school_table = TableRegistry::getTableLocator()->get('Schools');
$campaign_table = TableRegistry::getTableLocator()->get('Campaigns');
$school = $school_table->find()->all();

if ($school_code) {
    $search_school = $school_table->find()
        ->where(['code' => $school_code])
        ->first();
    if ($search_school) {
        $searched_school_id = $search_school->id;

        // Fetch campaigns and associated design drafts
        $campaigns = $campaign_table->find()
            ->where(['school_id' => $searched_school_id])
            ->contain(['DesignDrafts']) // Load related design drafts
            ->all(); // This returns a collection

        if (!$campaigns->isEmpty()) {
            foreach ($campaigns as $campaign) {
                // Check if the campaign has design drafts before rendering
                if (count($campaign->design_drafts) > 0) {
                    echo '<h2 class="campaign-header">' . $campaign->name . ' Campaign <span style="color: red;">(Ends: ' . $campaign->end_date . ')</span></h2>';
                    echo '<div class="campaign-cards-container">'; // Flexbox container for campaign cards

                    foreach ($campaign->design_drafts as $draft) {
                        // Render each design draft in a card
                        echo '<div class="card">';
                        echo '<div class="card-content">'; // Flex container for image and info
                        // Image on the left
                        ?>
                        <div class="card-image">
                        <?php if (!empty($draft->final_design_photo)): ?>
                            <?= $this->Html->image('final_design/' . h($draft->final_design_photo), ['alt' => 'Design Photo']) ?>
                        <?php else: ?>
                            <?= $this->Html->image('final_design/Image_placeholder.jpg', ['alt' => 'Placeholder']) ?>
                        <?php endif; ?>
                        </div>
                        <?php
                        // Information on the right
                        echo '<div class="card-info">';
                        echo '<h3 class="card-title">' . $draft->design_name . '</h3>';
                        echo '<p class="card-text">Year Level: ' . $draft->design_yearlevel . '</p>';
                        echo '<p class="card-text">Descriptions: ' . $draft->specifications . '</p>';

                        // Buttons
                        echo '<div class="card-buttons">';
                        echo '<button class="button-green" disabled>$' . $draft->sales_price . '</button>';
                        echo '<button class="button-blue" href="#">Add to Cart</button>';
                        echo '</div>';

                        echo '</div>'; // Close card-info
                        echo '</div>'; // Close card-content
                        echo '</div>'; // Close card
                    }

                    echo '</div>'; // Close flexbox container
                }
            }
        } else {
            echo '<h1 style="text-align: center; font-family: \'Poppins\', sans-serif;">No campaigns found for this school.</h1>';
        }
    } else {
        echo '<h1 style="text-align: center; font-family: \'Poppins\', sans-serif;">No search result found.</h1>';
    }
} elseif ($school_name) {
    $search_school_by_name = $school_table->find()
        ->where(['name LIKE' => '%' . $school_name . '%'])
        ->first();
    if ($search_school_by_name) {
        $searched_school_id = $search_school_by_name->id;

        // Fetch campaigns and associated design drafts
        $campaigns = $campaign_table->find()
            ->where(['school_id' => $searched_school_id])
            ->contain(['DesignDrafts']) // Load related design drafts
            ->all(); // This returns a collection

        if (!$campaigns->isEmpty()) {
            foreach ($campaigns as $campaign) {
                // Check if the campaign has design drafts before rendering
                if (count($campaign->design_drafts) > 0) {
                    echo '<h2 class="campaign-header">' . $campaign->name . ' Campaign <span style="color: red;">(Ends: ' . $campaign->end_date . ')</span></h2>';
                    echo '<div class="campaign-cards-container">'; // Flexbox container for campaign cards

                    foreach ($campaign->design_drafts as $draft) {
                        // Render each design draft in a card
                        echo '<div class="card">';
                        echo '<div class="card-content">'; // Flex container for image and info
                        // Image on the left
                        ?>
                        <div class="card-image">
                        <?php if (!empty($draft->final_design_photo)): ?>
                            <?= $this->Html->image('final_design/' . h($draft->final_design_photo), ['alt' => 'Design Photo']) ?>
                        <?php else: ?>
                            <?= $this->Html->image('final_design/Image_placeholder.jpg', ['alt' => 'Placeholder']) ?>
                        <?php endif; ?>
                        </div>
                        <?php
                        // Information on the right
                        echo '<div class="card-info">';
                        echo '<h3 class="card-title">' . $draft->design_name . '</h3>';
                        echo '<p class="card-text">Year Level: ' . $draft->design_yearlevel . '</p>';
                        echo '<p class="card-text">Descriptions: ' . $draft->specifications . '</p>';

                        // Buttons
                        echo '<div class="card-buttons">';
                        echo '<button class="button-green" disabled>$' . $draft->sales_price . '</button>';
                        echo '<button class="button-blue">Add to Cart</button>';
                        echo '</div>';

                        echo '</div>'; // Close card-info
                        echo '</div>'; // Close card-content
                        echo '</div>'; // Close card
                    }

                    echo '</div>'; // Close flexbox container
                }
            }
        } else {
            echo '<h1 style="text-align: center; font-family: \'Poppins\', sans-serif;">No campaigns found for this school.</h1>';
        }
    } else {
        echo '<h1 style="text-align: center; font-family: \'Poppins\', sans-serif;">No search result found.</h1>';
    }
}
?>

<br><br><br>
