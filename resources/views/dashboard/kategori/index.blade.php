@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ @session('pesan') }}
	</div>
@endif

	<h1 style="text-align: center;">Data Kategori </h1>
	<table class="table table-bordered">
	<a href="/kategoridashboard/create" class="btn btn-success">Add Data</a>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Action</th>
		</tr>
		@foreach($kategoris as $kategori)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $kategori->nama }}</td>
				<td>
					<a href="/kategoridashboard/{{ $kategori->id }}/edit" class="btn btn-warning">Edit</a>
					<form action="/kategoridashboard/{{ $kategori->id }}" class="d-inline" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger" type="submit" onclick="return confirm('Yakin akan Mendelete Data?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	{{ $kategoris->links('pagination::bootstrap-5') }}
@endsection