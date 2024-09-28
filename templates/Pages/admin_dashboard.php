<?php
$this->setLayout('Admin_dashboard');

use Cake\ORM\TableRegistry;

$design_draft_table = TableRegistry::getTableLocator()->get('DesignDrafts');
$awaiting_upload_design_count = $design_draft_table->find()->where(['approval_status' => 0, 'final_design_photo IS' => null])->count();

if ($this->Identity->isLoggedIn()) {
    $user_role = $this->Identity->get('role');
    if ($user_role != 'Admin') {
        echo '<script>window.location.href = "' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'access_denied']) . '";</script>';
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1><br>
                        <?php if ($awaiting_upload_design_count > 0) { ?>
                            <div class="alert alert-warning mt-4" role="alert">
                                <h4 class="alert-heading">
                                    <i class="fas fa-exclamation-triangle"></i> Action required!
                                </h4>
                                <p>You have upcoming designs awaiting your final submission. Please upload your final design.</p>
                                <hr>
                                <button type="button" class="btn btn-light btn-warning mt-3" onclick="window.location.href='<?= $this->Url->build(['controller'=>'DesignDrafts', 'action' => 'adminViewDesign']) ?>'">Upload Final Design</button>
                            </div><br><br>
                        <?php } ?>



                        <!--
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        !-->

                        <?php
                        $school_table = TableRegistry::getTableLocator()->get('Schools');
                        $school_rep_account = $school_table->find()->orderBy(['approval_status' => 'ASC'])->toArray();

                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-solid fa-user me-1"></i>
                                User Accounts
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <?= $this->Flash->render() ?>
                                    <thead>
                                        <tr>
                                            <th>School Name</th>
                                            <th>School Address</th>
                                            <th>School Code</th>
                                            <th>Representative Name</th>
                                            <th>Representative Email</th>
                                            <th>Account Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>School Name</th>
                                            <th>School Address</th>
                                            <th>School Code</th>
                                            <th>Representative Name</th>
                                            <th>Representative Email</th>
                                            <th>Account Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($school_rep_account as $school_rep_accounts): ?>
                                            <tr>
                                                <td><?=$school_rep_accounts->name?></td>
                                                <td><?=$school_rep_accounts->address?></td>
                                                <td><?=$school_rep_accounts->code?></td>
                                                <td><?=$school_rep_accounts->rep_first_name . ' ' . $school_rep_accounts->rep_last_name?></td>
                                                <td><?=$school_rep_accounts->rep_email?></td>
                                                <td>
                                                    <a href="<?= $this->Url->build(['controller' => 'Schools', 'action' => 'updateAccountStatus', $school_rep_accounts->id, $school_rep_accounts->approval_status]) ?>" onclick="return confirm('Are you sure that you want to change the account status?');">
                                                        <?= $school_rep_accounts->approval_status == 1 ? 'Verified' : 'Not Verified' ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
