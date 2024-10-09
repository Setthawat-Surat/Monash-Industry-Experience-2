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

<div class="space"></div>
<div class="contentBlocks index content">

    <?= $this->Flash->render(); ?>
    <h3><?= __('Content Blocks') ?></h3>

    <div class="filter-container">
        <div class="filter-row">
            <!-- Parent Filter -->
            <label for="content-blocks-filter" class="filter-label">Select Parent:</label>
            <select id="content-blocks-filter" class="filter-select">
                <option value="">-- Select Parent --</option>
                <?php foreach(array_keys($contentBlocksGrouped) as $parent) { ?>
                    <option value="<?= $slugify($parent) ?>"><?= $parent ?></option>
                <?php } ?>
            </select>

            <!-- Keyword Search -->
            <label for="keyword-filter" class="filter-label">Keyword Search:</label>
            <input type="text" id="keyword-filter" class="filter-input" placeholder="Enter keyword">
        </div>

        <div class="filter-row">
            <!-- Type Filter -->
            <label for="category-filter" class="filter-label">Select Type:</label>
            <select id="category-filter" class="filter-select">
                <option value="">-- Select Type --</option>
                <option value="text">Text</option>
                <option value="image">Image</option>
                <option value="html">Html</option>
            </select>
        </div>
    </div>

    <?php foreach($contentBlocksGrouped as $parent => $contentBlocks) { ?>
        <div class="content-blocks-group" id="<?= $slugify($parent) ?>" style="display: none;">
            <a href="/UrlHandler/<?= $slugify($parent) ?>"><h4 class="content-blocks--list-subheading"><?= $parent ?></h4></a>

            <?php foreach($contentBlocks as $contentBlock) { ?>
                <li class="content-blocks--list-group-item" data-type="<?= $contentBlock['type'] ?>">
                    <div class="content-blocks--text">
                        <div class="content-blocks--display-name"><?= $contentBlock['label'] ?></div>
                        <div class="content-blocks--description"><?= $contentBlock['description'] ?></div>
                    </div>
                    <div class="content-blocks--actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contentBlock->id]) ?>
                        <?php if (!empty($contentBlock->previous_value)) echo " :: " . $this->Form->postLink(__('Restore'), ['action' => 'restore', $contentBlock->id], ['confirm' => __("Are you sure you want to restore the previous version for this item?\n{0}/{1}\nNote: You cannot cancel this action!", $contentBlock->parent, $contentBlock->slug)]) ?>
                    </div>
                </li>
            <?php } ?>

        </div>
    <?php } ?>
</div>

<script>
    // Attach event listeners to the filters
    document.getElementById('content-blocks-filter').addEventListener('change', filterContentBlocks);
    document.getElementById('category-filter').addEventListener('change', filterContentBlocks);
    document.getElementById('keyword-filter').addEventListener('input', filterContentBlocks);

    // Multi-condition filtering function
    function filterContentBlocks() {
        const selectedParent = document.getElementById('content-blocks-filter').value;
        const selectedType = document.getElementById('category-filter').value;
        const keyword = document.getElementById('keyword-filter').value.toLowerCase();

        const allGroups = document.querySelectorAll('.content-blocks-group');

        allGroups.forEach(group => {
            let isVisible = true;

            // Parent filter
            if (selectedParent && !group.id.includes(selectedParent)) {
                isVisible = false;
            }

            // Filter content blocks within the group
            const items = group.querySelectorAll('.content-blocks--list-group-item');
            items.forEach(item => {
                let itemVisible = true;

                // Type filter (filter based on contentBlock['type'])
                const type = item.getAttribute('data-type');
                if (selectedType && type !== selectedType) {
                    itemVisible = false;
                }

                // Keyword search filter (searching label or description, both converted to lowercase)
                const label = item.querySelector('.content-blocks--display-name').textContent.toLowerCase();
                const description = item.querySelector('.content-blocks--description').textContent.toLowerCase();
                if (keyword && !label.includes(keyword) && !description.includes(keyword)) {
                    itemVisible = false;
                }

                // Show or hide item based on conditions
                item.style.display = itemVisible ? 'block' : 'none';
            });

            // Hide parent group if no items are visible
            const visibleItems = group.querySelectorAll('.content-blocks--list-group-item[style*="block"]');
            group.style.display = (visibleItems.length > 0 && isVisible) ? 'block' : 'none';
        });
    }

</script>

<style>
    /* Page styling */
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

    .filter-row {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .filter-row .filter-label {
        margin-right: 10px;
    }

    .filter-label {
        font-weight: bold;
        color: #555;
    }

    .filter-select, .filter-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
        margin-right: 20px;
    }

    .filter-select:focus, .filter-input:focus {
        border-color: #007bff;
        outline: none;
    }

    .content-blocks--list-subheading {
        margin-top: 20px;
        color: #007bff;
        font-size: 18px;
    }

    .content-blocks--description-heading {
        margin-top: 15px;
        font-size: 16px;
        color: #555;
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
</style>
