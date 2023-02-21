@extends('layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data Berita</h1>

</div>
<div class="row">
  <div class="col col-lg-6">

    <form action="/berita" method="post" enctype="multipart/form-data">
      @csrf

      <div class="mb-2">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
        id="title" value="{{ old('title')}}" >
        @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror   
      </div>

      <div class="mb-2">
        <label for="file_upload" class="form-label">File Upload</label>
        <input type="file" class="form-control @error('file_upload') is-invalid @enderror" name="file_upload"
        id="title" value="{{ old('file_upload')}}" >
        @error('file_upload')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror   
      </div>

      <div class="mb-2">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" name="kategori_id">
          @foreach ($kategoris as $kategori)) 
          @if (old('kategori_id')== $kategori->id)')
          <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>)
          @else
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>)
          @endif
          @endforeach
        </select>
      </div>

      <div class="mb-2">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6">
        {{ old ('body')}}</textarea>
        @error('body')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror   
      </div>


      <div class="mb-2">
        <button type="submit" name="submit" class="btn btn-primary">Create</textarea>
        </div>

        <div class="mb-2">
          <a href="/beritadashboard" name="back" class="btn btn-warning">Back</a>
        </div>

      </form>
    </div>
  </div>

@endsection