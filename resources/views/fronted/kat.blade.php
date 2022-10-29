@extends('fronted.layouts.frontend')

@section('content')

<div class="row">

 
   @forelse($artikel as $row)
    <div class="col-md-4 mt-3">
      <div class="card" >
          <img src="{{ asset('uploads/'.$row->gambar_artikel) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">
            <a href="{{ route('detail',$row->slug) }}" style="text-decoration: none">
               {{ $row->judul }}
              </a>
          </h5>
        </div>
        <div class="card-body">
          <h4>{{ $row->users->name }}</h4>
          <h4>{{ $row->kategoris ->nama_kategori }}</h4>
        </div>
      </div> 
     </div> 
      @empty
           <b><h4>DATA KOSONG</h4></b>
   
      @endforelse 
</div>
@endsection