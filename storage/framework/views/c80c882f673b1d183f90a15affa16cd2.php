<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-3">
        <div class="card">
            <div class="card-body">
                Welcome!  <?php echo e($user = auth()->user()->fullname); ?>

            </div>
        </div>
        <div class="row mt-3 py-3">
            <div class="col-m-d-8 col-lg-8 col-sm-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h5>Project Progress</h5>
                    </div>
                    <div class="card-body">
                        <table class="table m-0 table-hover table-sm">
                            <colgroup>
                              <col width="5%">
                              <col width="30%">
                              <col width="35%">
                              <col width="15%">
                              <col width="15%">
                            </colgroup>
                            <thead>
                              <th>#</th>
                              <th>Project</th>
                              <th>Progress</th>
                              <th>Status</th>
                              <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->project_name); ?></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar <?php echo e($row->totalPercentage >= 1 && $row->totalPercentage <= 10 ? 'bg-danger' : ($row->totalPercentage >= 11 && $row->totalPercentage <= 20 ? 'bg-warning' : ($row->totalPercentage >= 21 && $row->totalPercentage <= 40 ? 'bg-info' : 'bg-success'))); ?>" role="progressbar" style="width: <?php echo e($row->totalPercentage); ?>%;" aria-valuenow="<?php echo e($row->totalPercentage); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e($row->totalPercentage); ?>%</div>
                                        </div>
                                    </td>
                                    <td><?php echo e($row->status); ?></td>
                                    <td>
                                        <a href="/admin/projects/view-details/<?php echo e($row->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-folder"></i> View</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3><?php echo e($totalProjects); ?></h3>
                                <p>Total Projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3>1</h3>
                                <p>Total Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\construction-management-system\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>