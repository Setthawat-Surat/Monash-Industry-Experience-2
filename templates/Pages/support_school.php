<?php
$this->setLayout('frontend');
?>
<br><br>
<section id="search-school-section" class="content-section">
    <div class="row-container">
        <div class="left-div">
            <h2>Search by school code</h2>
            <br>
            <form id="search-school-name" class="search-form" action="<?= $this->Url->build(['controller' => 'Search', 'action' => 'results']) ?>" method="get">
                <input type="text" name="code" class="search-input" placeholder="Search here...">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
        <div class="right-div">
            <h2>Search by school name</h2>
            <form id="search-school-name" class="search-right-form" action="<?= $this->Url->build(['controller' => 'Search', 'action' => 'results']) ?>" method="get">
                <select class="dropdown" required>
                    <option value="" disabled selected>Select school name</option>
                    <option value="school1">School 1</option>
                    <option value="school2">School 2</option>
                    <option value="school3">School 3</option>
                    <option value="school4">School 4</option>
                </select>
                <button type="submit" class="select-btn">Search</button>
            </form>
        </div>
    </div>
</section>
<br><br><br><br>



