@extends('layout.main')

@section('container')

@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ @session('pesan') }}
	</div>
@endif

	<h1 style="text-align: center;">Data Mahasiswa</h1>
	<table class="table table-bordered">
	<a href="/mahasiswa/create" class="btn btn-success">Add Data</a>
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Jurusan</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
		@foreach($mahasiswas as $mahasiswa)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $mahasiswa->nim }}</td>
				<td>{{ $mahasiswa->nama }}</td>
				<td>{{ $mahasiswa->jenis_kelamin }}</td>
				<td>{{ $mahasiswa->jurusan->nama }}</td>
				<td>{{ $mahasiswa->alamat }}</td>
				<td>
					<a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning">Edit</a>
					<form action="/mahasiswa/{{ $mahasiswa->id }}" class="d-inline" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger" type="submit" onclick="return confirm('Yakin akan Mendelete Data?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	{{ $mahasiswas->links('pagination::bootstrap-5') }}
@endsection