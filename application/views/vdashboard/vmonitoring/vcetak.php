<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
    <link rel="stylesheet" href="<?php //echo base_url('components/app-assets/css/bootstrap.min.css');?>">
  	<style type="text/css">
  		body, html {
  			width: 720px;
  			margin: auto 45mm 30mm 45mm; }
  		.table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: solid 0px; }
        table {
			font-size: 16px !important;
        	margin-left: 25px; }
		.row {
			margin-right: -14px;
			margin-left: -14px; }
        .text-center {
        	text-align: center; }
        .text-right {
        	text-align: right; }
        .col-xs-1 {
        	float: left;
        	width: 8.33333%; }
        .col-xs-2 {
        	float: left;
        	width: 16.66667%; }
		.col-xs-3 {
			float: left;
			width: 25%; }
		.col-xs-4 {
			float: left;
			width: 33.33333%; }
		.col-xs-5 {
			float: left;
			width: 41.66667%; }
		.col-xs-6 {
			float: left;
			width: 50%; }
		.col-xs-7 {
			float: left;
			width: 58.33333%; }
		.col-xs-8 {
			float: left;
			width: 66.66667%; }
		.col-xs-9 {
			float: left;
			width: 75%; }
		.col-xs-10 {
			float: left;
			width: 83.33333%; }
		.col-xs-11 {
			float: left;
			width: 91.66667%; }
		.col-xs-12 {
			float: left;
			width: 100%; }
		.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
        	border: 0;
        	padding: 0;
        	margin-left: -0.00001; }
		.table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 1rem; }
		.table th,
		.table td {
			padding: 0.75rem;
			vertical-align: middle;
			border-top: 0px solid #eceeef; }
		.table thead th {
			vertical-align: bottom;
			border-bottom: 0px solid #eceeef; }
		.table tbody + tbody {
			border-top: 0px solid #eceeef; }
		.table .table {
			background-color: #F1F1F1; }
  	</style>
</head>
<body style="margin-top: 20px; background: #ffffff !important;">
	<section class="col-xs-12">
		<div class="row">
			<div class="col-xs-6">
				PT. PLN (PERSERO) WILAYAH KAL SEL & TENG<br>
				CABANG <?php echo $out['AP']; ?><br>
				RAYON <?php echo $out['RAYON']; ?>
			</div>
		</div>
			<br>
		<div class="row">
			<div class="col-xs-12 text-center">
				<b>PEMBERITAHUAN PELAKSANAAN <br>PEMUTUSAN SEMENTARA SAMBUNGAN TENAGA LISTRIK<br>
				===========================================</b>
			</div>
		</div>
		<br>
	</section>

	<section class="col-xs-12" style="margin-left: 5px; padding: 0;">
		<div class="row">
			<div class="col-xs-6">
				<table class="table table-borderless">
					<tr>
						<td width="180">Kepada Yth</td>
						<td width="10">:</td>
						<td></td>
					</tr>
					<tr>
						<td>No. Plg</td>
						<td>:</td>
						<td><?php echo $out['IDPEL']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $out['NAMA']; ?></td>
					</tr>
					<tr>
						<td>Tarif / Daya</td>
						<td>:</td>
						<td><?php echo $out['TARIF']; ?> / <?php echo $out['DAYA']; ?></td>
					</tr>
					<tr>
						<td>Mulai Rekening Bulan</td>
						<td>:</td>
						<td><?php echo $awalbln; ?></td>
					</tr>
					<tr>
						<td>Jumlah biaya keterlambatan s.d bulan</td>
						<td>:</td>
						<td><?php echo $akhirbln; ?></td>
					</tr>
					<tr>
						<td colspan="3">Jumlah tunggakan (blm termasuk biaya adms)</td>
					</tr>
				</table>
			</div>
			<div class="col-xs-6">
				<table class="table table-borderless" style="padding-right: 40px;">
					<tr>
						<td width="130">Nomor</td>
						<td width="8">:</td>
						<td class="text-right"><?php echo $nosurat; ?>&nbsp;</td>
					</tr>
					<tr>
						<td width="130">KD. Kedudukan</td>
						<td width="10">:</td>
						<td class="text-right"><?php echo $kedudukan; ?>&nbsp;</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td width="130">Lembar Tagihan</td>
						<td>:</td>
						<td class="text-right"><?php echo $totalLembar; ?>&nbsp;</td>
					</tr>
					<tr>
						<td>Tagihan</td>
						<td>:</td>
						<td class="text-right">Rp. <?php echo number_format($out['RPTAG']); ?>,-</td>
					</tr>
					<tr>
						<td>Denda</td>
						<td>:</td>
						<td class="text-right">Rp. <?php echo number_format($out['RPBK']); ?>,-</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2" class="text-right">==========</td>
					</tr>
					<tr>
						<td>Total Tagihan</td>
						<td>:</td>
						<td class="text-right">Rp. <?php echo number_format($out['RPTAG']+$out['RPBK']); ?>,-</td>
					</tr>
				</table>
			</div>
		</div>
	</section>

	<section class="col-xs-12" style="padding-right: 30px; padding-left: 30px; text-align: justify;">
		<div class="row">
			<p>
				Dengan ini diberitahukan dengan hormat bahwa pada hari ini aliran listrik di rumah/alamat seperti tersebut diatas terpaksa di putus untuk sementara karena rekening listrik belum di lunasi pada waktu yang telah di tetapkan penyambungan kembali akan dilakukan pada setiap hari jam kerja apabila rekening serta biaya keterlambatan di lunasi ditempat penerimaan pembayaran rekening listrik, kantor pos atau bank yang ditunjuk oleh PLN.
			</p>
			<p>
				Apabila dalam jangka waktu 60 hari terhitung sejak di lakukan pemutusan sementara tunggakan belum di lunasi, maka instalasi milik PLN akan dibongkar, dan penyambungan kembali dapat dilaksanakan setelah saudara menyelesaikan Biaya penyambungan yang diperlakukan sebagai sambungan baru serta tetap diwajibkan membayar tagihan rekening yang belum di lunasi beserta dendanya.
			</p>
			<p>
				UNTUK MENGHINDARI RESIKO, MOHON TIDAK TITIP PEMBAYARAN REKENING KEPADA PETUGAS
			</p>
			<p>
				PADA WAKTU MELAKUKAN PEMBAYARAN DIMOHON MENUNJUKAN SURAT PEMBERITAHUAN INI 	KEPADA PETUGAS LOKET PEMBAYARAN
			</p>
		</div>
			<br>
	</section>

	<section class="col-xs-12">
		<div class="row col-xs-6" style=" float: right;">
				<table class="table table-borderless">
					<tr>
						<td class="text-right" colspan="2"><?php echo ucwords(strtolower($out['AP']));?>,</td>
						<td><?php setlocale(LC_ALL, 'IND'); echo strftime("%d %B %Y", strtotime(date('d F Y'))); ?></td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"><?php echo $jabatanpg; ?></td>
					</tr>
					<tr>
						<td colspan="3" height="80"></td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"><?php echo $namapg; ?></td>
					</tr>
				</table>
		</div>
	</section>
</body>
</html>