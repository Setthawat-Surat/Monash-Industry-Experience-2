<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'frontend'; // Use the correct layout for your project
$this->assign('title', 'Campaign');
?>




<div class="space"></div>
<body>

<section id="activity-registration-section">
    <div class="container">
        <h2>Register New Activity</h2>

        <form id="activity-registration-form" action="/create" method="POST"> <!-- Update action URL to your server endpoint -->

            <!-- Activity Name -->
            <div class="form-group">
                <label for="name">Activity Name</label>
                <input type="text" id="name" name="name" required pattern="[a-zA-Z\s]*" minlength="3" title="Activity Name should only contain letters and spaces" placeholder="Enter activity name">
            </div>

            <!-- Default Sales Price -->
            <div class="form-group">
                <label for="default_sales_price">Default Sales Price</label>
                <input type="number" id="default_sales_price" name="default_sales_price" required min="0" step="0.01" placeholder="Enter default sales price">
            </div>

            <!-- Start Date -->
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>

            <!-- End Date -->
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="submit-btn">Register Activity</button>
            </div>

        </form>
    </div>
</section>
</body>
</html>

