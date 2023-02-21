@extends('layout.main')

@section('container')

<a href="/berita/create" class="btn btn-primary mb-3 mt-3">Tambah Data</a>
@if($beritas->count()>0)
<div class="card mb-3">
    @if($beritas[0]->file_upload!='')
    <img src="images/{{$beritas[0]->file_upload}}" class="card-img-top" width="800" height="200">
    @else
    <img src="image/pc.jpg" height="400px" width="200%" class="card-img-top">
    @endif
    <div class="card-body text-center">
        <h5 class="card-title">{{ $beritas[0] -> title}}</h5>
        <p class="card-text">{{ $beritas[0]-> excerpt}}</p>
        <p class="card-text"><small class="text-muted">{{$beritas[0]->created_at->diffForHumans()}}</small></p>
        <a class="btn btn-primary" href="/berita/{{$beritas[0]->id}}">Readmore</a>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        @foreach($beritas->skip(1) as $berita)
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                @if($berita->file_upload!='')
                <img src="images/{{$beritas[0]->file_upload}}" class="card-img-top" width="800" height="200">
                @else
                <img src="image/pc.jpg" height="400" width="200%" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$berita->title}}</h5>
                    <p class="card-text">{{$berita->excerpt}}</p>
                    <a class="btn btn-primary" href="/berita/{{$berita->id}}">Readmore</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
{{$beritas->links('pagination::bootstrap-5')}}

@endsection