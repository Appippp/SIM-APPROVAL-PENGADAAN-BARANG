<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memo Permintaan | <?php echo e($nomorSurat->nomor_surat); ?></title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif; /* Menetapkan font Times New Roman */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th:first-child, td:first-child {
            width: 10%;
        }

        th:nth-child(2), td:nth-child(2) {
            width: 30%;
        }

        th:nth-child(3), td:nth-child(3) {
            width: 20%;
        }

        th:nth-child(4), td:nth-child(4) {
            width: 15%;
        }

        th:nth-child(5), td:nth-child(5) {
            width: 25%;
        }

        .kepala-bidang, .manager-operational {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .kepala-bidang img, .manager-operational img {
            width: 80px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<table border="1" width="100%">
    <thead>
    <tr>
        <th colspan="2" style="padding:7px; text-align: left;">
            <span style="font-weight: bold;  font-size: 12pt"> PT. NUSA LIMA MEDIKA </span>
            <br>
            <span style="font-weight: bold; font-size: 11pt">Unit : Kantor Pusat</span>
        </th>
        <th style="text-align: center">
            <span style="font-size: 12pt ; font-weight: bold">MEMO PERMINTAAN BARANG</span>
        </th>
        <th style="text-align:left; font-weight: normal;">
            <span style=" font-size: 10pt; ">Nomor</span>
            <br>
            <span style=" font-size: 10pt; ">Tanggal</span>
            <br>
            <span style=" font-size: 10pt; ">Unit</span>
        </th>
        <th style="text-align:left; font-weight: normal">
            <span style="font-size: 10pt">: <?php echo e($nomorSurat->nomor_surat); ?></span>
            <br>
            <span style="font-size: 10pt">: <?php echo e(\Carbon\Carbon::parse($nomorSurat->tanggal)->locale('id')->isoFormat('DD  MMMM  YYYY')); ?></span>
            <br>
            <span style="font-size: 10pt">: <?php echo e($nomorSurat->unit->nama_unit); ?></span>
        </th>
    </tr>
    <tr style="font-weight: bold; font-size: 10pt; text-align: center">
        <th style="text-align: center">No</th>
        <th style="text-align: center">Uraian</th>
        <th style="text-align: center">Untuk</th>
        <th style="text-align: center">Satuan</th>
        <th style="text-align: center">Banyaknya</th>
    </tr>

    <tr>
        <th></th>
        <th style="padding-left: 5px; font-size: 10pt; font-weight: bold; text-align: left" ><?php echo e($nomorSurat->kategori->nama_kategori); ?></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < 6; $i++): ?>
        <?php if(isset($barang[$i])): ?>
            <tr style="font-size: 10pt; color: black">
                <td style="text-align: center"><?php echo e($i+1); ?></td>
                <td style="text-align: left"><?php echo e($barang[$i]->merk); ?></td>
                <td style="text-align: center"><?php echo e($barang[$i]->untuk); ?></td>
                <td style="text-align: center"><?php echo e($barang[$i]->satuan); ?></td>
                <td style="text-align: center"><?php echo e($barang[$i]->jumlah); ?></td>
            </tr>
        <?php else: ?>

        <?php endif; ?>
    <?php endfor; ?>
    </tbody>
    <tfoot>
    
    <tr>
        <th style="text-align: center" colspan="2" style=" font-size: 10pt; color: black">Diminta Oleh, </th>
        <th></th>
        <th style="text-align: center" colspan="2" style=" font-size: 10pt; color: black">Disetujui Oleh, </th>
    </tr>
    <tr>
        <th colspan="5" style=" font-size: 10pt; color: black;" height="150px" >
            <div class="kepala-bidang" style="float: left">
                <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/tanda_tangan/manager_klinik.jpg')))); ?>" alt="Logo-nusalima" width="80px">
                <br>
                <span style="font-size: 10pt">Debie Herani Monica, SE</span>
                <hr>
                <span style="font-size: 10pt; font-weight: normal ">Kabid. Operational & Umum</span>
            </div>

            <div class="manager-operational" style="float: right">
                <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/tanda_tangan/manager_klinik.jpg')))); ?>" alt="Logo-nusalima" width="80px">
                <br>
                <span style="font-size: 10pt">Rini Yulianti, Ssi.Apt</span>
                <hr>
                <span style="font-size: 10pt; font-weight: normal ">Manager Operasional & Umum</span>
            </div>
        </th>
    </tr>
    </tfoot>
</table>

</body>
</html>
<?php /**PATH D:\TUGAS AKHIR\SISTEM\revisi\resources\views/pages/cetak-surat/memo-permintaan/pdf.blade.php ENDPATH**/ ?>