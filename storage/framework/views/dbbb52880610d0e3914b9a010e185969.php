

<?php $__env->startSection('title', 'Permissions'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Permission</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Edit Permission</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('permissions.update', $permissions->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Permission:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($permissions->name); ?>" placeholder="Masukkan Nama Permission">
            </div>

            <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
            <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-danger btn-sm">Kembali</a>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/management-access/permission/edit.blade.php ENDPATH**/ ?>