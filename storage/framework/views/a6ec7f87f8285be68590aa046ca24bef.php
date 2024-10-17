

<?php $__env->startSection('title', 'Permintaan'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary-800">Permintaan</h1>
</div>

<form action="<?php echo e(route('unit-permintaan.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

       

    

    <div class="card mt-2 ">
        <div class="card-body shadow">

            <div class="form-row mb-3">
                <!-- Nomor Surat -->
                <div class="form-group col-md-3">
                    <label for="name1">Nomor Surat :</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control <?php $__errorArgs = ['nomor_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nomor_surat')); ?>"  placeholder="Masukkan Nomor Surat">
                    <?php $__errorArgs = ['nomor_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
        
                <!-- Tanggal -->
                <div class="form-group col-md-3">
                    <label for="name2">Tanggal :</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo e(old('tanggal')); ?>">
                    <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
        
                <!-- Units -->                
                <div class="form-group col-md-3">
                    <label for="name3">Units:</label>
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">Pilih Units</option>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(old('unit_id') == $item->id ? 'selected' : ''); ?>>
                                <?php echo e($item->nama_unit); ?>

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
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo e(old('nama_barang.0')); ?>" /></td>
                        <td><input type="text" name="satuan[]" class="form-control" placeholder="Masukkan Satuan" value="<?php echo e(old('satuan.0')); ?>" /></td>
                        <td><input type="number" name="stok[]" class="form-control" placeholder="Masukkan Jumlah Stok" min="0" value="<?php echo e(old('stok.0')); ?>" /></td>
                        <td><input type="number" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" min="0" value="<?php echo e(old('jumlah.0')); ?>" /></td>
                        <td><input type="text" name="keterangan[]" class="form-control" placeholder="Masukkan Keterangan" value="<?php echo e(old('keterangan.0')); ?>" /></td>
                        <td><button type="button" class="btn btn-success btn-sm mt-2 add-row"><i class="fa fa-plus"></i></button></td>
                    </tr>                    
                </tbody>
            </table>
            <hr>

            <div class="col-md-12 mt-3" >
                <label> Tanda Tangan :</label>
                <br/>
                <div id="sig"></div>
                <br/><br/>
                <button id="clear" class="btn btn-danger btn-sm" >  Clear</button>
                <textarea id="signature" name="tanda_tangan" style="display: none" ></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3"> <i class="fa fa-save"></i> Submit</button>
            <a href="<?php echo e(route('unit-permintaan.index')); ?>" class="btn btn-danger mt-3"> <i class="fa fa-arrow-left"></i> Kembali</a>

        </div>
    </div>


           
    


    
    
</form>

<?php $__env->stopSection(); ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var i = 1;
        $('.add-row').click(function() {
            i++;
            $('#table tbody').append(
                `<tr>
                    <td>${i}</td>
                    <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" /></td>
                    <td><input type="text" name="satuan[]" class="form-control" placeholder="Masukkan Satuan"  /></td>
                    <td><input type="number" name="stok[]" class="form-control" placeholder="Masukkan Jumlah Stok" min="0" /></td>
                    <td><input type="number" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" min="0"/></td>
                    <td><input type="text" name="keterangan[]" class="form-control" placeholder="Masukkan Keterangan"/></td>
                    <td><button type="button" class="btn btn-danger btn-sm mt-2 remove-row"><i class="fa fa-minus"></i></button></td>
                </tr>`
            );
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });
</script>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/unit-permintaan/create.blade.php ENDPATH**/ ?>