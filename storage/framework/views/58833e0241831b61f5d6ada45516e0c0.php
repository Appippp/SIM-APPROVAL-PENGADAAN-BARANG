


<?php $__env->startSection('title', 'Permintaan Units'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Permintaan Units</h1>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('table-permintaan')): ?>
    <div class="card">
        <div class="card-body">
            
            <div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah-permintaan')): ?>
                    <a href="<?php echo e(route('unit-permintaan.create')); ?>" class="btn btn-success btn-sm mb-4" > <i class="fa fa-plus"></i> Tambah Data</a>
                <?php endif; ?>
            </div>

            <div class="table-resposive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($item->nomor_surat); ?></td>
                                <td><?php echo e($item->tanggal); ?></td>
                                <td class="text-center">
                                    <?php if($item->manager_klinik_approve == 'Terverifikasi oleh Manager Klinik'): ?>
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Terverfikasi oleh Manager Klinik</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-dark btn-sm" data-target="#detailModal-<?php echo e($item->id); ?>" data-toggle="modal"><i class="fas fa-eye"></i> Show </a>
                                    
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

<?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal untuk detail data permintaan -->
    <div class="modal fade" id="detailModal-<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $item->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->nama_barang); ?></td>
                                    <td><?php echo e($item->satuan); ?></td>
                                    <td><?php echo e($item->stok); ?></td>
                                    <td><?php echo e($item->jumlah); ?></td>
                                    <td>
                                        <?php if($item->manager_klinik_approve == 'Approved by Manager Klinik'): ?>
                                        <span class="badge badge-success"> <i class="fas fa-check"></i> Approved</span>
                                        <?php elseif($item->manager_klinik_approve == 'Pending'): ?>
                                            <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                                        <?php elseif($item->manager_klinik_approve == 'Rejected by Manager Klinik'): ?>
                                            <span class="badge badge-danger"> <i class="fas fa-times"></i> Rejected</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->keterangan_rejected); ?></td>
                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/unit-permintaan/index.blade.php ENDPATH**/ ?>