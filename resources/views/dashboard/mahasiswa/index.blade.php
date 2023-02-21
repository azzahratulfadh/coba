@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 style="text-align: center;">Data Mahasiswa</h1>
</div>

@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ @session('pesan') }}
	</div>
@endif

	<table class="table table-bordered">
	<a href="/mahasiswadashboard/create" class="btn btn-success">Add Data</a>
	<a href="{{route('cetakmahasiswa')}}" target="_blank" class="btn btn-primary"> Cetak PDF</a>
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
					<a href="/mahasiswadashboard/{{ $mahasiswa->id }}/edit" class="btn btn-warning">Edit</a>
					<form action="/mahasiswadashboard/{{ $mahasiswa->id }}" class="d-inline" method="post">
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