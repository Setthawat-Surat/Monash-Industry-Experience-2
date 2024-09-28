<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignPhoto $designPhoto
 * @var string[]|\Cake\Collection\CollectionInterface $designDrafts
 */
if ($this->Identity->isLoggedIn()) {
    $user_role = $this->Identity->get('role');
    if ($user_role != 'Admin') {
        echo '<script>window.location.href = "' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'access_denied']) . '";</script>';
        exit;
    }
}
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $designPhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $designPhoto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Design Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="designPhotos form content">
            <?= $this->Form->create($designPhoto) ?>
            <fieldset>
                <legend><?= __('Edit Design Photo') ?></legend>
                <?php
                    echo $this->Form->control('photo');
                    echo $this->Form->control('design_draft_id', ['options' => $designDrafts, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
