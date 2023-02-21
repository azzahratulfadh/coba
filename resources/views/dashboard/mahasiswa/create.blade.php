@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <div class="col-lg-6">
    <form action="/mahasiswadashboard" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">NIM</label>
      <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim') }}">

      @error('nim')
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
      <label class="form-label">Jenis Kelamin</label>
      <div class="d-flex">
        <div class="form-check me-3">
          <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" checked="{{ old('jenis_kelamin')=='L' ? 'checked' : '' }}" checked>Laki-Laki
        </div>
        <div class="form-check me-3">
          <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" checked="{{ old('jenis_kelamin')=='P' ? 'checked' : '' }}">Perempuan
        </div>
      </div>
      @error('jenis_kelamin')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
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