@extends('dashboard.layouts.main')
@section('container')

<div class="row">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Berita</h1>
</div>
  <div class="col col-lg-6">
    <form action="/beritadashboard/{{$beritas->id}}" method="post" >
      @method('put')
      @csrf
     <div class="card-body">
      <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title" value="{{old('title',$beritas->title)}}">
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>
      <div class="mb-3">
          <label class="form-label">Kategori</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategoris as $kategori)
              @if (old('kategori_id',$beritas->kategori_id)==$kategori->id)
                <option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
              @else
                <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
              @endif
            @endforeach
        </select>
      </div>
      <div class="mb-3">
          <label for="file_upload" class="form-label">File Upload</label>
          <input type="file" name="file_upload" value="{{old('file_upload',$beritas->file_upload)}}" class="form-control @error('file_upload')
          is-invalid @enderror">
          @error('file_upload')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="3">{{old('body',$beritas->body)}}</textarea>
            @error('body')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
      </div class="">
          <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa fa-save"></i>  Update</button>
          <a href="/beritadashboard" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i>  Kembali</a>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection