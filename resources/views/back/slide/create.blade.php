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
						<div class="card-title">ADD SLIDE</div>
						<a href="{{ route('slide.index') }}"class="btn btn-sm btn-primary ml-auto">back</a>
						
					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('slide.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">JUDUL </label>
                            <input type="text" name="judul_slide" class="form-control " id="text" placeholder="enter judul slide">
                          </div>
                          <div class="mb-3">
                            <label for="link" class="form-label">LINK</label>
                            <input type="text" name="link" class="form-control" placeholder="enter link slide">                 
                        </div>
                          <div class="mb-3">
                            <label for="gambar_slide" class="form-label">GAMBAR  SLIDE</label>
                            <input type="file" name="gambar_slide" class="form-control text-center" >
                          </div>
                          <div class="mb-3">
                            <label for="status" class="form-label">STATUS</label>
                            <select  name="status" class="form-control text-center" >
                                <option value="1">PUBLISH</option>
                                <option value="0">NONPUBLISH</option>
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