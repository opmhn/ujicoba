@extends('layouts.home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
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
						<div class="card-title">ARTIKEL</div>
						<a href="{{ route('artikel.create') }}"class="btn btn-sm btn-primary ml-auto">TAMBAH</a>

					</div>
				</div>
				<div class="card-body">
					@if (Session::has('BERHASIL'))
						<div class="alert alert-primary">
							{{ session('BERHASIL') }}
						</div>
					@endif
					<div class="table-responsive">
					<table class="table table-bordered border-primary">
                        <thead>
                            <th scope="col">NO</th>
                            <th scope="col">JUDUL </th>
							<th scope="col">KATEGORI </th>
                            <th scope="col">WILAYAH</th>
							<th scope="col">AUTHOR</th>
							<th scope="col">GAMBAR</th>
                            <th scope="col">AKSI</th>
                        </thead>
                        <tbody>
                            @forelse ($artikel as $i => $row)
                            <tr>
                                <td>{{ ($i+1) }}</td>
                                <td>{{ $row->judul }}</td>
								<td>{{ $row->kategoris->nama_kategori}}</td>
                                <td>{{ $row->Wilayahs->nama_wilayah}}</td>
								<td>{{ $row->users->name }}</td>
								<td>
									<img src=" {{ asset('uploads/'.$row->gambar_artikel) }}" alt="???" width="150">
								</td>
                                <td>
									<a href="{{ route('artikel.edit',$row->id) }}" class="btn btn-warning btn-sm">
                                            <img src="{{ asset('icon/pen.svg')}}">Edit</img>

                                    </a>
									<form action="{{ route('artikel.destroy',$row->id) }}" method="post" class="d-inline">
									@csrf
									@method('delete')
									<button class="btn btn-danger btn-sm">
										<img src="{{asset('icon/trash-fill.svg')}}">Hapus</img>
									</button>
                                	</form>

								</td>
                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
