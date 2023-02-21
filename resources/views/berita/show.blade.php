@extends('layout.main')
@section('container')

<div class="row">
  <div class="card mb-3">
  <img src="../../image/pc.jpg" width="100%" height="400px" class="card-img-top">
  <div class="card-body text-center ">
    <h5 class="card-title">{{ $berita -> title }}</h5>
    <article>{{ $berita -> body }}</article>
    <a href="/berita" class="btn btn-primary">Back</a>
  </div>
</div>
</div>


@endsection