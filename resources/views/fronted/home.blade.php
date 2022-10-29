@extends('fronted.layouts.frontend')
@section('content')
@include('fronted.includes.slide')
<div class="row">
  
   @forelse ($artikel as $row)
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
          <a href="#" class="card-link">{{ $row->users->name }}</a>
          <a href="#" class="card-link">{{ $row->kategoris ->nama_kategori }}</a>
        </div>
      </div> 
     </div> 
      @empty
           <P> DATA KOSONG</P>
   
      @endforelse
   
</div>
@endsection