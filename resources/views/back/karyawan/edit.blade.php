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
						<div class="card-title">UPDATE DATA <i>{{ $User->name }}</i></div>
						<a href="{{ route('karyawan.index') }}"class="btn btn-sm btn-primary ml-auto">back</a>
						
					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('karyawan.update',$User->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                            @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">NAMA</label>
                            <input type="text" name="name" class="form-control text-center" id="text" value="{{ $User->name }}">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="text" name="email" class="form-control text-center" id="text" value="{{ $User->email }}">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">PASSWORD</label>
                            <input type="password" name="password" class="form-control text-center" id="password" value="{{ $User->password }}">
                          </div>
                          <div class="mb-3">
                            <label for="artikel" class="form-label">LEVEL</label>
                            <select  name="level" class="form-control text-center" >
                                <option value="1"{{ $User->level =='1' ?'selected' :'' }}>ADMIN</option>
                                <option value="0"{{ $User->level =='0' ?'selected' :'' }}>USER</option>
                            </select>
                          </div>
                           <div class="mb-3">
                            <label for="artikel" class="form-label">GAMBAR</label>
                            <input type="file" name="profil" class="form-control text-center" >
                            <br>
                            <label for="artikel" class="form-label">GAMBAR SAAT INI</label> <br>
                            <img src=" {{ asset('uploads/'.$User->profil) }}" alt="???" width="150">
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