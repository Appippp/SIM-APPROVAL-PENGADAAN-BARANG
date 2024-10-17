

<?php $__env->startSection('title', 'Detail Permintaan Unit'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Permintaan Unit</h1>
    <a href="<?php echo e(route('direktur.index')); ?>" class="btn btn-danger  "> <i class="fa fa-arrow-left"></i> Kembali</a>
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
                        <span style="color:black; font-weight: bold; font-size: 14pt">MEMO PERMINTAAN BARANG</span>
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

                <?php for($i = 0; $i < 7; $i++): ?>
                    <?php if(isset($barang[$i])): ?>
                        <tr style="font-size: 12pt; color: black">
                            <td class="text-center"><?php echo e($i+1); ?></td>
                            <td style="text-align: left"><?php echo e($barang[$i]->nama_barang); ?></td>
                            <td class="text-center"><?php echo e($barang[$i]->untuk); ?></td>
                            <td class="text-center"><?php echo e($barang[$i]->satuan); ?></td>
                            <td class="text-center"><?php echo e($barang[$i]->jumlah); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr style="font-size: 12pt; color: black">
                            <td class="text-center"><?php echo e($i+1); ?></td>
                            <td style="text-align: left"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    <?php endif; ?>
                <?php endfor; ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/approval-surat/direktur/show.blade.php ENDPATH**/ ?>