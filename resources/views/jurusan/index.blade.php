@extends('layout.main')

@section('container')

@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ @session('pesan') }}
	</div>
@endif

	<h1 style="text-align: center;">Data Jurusan</h1>
	<table class="table table-bordered">
	<a href="/jurusan/create" class="btn btn-success">Add Data</a>
		<tr>
			<th>No</th>
			<th>Jurusan</th>
			<th>Action</th>
		</tr>
		@foreach($jurusans as $jurusan)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $jurusan->nama }}</td>
				<td>
					<a href="/jurusan/{{ $jurusan->id }}/edit" class="btn btn-warning">Edit</a>
					<form action="/jurusan/{{ $jurusan->id }}" class="d-inline" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger" type="submit" onclick="return confirm('Yakin akan Mendelete Data?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	{{ $jurusans->links('pagination::bootstrap-5') }}
@endsection