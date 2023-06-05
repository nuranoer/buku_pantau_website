<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kop Surat</title>
    <style>
        /* Gaya CSS untuk kop surat */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 200px;
        }
        .company-info {
            text-align: center;
            margin-bottom: 10px;
        }
        .company-name {
            font-weight: bold;
        }
        .company-address {
            font-style: italic;
        }
        .line {
        border-bottom: 1px solid black;
        margin-bottom: 10px;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }
        thead, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
    <img src="<?= base_url('assets/images/logodikdasmen.png') ?>" alt="Logo" class="logo">
    </div>
    <div class="company-info">
        <div class="company-name">TAMAN POSYANDU SENTOSA</div>
        <div class="company-address">Dsn Tawangsari, Gempolan, Kec. Gurah, Kabupaten Kediri, Jawa Timur 64181</div>
        <div class="company-contact">Telp. 021-5725610</div>
    </div>
    <div class="line"></div>
    <table>
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nama Guru</th>
                <th>Hari</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $lap) : ?>
            <tr>
                <td><?= $lap['nama_kegiatan']; ?></td>
                <td><?= $lap['tanggal']; ?></td>
                <td><?= $lap['waktu']; ?></td>
                <td><?= $lap['nama_guru']; ?></td>
                <td><?= $lap['hari']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
