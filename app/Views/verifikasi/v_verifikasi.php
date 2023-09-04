<!DOCTYPE html>
<html>
<head>
	<title>Verifikasi Izin Magang</title>
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
				<H2>PROGRAM STUDI INFORMATIKA</H2>
				<P>Jl. Gunung Pangilun No 37, Padang, Sumatera Barat</P>
			</div>
			<hr style="height: 2px solid black;">
			<center>
				<h3 class="title" style="text-decoration: underline;">Verifikasi Magang</h3>
			</center>
			<div class="content">
				<?php var_dump($magang); ?>
			</div>
		</div>
	<?php endif; ?>
</body>
</html>
