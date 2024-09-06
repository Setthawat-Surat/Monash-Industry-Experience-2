<?php
$this->setLayout('frontend');
use Cake\ORM\TableRegistry;
$school_table = TableRegistry::getTableLocator()->get('Schools');
$school = $school_table->find()->all();
?>
<br><br>
<section id="search-school-section" class="content-section">
    <div class="row-container">
        <div class="left-div">
            <h2>Search by school code</h2>
            <br>
            <form id="search-school-name" class="search-form" action="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display','school_catalog']) ?>" method="get">
                <input type="text" name="code" class="search-input" placeholder="Search here...">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
        <div class="right-div">
            <h2>Search by school name</h2>
            <form id="search-school-name" class="search-right-form" action="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display','school_catalog']) ?>" method="get">
                <select class="dropdown" name="name" required>
                    <option value="" disabled selected>Select school name</option>
                    <?php foreach ($school as $schools): ?>
                    <option value="<?=$schools->name?>"><?=$schools->name?></option>
                    <?php endforeach;?>
                </select>
                <button type="submit" class="select-btn">Search</button>
            </form>
        </div>
    </div>
</section>
<br><br><br><br>



