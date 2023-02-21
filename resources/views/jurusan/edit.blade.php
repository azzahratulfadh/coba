@extends('layout.main')

@section('container')
<div class="row">
	<div class="col-lg-6">
		<form action="/jurusan/{{$jurusans->id}}" method="post">
			@method('PUT')
			@csrf
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control @error('nama') isInvalid @enderror" name="nama" isInvalid id="nama" value="{{old('nama', $jurusans->nama)}}">

				@error('nama')
				<div class="invalid-feedback">
					{{$message}}
				</div>
				@enderror
			</div>
			
			<div class="mb-3">
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection