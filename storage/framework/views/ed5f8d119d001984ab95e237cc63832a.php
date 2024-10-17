

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('table-user')): ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah-user')): ?>        
                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success btn-sm">Tambah Data</a>  
                <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Roles</th>
                                <th>Foto</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->jabatan); ?></td>
                                    <td>
                                        <?php if(!empty($item->getRoleNames())): ?>
                                            <?php $__currentLoopData = $item->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolename): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="badge badge-pill badge-info"><?php echo e($rolename); ?></label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->foto): ?>
                                        <img src="<?php echo e(asset('storage/foto_user/' . $item->foto)); ?>"  width="70">
                                        <?php else: ?>
                                            No Image
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah-user')): ?>    
                                            <a href="<?php echo e(route('users.edit', $item->id)); ?>" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus-user')): ?>
                                            <button class="btn btn-outline-danger btn-sm " onclick="deletePermission(<?php echo e($item->id); ?>)">Delete</button>
                                            
                                            <form id="deleteForm<?php echo e($item->id); ?>" action="<?php echo e(route('users.destroy', $item->id)); ?>" method="POST" style="display: inline;">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/management-access/user/index.blade.php ENDPATH**/ ?>