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
						<div class="card-title">ADD KARYAWAN</div>
						<a href="{{ route('karyawan.index') }}"class="btn btn-sm btn-primary ml-auto">back</a>
						
					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('karyawan.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="karyawan" class="form-label">NAMA</label>  
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="text" placeholder="name">

                          @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="karyawan" class="form-label">EMAIL</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@gmail.com">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                          </div>
                          <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end b-5">PASWORD</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                        </div>
                        <div class="mb-3">
                          <label for="artikel" class="form-label">LEVEL</label>
                          <select  name="level" class="form-control">
                              <option value="1">ADMIN</option>
                              <option value="2">USER</option>
                          </select>
                        </div>
                          <div class="mb-3">
                            <label for="karyawan" class="form-label">GAMBAR</label>
                            <input type="file" name="profil" class="form-control @error('profil') is-invalid @enderror" >
                           
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                            
                          </div>
                         
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection