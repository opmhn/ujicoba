@extends('layouts.home')
@section('content')
 
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		</div>
	</div>
</div>
<form method="post">
	@csrf
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">KARYAWAN</div>
						<a href="{{ route('karyawan.create') }}"class="btn btn-sm btn-primary ml-auto">TAMBAH</a>
						
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
                            <th scope="col">NAMA </th>
							<th scope="col">LEVEL </th>
							<th scope="col">PASSWORD </th>
							<th scope="col">PROFIL</th>
                            <th scope="col">AKSI</th>
                        </thead>
                        <tbody>
                            @forelse ($User  as $i => $row) 
                            <tr>
                                <td>{{ ($i+1) }}</td>
                                <td>{{ $row->name }}</td>
								<td>
                                    @if ($row->level =='1')
                                       ADMIN
                                    @else
                                       USER 
                                    @endif
                                </td>
								<td>{{ $row->password }}</td>
								<td>
								<img src="{{ asset('uploads/'.$row->profil) }}" alt="" width="50">
								</td>

                                <td>
									<form action="{{ route('karyawan.destroy',$row->id) }}" method="post" class="d-inline">
										@csrf
										@method('delete')
										<button class="btn btn-danger btn-sm">
											<i class="fa fa-times"> HAPUS</i>
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
</form>
@endsection