<!DOCTYPE html>
<html>
<head>
    <title>Surat Izin Magang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            line-height: 1px;
        }

        .logo {
            width: 100px;
            height: 100px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        hr {
            border: none;
            height: 2px;
            background-color: #ccc;
            margin: 10px 0;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: none;
        }

        .footer {
            margin-top: 20px;
            position: relative;
            text-align: center;
        }

        .signature-left {
            position: absolute;
            left: 0;
            text-align: left;
        }

        .signature-right {
            position: absolute;
            right: 0;
            text-align: left;
        }

        .qrcode {
            display: inline-block;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php if ($magang): ?>
        <div class="container">
            <div class="header">
                <h1>FAKULTAS SAINS DAN TEKNOLOGI</h1>
                <H2>PROGRAM STUDI PENDIDIKAN INFORMATIKA</H2>
                <P>Jl. Gunung Pangilun No 37, Padang, Sumatera Barat</P>
            </div>
            <hr style="height: 2px solid black;">
            <center>
                <h3 class="title" style="text-decoration: underline;">SURAT IZIN MAGANG</h3>
            </center>
            <div class="content">
                <p>
                    Kepada <br>
                    <strong>Bapak/Ibu Pimpinan <?= $magang['namaindustri']; ?></strong> <br>
                    <?= $magang['alamat']; ?>
                </p>

                <p>
                    Dengan hormat,
                </p>

                <p>
                    Yang bertanda tangan di bawah ini,
                </p>

                <table>
                    <tr>
                        <td width="150">Nama</td>
                        <td>:</td>
                        <td><?= $magang['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $magang['nim']; ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>Pendidikan Informatika</td>
                    </tr>
                </table>

                <p style="text-align: justify;">
                    Dengan ini mengajukan permohonan izin untuk melaksanakan magang di dalam rangka penyelesaian tugas akhir. Magang ini dimulai pada tanggal <?= $magang['tanggalmulai']; ?> hingga <?= $magang['tanggalselesai']; ?>.
                </p>

                <p style="text-align: justify;">
                    Kami berharap mendapatkan izin dari Bapak/Ibu untuk melaksanakan magang di . Segala perhatian dan bantuan yang diberikan kami haturkan terima kasih.
                </p>

                <p>
                    Hormat kami,
                </p>
            </div>

            <div class="footer">
                <div class="signature-left">
                    <h5 style="line-height: 1px;">Ketua Program Studi</h5> 
                    <h5 style="line-height: 1px;">Pendidikan Informatika</h5>
                    <br>
                    <br>
                    <br>
                    <p>(....................................)</p>
                </div>

                <div class="qrcode">
                    <img src="data:image/png;base64, <?php echo $qrcode; ?>" alt="QR Code">
                </div>

                <div class="signature-right">
                    <h5>Mahasiswa</h5>
                    <br><br><br>
                    <p><?= $magang['nama']; ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
