<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pengaduan HOAX PDF</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Gambar</th>
                        <th>Lampiran</th>
			</tr>
		</thead>
		<?php $no=1;?>
                    @foreach ($lapor as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->nama }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>{{ $hasil->tanggal }}</td>
                        <td>{{ $hasil->isi }}</td>
                        <td><img src="{{ asset( $hasil->file ) }}" style="width: 100px;"></td>
                        <td><a href="">{{ $hasil->lampiran }}</a></td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
	</table>
 
</body>
</html>