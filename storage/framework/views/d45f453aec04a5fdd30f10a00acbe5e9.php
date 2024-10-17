



<?php $__env->startSection('title', 'Detail Permintaan Unit'); ?>


<?php $__env->startSection('content'); ?>

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Permintaan Unit</h1>
</div>

<div class="card">
    <div class="card-body">
        <p><strong>Nomor Surat:</strong> <?php echo e($nomorSurat->nomor_surat); ?></p>
        <p><strong>Tanggal:</strong> <?php echo e($nomorSurat->tanggal); ?></p>
        <p><strong>Unit:</strong> <?php echo e($nomorSurat->unit->nama_unit); ?></p>
        <p><strong>Kategori:</strong> <?php echo e($nomorSurat->kategori ? $nomorSurat->kategori->nama_kategori : '-'); ?></p>
    </div>
</div>


<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($item->nama_barang); ?></td>
                        <td><?php echo e($item->satuan); ?></td>
                        <td><?php echo e($item->stok); ?></td>
                        <td><?php echo e($item->jumlah); ?></td>
                        <td><?php echo e($item->keterangan ? $item->keterangan : '-'); ?></td>
                        <td class="text-center"> 
                            <?php if($item->manager_klinik_approve == 'Approved by Manager Klinik'): ?>
                            <span class="badge badge-success"> <i class="fas fa-check"></i> Approved</span>
                            <?php elseif($item->manager_klinik_approve == 'Pending'): ?>
                                <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                            <?php elseif($item->manager_klinik_approve == 'Rejected by Manager Klinik'): ?>
                                <span class="badge badge-danger"> <i class="fas fa-times"></i> Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <!-- Form untuk approve -->
                            <form action="<?php echo e(route('approve_barang', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Approve</button>
                            </form>
                            <!-- Form untuk reject -->
                            <form action="<?php echo e(route('reject_barang', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-times"></i> Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo e(route('manager-klinik.index')); ?>" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Simpan</a>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/manager-klinik/show.blade.php ENDPATH**/ ?>