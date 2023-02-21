@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Berita</h1>
        
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session('success') }}
</div>
@endif
<table class="table table-bordered my-4">

<a href="/beritadashboard/create" class="btn btn-primary">Tambah Data Berita</a>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>File Upload</th>
        <th>Kategori</th>
        <th>Body</th>
        <th>Aksi</th>
    </tr>
    @foreach ($beritas as $berita)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $berita->title}}</td>
        <td>{{ $berita->file_upload}}</td>
        <td>{{ $berita->kategori->nama}}</td> 
        <td>{{ $berita->body}}</td>
        <td>
            <a href="/beritadashboard/{{ $berita->id}}/edit" class="btn btn-warning">EDIT</a>
            <form action="/beritadashboard/{{ $berita->id}}" method="post" class="d-inline">
            @method('DELETE')
            @csrf
                
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ini?')">DELETE</button>
                
            </form>
            
        </td>
    </tr>
    @endforeach
    </table>
{{ $beritas->links('pagination::bootstrap-5') }}

@endsection