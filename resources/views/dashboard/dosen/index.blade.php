@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ @session('pesan') }}
	</div>
@endif

	<h1 style="text-align: center;">Data Dosen</h1>
	<table class="table table-bordered">
	<a href="/dosendashboard/create" class="btn btn-success">Add Data</a>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
		@foreach($dosens as $dosen)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $dosen->nip }}</td>
				<td>{{ $dosen->nama }}</td>
				<td>{{ $dosen->jurusan->nama }}</td>
				<td>{{ $dosen->email }}</td>
				<td>{{ $dosen->telp }}</td>
				<td>{{ $dosen->alamat }}</td>
				<td>
					<a href="/dosendashboard/{{ $dosen->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
					<form action="/dosendashboard/{{ $dosen->id }}" class="d-inline" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan Mendelete Data?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
{{ $dosens->links('pagination::bootstrap-5') }}
@endsection
