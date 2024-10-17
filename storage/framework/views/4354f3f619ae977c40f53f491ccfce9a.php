

<?php $__env->startSection('title', 'Role Permissions'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role : <?php echo e($role->name); ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('roles.addPermissionToRole', $role->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-3">
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <label>
                                
                                <input name="permission[]" value="<?php echo e($item->name); ?>" <?php echo e(in_array($item->id, $rolePermissions) ?  'checked':''); ?> type="checkbox">
                                <span class="label-text badge badge-success ml-3"><?php echo e($item->name); ?></span>                                                
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
        </div>
    </div>   
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/management-access/role/add-permission.blade.php ENDPATH**/ ?>