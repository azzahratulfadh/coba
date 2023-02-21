@extends('dashboard.layouts.main')

@section('container')
<h1 style="text-align: center;">Tambah Data</h1>
<div class="row">
	<div class="col-lg-6">
		<form action="/dosendashboard" method="post">
		@csrf
		<div class="mb-3">
		  <label class="form-label">NIP</label>
		  <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}">

		  @error('nip')
		  <div class="invalid-feedback">
		  	{{ $message }}
		  </div>
		  @enderror
		</div>

		<div class="mb-3">
		  <label class="form-label">Nama</label>
		  <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
		</div>

		<div class="mb-2">
		<label for="jurusan" class="form-label">Jurusan</label>
		<select class="form-select" name="jurusan_id">
			@foreach($jurusans as $jurusan)
		  		<option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
		  	@endforeach
		</select>
		</div> 

		<div class="mb-3">
		  <label class="form-label">Email</label>
		  <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
		</div>
		
		<div class="mb-3">
		  <label class="form-label">Telepon</label>
		  <input type="text" class="form-control" name="telp" id="telp" value="{{ old('telp') }}">
		</div>

		<div class="mb-3">
		  <label class="form-label">Alamat</label>
		  <textarea class="form-control" name="alamat" id="alamat"></textarea>
		</div>
		<div class="mb-3">
		  <button type="submit" name="submit" class="btn btn-primary">Create</button>
		</div>
	</form>
	</div>
</div>
@endsection