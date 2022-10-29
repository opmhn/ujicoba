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
						<div class="card-title">ADD ARTIKEL</div>
						<a href="{{ route('artikel.index') }}"class="btn btn-sm btn-primary ml-auto">back</a>

					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('artikel.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="artikel" class="form-label">JUDUL ARTIKEL</label>
                            <input type="text" name="judul" class="form-control text-center" id="text" placeholder="enter judul artikel">
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">BODY ARTIKEL</label>
                            <textarea type="text" name="body" class="form-control " ></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">KATEGORI</label>
                            <select  name="kategori_id" class="form-control text-center" >
                                @foreach ($kategori as $i)
                                 <option value="{{ $i->id }}">{{ $i->nama_kategori }}</option>
                                @endforeach

                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">Wilayah</label>
                            <select  name="wilayah_id" class="form-control text-center" >
                                @foreach ($Wilayah as $i)
                                 <option value="{{ $i->id }}">{{ $i->nama_wilayah }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">GAMBAR</label>
                            <input type="file" name="gambar_artikel" class="form-control " >
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">STATUS</label>
                            <select  name="is_active" class="form-control text-center" >
                                <option value="1">PUBLISH</option>
                                <option value="0">DRAFT</option>
                            </select>
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
