@extends('dashboard.layouts.main')

@section('container')
<h1 style="text-align: center;">Edit Data</h1>
<div class="row">
  <div class="col-lg-6">
    <form action="/mahasiswadashboard/{{$mahasiswas->id}}" method="post">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim') is-invalid @enderror"  name="nim" id="nim" value="{{old('nim', $mahasiswas->nim) }}" readonly>

        @error('nim')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror"  name="nama" id="nama" value="{{old('nama', $mahasiswas->nama) }}">

        @error('nama')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label>
      <div class="form-check me-3">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{ old('jenis_kelamin',$mahasiswas->jenis_kelamin)=='L' ? 'checked' : ''}} checked>Laki-Laki
          </div>
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" @checked (old ('jenis_kelamin',$mahasiswas->jenis_kelamin)=='P')>Perempuan
          </div>
      </div>
      @error('jenis_kelamin')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="jurusan" class="form-label">Jurusan</label>
      <select class="form-select" name="jurusan_id" aria-label="Default select example">
        @foreach($jurusans as $jurusan)
        @if(old('jurusan_id',$mahasiswas->jurusan_id)==$jurusan->id)
        <option value="{{ $jurusan->id }}" selected>{{ $jurusan->nama }}</option>
        @else
        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
        @endif
        @endforeach
      </select>
    </div> 
    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{old('alamat',$mahasiswas->alamat) }}</textarea>

      @error('alamat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror

    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
</div>
@endsection