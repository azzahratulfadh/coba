@extends('dashboard.layouts.main')
@section('container')

<div class="row">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Berita</h1>
  </div>
  <div class="col col-lg-6">
    <form action="/beritadashboard" method="post" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
      </div>
      @error('title')
      {{ $message }}
      @enderror

      <div class="mb-2">
        <label for="file_upload" class="form-label">File Upload</label>
        <input type="file" class="form-control @error('file_upload') is-invalid @enderror" name="file_upload">

        @error('file_upload')
        <div class="invalid-feedback">
          {{ $message }}
        </div> 
        @enderror
        
      </div>

      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-select" id="kategori_id" name="kategori_id">
          @foreach ($kategoris as $kategori)
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea type="text" class="form-control" id="body" name="body" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label"></label>
        <button type="submit" class="btn btn-primary" >Create</button>
      </div>

    </form>
  </div>
</div>
@endsection