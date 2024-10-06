<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\ContentBlocks\Model\Entity\ContentBlock> $contentBlocksGrouped
 */



$this->assign('title', 'Content Blocks');

$this->setLayout('admin_dashboard');
$this->Html->css('content-blocks', ['block' => true]);


$slugify = function($text) {
    return preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
};

?>
<?php
/*
// TODO: Think of a way to allow this for developers, but not for the actual website. Adding a content block doesn't
//       mean anything for end users - it needs to be hard coded into a template somewhere to make sense. Perhaps
//       it can just be guarded behind a DEBUG flag with an appropriate confirm() dialog warning that it needs to
//       be used in a template after being added...
echo $this->Html->link(__('New Content Block'), ['action' => 'add'], ['class' => 'button button-outline float-right'])
*/
?>


<div class="space"></div>
<div class="contentBlocks index content">

    <?= $this->Flash->render(); ?>
    <h3><?= __('Content Blocks') ?></h3>

    <div class="filter-container">
        <label for="content-blocks-filter" class="filter-label">Select a Parent to Edit Content Blocks:</label>
        <select id="content-blocks-filter" onchange="filterContentBlocks(this.value)" class="filter-select">
            <option value="">-- Choose a Parent --</option>
            <?php foreach(array_keys($contentBlocksGrouped) as $parent) { ?>
                <option value="<?= $slugify($parent) ?>" <?= $parent === 'global parent' ? 'selected' : '' ?>><?= $parent ?></option>
            <?php } ?>
        </select>
    </div>

    <?php foreach($contentBlocksGrouped as $parent => $contentBlocks) { ?>
        <div class="content-blocks-group" id="<?= $slugify($parent) ?>" style="display: none;">
            <h4 class="content-blocks--list-subheading">
                <a href="/UrlHandler/<?= $parent ?>">
                    <?= $parent ?>
                </a>
            </h4>

            <ul class="content-blocks--list-group">
                <?php foreach($contentBlocks as $contentBlock) { ?>
                    <li class="content-blocks--list-group-item">
                        <div class="content-blocks--text">
                            <div class="content-blocks--display-name">
                                <?= $contentBlock['label'] ?>
                            </div>
                            <div class="content-blocks--description">
                                <?= $contentBlock['description'] ?>
                            </div>
                        </div>
                        <div class="content-blocks--actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contentBlock->id]) ?>
                            <?php if (!empty($contentBlock->previous_value)) echo " :: " . $this->Form->postLink(__('Restore'), ['action' => 'restore', $contentBlock->id], ['confirm' => __("Are you sure you want to restore the previous version for this item?\n{0}/{1}\nNote: You cannot cancel this action!", $contentBlock->parent, $contentBlock->slug)]) ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>

<script>
    function filterContentBlocks(selectedParent) {
        const allGroups = document.querySelectorAll('.content-blocks-group');
        allGroups.forEach(group => {
            group.style.display = 'none';
        });

        if (selectedParent) {
            const selectedGroup = document.getElementById(selectedParent);
            if (selectedGroup) {
                selectedGroup.style.display = 'block';
            }
        }
    }
</script>

<style>
    /* Page Styles */
    .contentBlocks {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #333;
        margin-bottom: 20px;
    }

    .filter-container {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filter-label {
        font-weight: bold;
        color: #555;
        margin-right: 10px;
    }

    .filter-select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .filter-select:focus {
        border-color: #007bff;
        outline: none;
    }

    .content-blocks--list-subheading {
        margin-top: 20px;
        color: #007bff;
        font-size: 18px;
    }

    .content-blocks--list-group {
        list-style-type: none;
        padding: 0;
    }

    .content-blocks--list-group-item {
        background-color: #ffffff;
        border: 1px solid #e1e1e1;
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px;
        transition: box-shadow 0.3s;
    }

    .content-blocks--list-group-item:hover {
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    }

    .content-blocks--text {
        margin-bottom: 10px;
    }

    .content-blocks--actions a {
        color: #007bff;
        text-decoration: none;
    }

    .content-blocks--actions a:hover {
        text-decoration: underline;
    }

    .contentBlocks {
        background-color: #f9f9f9; /* Background color */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Padding inside the block */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        width: 90%; /* Width is 90% of the screen */
        max-width: 900px; /* Maximum width is 900px */
        margin: 0 auto; /* Center the block */
    }


</style>
