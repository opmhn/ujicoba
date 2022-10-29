@extends('fronted.layouts.frontend')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-lg-8 mt-4"> 
            <div class="div">
                <img src="{{ asset('uploads/'.$artikel->gambar_artikel) }}" class="img-fluid" alt="" srcset="">
            </div>
            <div class="detail-content mt-2 p-4">

                <div class="detail-badge">
                    <a href=""  style="text-decoration: none"> {{ $artikel->kategoris->nama_kategori }}</a>
                    <a href="" style="text-decoration: none"> {{ $artikel->users->name }}</a>
                </div>
            <h3>
                <b>
                    <p>
                        {{ $artikel->judul }}
                    </p>
                </b>
            </h3>
            <div class="body">
                <p>
                    {{ $artikel->body }}
                </p>
            </div>
            </div>
        </div> 
        <div class="col-lg-4"> </div>
    </div>
</div>
@endsection