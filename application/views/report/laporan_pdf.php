<!DOCTYPE html>
<html><head>
    <title>Cetak Laporan achievement</title>
    <style>
        body {
            font-family: arial, sans-serif;
            margin: 1cm 1cm 1cm 1cm;
        }

        h2 {
            margin-top: auto;
            text-align: center;
            position: fixed;
            left: 0px;
            right: 0px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            padding: 4px;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
        }

    </style>
</head><body>
    
    <h2>Daftar Laporan Achievement</h2>
    
    <div class="cetak">
        Tanggal di cetak: <?= date('d/m/Y'); ?>
    </div>

    <table>
        <tr>
            <th style="width: 6%">No.</th>
            <th style="width: 20%">Tanggal</th>
            <th style="width: 40%">Nama</th>
            <th style="width: 14%">Keterangan</th>
        </tr>

        <?php if (!empty($data)) : ?>
        <?php foreach($data as $num => $row) : ?>
        <tr>
            <td style="width: 6%"><?= $num+1 ?></td>
            <td style="width: 40%"><?= $row['tanggal']; ?></td>
            <td style="width: 14%"><?= $row['nama']; ?></td>
            <td style="width: 20%"><?= $row['keterangan']; ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>Tidak ada data!</h3>
    <?php endif; ?>
    </table>

</body></html>
