<!DOCTYPE html>
<html>
<head>
    <title>Surat Permintaan | <?php echo e($nomorSurat->nomor_surat); ?></title>

    <style>
        body {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0 20px;
            font-family: "Times New Roman", Times, serif; /* Menetapkan font Times New Roman */
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
           
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        th {
            text-align: center;
        }

        th:nth-child(1) {
            width: 3%; /* Lebar kolom No */
        }

        th,
        td {
            font-size: 10pt; /* Ukuran font menjadi 12pt */
            font-family: "Times New Roman", Times, serif; /* Menetapkan font Times New Roman */
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="logo-container">
        <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/logo/logo.png')))); ?>" alt="Logo-nusalima" width="130px">
        <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/logo/ihc.png')))); ?>" alt="logo-ihc" style="float: right; margin-left: 10px" width="170px">
    </div>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th colspan="3">PT NUSA LIMA MEDIKA</th>
                <th colspan="2">FORM PERMINTAAN BARANG</th>
                <th style="border: 1px solid black; padding: 5px;">
                    <div style="border-bottom: 1px solid black; padding: 5px; text-align:justify">Nomor: <?php echo e($nomorSurat->nomor_surat); ?></div>
                    <div style="border-bottom: 1px solid black; padding: 5px; text-align:justify">Tanggal: <?php echo e(\Carbon\Carbon::parse($nomorSurat->tanggal)->format('d - m - Y')); ?></div>
                    <div style=" padding: 5px; text-align:justify">Unit: <?php echo e($nomorSurat->unit->nama_unit); ?></div>
                </th>           
            </tr>
            <tr>
                <th style="text-align: center;">No</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: center;"><?php echo e($index + 1); ?></td>
                    <td style="text-align: left"><?php echo e($item->nama_barang); ?></td>
                    <td><?php echo e($item->satuan); ?></td>
                    <td><?php echo e($item->stok); ?></td>
                    <td><?php echo e($item->jumlah); ?></td>
                    <td><?php echo e($item->keterangan); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"> Diketahui Oleh </td>
                <td colspan="3"> Disetujui Oleh </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents($imagePath))); ?>" width="140px">
                    <br>
                    <span> <?php echo e($nomorSurat->user->name); ?> </span>
                    <br>   
                </td>
                <td colspan="3" style="text-align: center " >
                    
                        <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/tanda_tangan/manager_klinik.jpg')))); ?>" alt="Logo-nusalima" width="80px"  >
                        <br>
                       <span>dr. Ahmad Syubki Asy'ari</span>
                </td>
                
            </tr>
            <tr>
                <td colspan="3">
                    <span><?php echo e($nomorSurat->user->jabatan); ?></span>
                </td>
                <td colspan="3">
                    <span>Manager Klinik</span>
                </td>
            </tr>

        </tfoot>        
    </table>

</body>
</html>
<?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/cetak-surat/surat-permintaan-unit/pdf.blade.php ENDPATH**/ ?>