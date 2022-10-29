@extends('layouts.home')
@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">UPDATE ARTIKEL <i>{{ $artikel->judul }}</i></div>
						<a href="{{ route('artikel.index') }}"class="btn btn-sm btn-primary ml-auto">back</a>

					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('artikel.update',$artikel->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                            @method('PUT')
                        <div class="mb-3">
                            <label for="artikel" class="form-label">JUDUL ARTIKEL</label>
                            <input type="text" name="judul" class="form-control text-center" id="text" value="{{ $artikel->judul }}">
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">BODY ARTIKEL</label>
                            <textarea type="text" name="body"  class="form-control text-center" >{{ $artikel->body }}</textarea>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">KATEGORI</label>
                            <select  name="kategori_id" class="form-control text-center" >
                                @foreach ($kategori as $i)
                                @if ($i->id == $artikel->kategori_id)
                                <option value="{{ $i->id }}" selected='selected'>{{ $i->nama_kategori }}</option>
                                @else
                                <option value="{{ $i->id }}">{{ $i->nama_kategori }}</option>
                                @endif

                                @endforeach

                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">WILAYAH</label>
                            <select  name="wilayah_id" class="form-control text-center" >
                                @foreach ($Wilayah as $i)
                                @if ($i->id == $artikel->wilayah_id)
                                <option value="{{ $i->id }}" selected='selected'>{{ $i->nama_wilayah }}</option>
                                @else
                                <option value="{{ $i->id }}">{{ $i->nama_wilayah }}</option>
                                @endif

                                @endforeach

                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">STATUS</label>
                            <select  name="is_active" class="form-control text-center" >
                                <option value="1"{{ $artikel->is_active =='1' ?'selected' :'' }}>PUBLISH</option>
                                <option value="0"{{ $artikel->is_active =='0' ?'selected' :'' }}>DRAFT</option>
                            </select>
                          </div>
                           <div class="mb-3">
                            <label for="artikel" class="form-label">GAMBAR</label>
                            <input type="file" name="gambar_artikel" class="form-control text-center" >
                            <br>
                            <label for="artikel" class="form-label">GAMBAR SAAT INI</label> <br>
                            <img src=" {{ asset('uploads/'.$artikel->gambar_artikel) }}" alt="???" width="150">
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                            <button class="btn btn-danger btn-sm" type="reset">REFRES</button>
                          </div>

                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
