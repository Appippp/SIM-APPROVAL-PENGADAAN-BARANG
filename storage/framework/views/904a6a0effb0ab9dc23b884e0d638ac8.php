

<?php $__env->startSection('title', 'Edit Permintaan'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary-800">Edit Permintaan</h1>
</div>

<form action="<?php echo e(route('daftar-permintaan.update', $nomorSurat->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

  

    
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-row">
                <!-- Nomor Surat -->
                <div class="form-group col-md-3">
                    <label for="name1">Nomor Surat :</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="<?php echo e($nomorSurat->nomor_surat); ?>"  placeholder="Masukkan Nomor Surat" > 
                </div>
        
                <!-- Tanggal -->
                <div class="form-group col-md-3">
                    <label for="name2">Tanggal :</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo e($nomorSurat->tanggal); ?>">
                </div>
        
                <!-- Units -->                
                <div class="form-group col-md-3">
                    <label for="name3">Units:</label>
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">Pilih Units</option>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $nomorSurat->unit_id ? 'selected' : ''); ?>>
                                <?php echo e($item->nama_unit); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
        
                <!-- Kategori -->
                <div class="form-group col-md-3">
                    <label for="name4">Kategori:</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $nomorSurat->kategori_id ? 'selected' : ''); ?>>
                                <?php echo e($item->nama_kategori); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>       
            </div>
            
            <hr>
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Untuk</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><input type="text" name="nama_barang[]" class="form-control" value="<?php echo e($item->nama_barang); ?>" placeholder="Masukkan Nama Barang" /></td>
                        <td><input type="text" name="merk[]" class="form-control" value="<?php echo e($item->merk ?? ''); ?>" placeholder="Masukkan Merk"  /></td>
                        <td><input type="text" name="satuan[]" class="form-control" value="<?php echo e($item->satuan); ?>" placeholder="Masukkan Satuan"  /></td>
                        <td><input type="number" name="stok[]" class="form-control" value="<?php echo e($item->stok); ?>" placeholder="Masukkan Jumlah Stok" min="0" /></td>
                        <td><input type="number" name="jumlah[]" class="form-control" value="<?php echo e($item->jumlah); ?>" placeholder="Masukkan Jumlah" min="0"/></td>
                        <td><input type="text" name="untuk[]" class="form-control" value="<?php echo e($item->untuk); ?>" placeholder="Masukkan Untuk" /></td>
                        <td><input type="text" name="keterangan[]" class="form-control" value="<?php echo e($item->keterangan ?? '-'); ?>" placeholder="Masukkan Keterangan"/></td>                    
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3"> <i class="fa fa-save"></i> Simpan Perubahan</button>
            <a href="<?php echo e(route('daftar-permintaan.index')); ?>" class="btn btn-danger mt-3"> <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/daftar-permintaan/edit.blade.php ENDPATH**/ ?>