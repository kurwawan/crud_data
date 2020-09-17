<!DOCTYPE html>
<html>
<head>
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
		<h3>Daftar Laporan Data</h3>
	</center>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Telp.</th>
				<th>Alamat</th>
			</tr>
		</thead>

		<tbody>
			@php
				$i=1
			@endphp

			@foreach ($resumes as $rsm)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $rsm->name }}</td>
				<td>{{ $rsm->email }}</td>
				<td>{{ $rsm->phone }}</td>
				<td>{{ $rsm->address }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>