

<?php $__env->startSection('title', 'Roles'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
    </div>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('table-role')): ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Roles</h6>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah-role')): ?>
                    <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-success btn-sm">Tambah Data</a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Roles</th>
                                <th class="text-center" width="40%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td class="text-center">
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah-role')): ?>
                                            <a href="<?php echo e(route('roles.edit', $item->id)); ?>" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>
                                        <?php endif; ?>

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah-permission-role')): ?>
                                            <a href="<?php echo e(route('roles.addPermissionToRole', $item->id)); ?>" class="btn btn-outline-dark btn-sm mr-2"> <i class="fa fa-pencil"></i> Add / Edit Role Permissions </a>
                                        <?php endif; ?>

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus-role')): ?>
                                            <button class="btn btn-outline-danger btn-sm " onclick="deletePermission(<?php echo e($item->id); ?>)">Delete</button>
                                                    
                                            <form id="deleteForm<?php echo e($item->id); ?>" action="<?php echo e(route('roles.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        <?php endif; ?>       
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>


    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/management-access/role/index.blade.php ENDPATH**/ ?>