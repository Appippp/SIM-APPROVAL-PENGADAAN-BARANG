

<?php $__env->startSection('title', 'Detail Permintaan Unit'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Permintaan Unit</h1>
    <a href="<?php echo e(route('manager-keuangan.index')); ?>" class="btn btn-danger  "> <i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="card">
    <div class="card-body">

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th colspan="2" style="padding: 10px">
                        <span style="color:black; font-weight: bold; font-size: 14pt"> PT. NUSA LIMA MEDIKA </span>
                        <br>
                        <span style="color: black; font-size: 12pt">Unit : Kantor Pusat</span>
                    </th>

                    <th class="text-center">
                        <span style="color:black; font-weight: bold; font-size: 14pt">MEMO PERSETUJUAN BARANG BARANG</span>
                    </th>
                    <th class="text-center">
                        <span style="color:black; font-size: 12pt">Nomor</span>
                        <br>
                        <span style="color:black; font-size: 12pt">Tanggal</span>
                        <br>
                        <span style="color:black; font-size: 12pt">Unit</span>
                    </th>
                    <th style="padding-left: 4px">
                        <span style="color: black; font-size: 12pt">: <?php echo e($nomorSurat->nomor_surat); ?></span>
                        <br>
                        <span style="color: black; font-size: 12pt">: <?php echo e($nomorSurat->tanggal); ?></span>
                        <br>
                        <span style="color: black; font-size: 12pt">: <?php echo e($nomorSurat->unit->nama_unit); ?></span>
                    </th>
                </tr>
                <tr class="text-center" style="color: black; font-size: 12pt">
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Untuk</th>
                    <th>Satuan</th>
                    <th>Banyaknya</th>
                </tr>
                <tr>
                    <th></th>
                    <th style="padding-left: 5px; font-size: 12pt; color: black"><?php echo e($nomorSurat->kategori->nama_kategori); ?></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

              <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr style="font-size: 12pt; color: black; text-align: center" >
                        <td><?php echo e($loop->iteration); ?></td>
                        <td style="text-align: left"><?php echo e($item->merk); ?></td>
                        <td><?php echo e($item->untuk); ?></td>
                        <td><?php echo e($item->satuan); ?></td>
                        <td><?php echo e($item->jumlah); ?></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr style="font-size: 12pt; color: black">
                    <th colspan="2">Kantor Direksi</th>
                    <th class="text-center">No. PB :</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr style="font-size: 12pt; color: black">
                    <th colspan="2">Kantor Direksi</th>
                    <th class="text-center">No. SP : </th>
                    <th></th>
                    <th></th>
                </tr>
                

            </tfoot>
        </table>
        
        

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/approval-surat/manager-keuangan/show.blade.php ENDPATH**/ ?>