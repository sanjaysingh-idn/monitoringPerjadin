@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i
								class="bx bx-plus-circle"></i> Tambah Jabatan</button>
					</div>
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama Jabatan</th>
									<th scope="col">Keterangan</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($jabatan as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $item->nama_jabatan }}</td>
										<td>{{ $item->keterangan }}</td>
										<td>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal"
												data-bs-target="#modalDelete{{ $item->id }}">
												Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<!-- End Table with hoverable rows -->

					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('modals')
	{{-- Modal Tambah --}}
	<div class="modal fade" id="modalAdd" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddTitle">Tambah jabatan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{ route('jabatan.store') }}" method="POST">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<label for="nama_jabatan" class="form-label">Nama jabatan</label>
								<input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" required>
							</div>
							<div class="col-12">
								<label for="keterangan" class="form-label">Keterangan</label>
								<input type="text" id="keterangan" name="keterangan" class="form-control">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Tambah Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Modal Delete --}}
	@foreach ($jabatan as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalDeleteTitle">Delete Jabatan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('jabatan.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="alert alert-danger" role="alert">
										<h4 class="alert-heading">Apakah anda yakin ingin menghapus data jabatan</h4>
										<p><strong>{{ $item->nama_jabatan }}</strong> ?</p>
										<hr>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach
@endpush
