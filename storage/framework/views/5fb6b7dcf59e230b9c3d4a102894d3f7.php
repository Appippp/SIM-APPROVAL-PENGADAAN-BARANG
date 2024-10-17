


<?php $__env->startSection('title', 'Manager Operational'); ?>


<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Permintaan Units</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="23%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $nomorSuratTerverfikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nomor_surat); ?></td>
                            <td><?php echo e($item->tanggal); ?></td>
                            <td class="text-center">
                                <?php if($item->manager_operational_approve == 'Terverifikasi oleh Manager Operational'): ?>
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Disetujui</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                    <?php endif; ?>

                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('manager-operational.show', $item->id)); ?>" class="btn btn-dark btn-sm"> <i class="fas fa-eye"></i> Detail Permintaan</a>
                               
                                <!-- Form untuk approve -->
                                <form action="<?php echo e(route('approve_surat.operational', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Setujui</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/approval-surat/manager-operational/index.blade.php ENDPATH**/ ?>