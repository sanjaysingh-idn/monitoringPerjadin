@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-header">

					</div>
					<div class="card-body">

						<table id="table" class="table table-hover datatable">
							<caption class="ms-4">

							</caption>
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Golongan</th>
									<th>Jabatan</th>
									<th>Tujuan</th>
									<th>Dalam Rangka</th>
									<th>Tanggal Berangkat</th>
									<th>Tanggal Kembali</th>
									<th>Biaya</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($perjadin as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $item->user->name }}</td>
										<td>{{ $item->user->golongan }}</td>
										<td>{{ $item->user->jabatan }}</td>
										<td>{{ $item->tujuan }}</td>
										<td>{{ $item->dalam_rangka }}</td>
										<td>{{ date('d F Y', strtotime($item->tgl_berangkat)) }}</td>
										<td>{{ date('d F Y', strtotime($item->tgl_kembali)) }}</td>
										<td>Rp. {{ number_format($item->biaya) }}</td>
										<td>
											<a class="btn btn-xs btn-warning" href="{{ route('user.edit', $item->id, '.edit') }}"><i
													class="bx bx-edit-alt me-1"></i> Edit</a>
											<button class="btn btn-xs btn-info" data-bs-toggle="modal"
												data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
											<button class="btn btn-xs btn-danger" data-bs-toggle="modal"
												data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>

			</div>
	</section>
@endsection
@push('modals')
	@foreach ($perjadin as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalDeleteTitle">Delete Pegawai</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('user.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="alert alert-danger" role="alert">
										<h4 class="alert-heading">Apakah anda yakin ingin menghapus data pegawai</h4>
										<p><strong>{{ $item->name }}</strong> ?</p>
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

	@foreach ($perjadin as $item)
		<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalDetailTitle">Detail Perjadin</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<p><strong>Nama:</strong> {{ $item->tujuan }}</p>
								<p><strong>Golongan:</strong> {{ $item->user->golongan }}</p>
								<p><strong>Jabatan:</strong> {{ $item->user->jabatan }}</p>
								<p><strong>Tujuan:</strong> {{ $item->tujuan }}</p>
								<p><strong>Dalam Rangka:</strong> {{ $item->dalam_rangka }}</p>
								<p><strong>Tanggal Berangkat:</strong> {{ date('d F Y', strtotime($item->tgl_berangkat)) }}</p>
								<p><strong>Tanggal Kembali:</strong> {{ date('d F Y', strtotime($item->tgl_kembali)) }}</p>
								<p><strong>Biaya:</strong> Rp. {{ number_format($item->biaya) }}</p>
								<!-- Add more details as needed -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
	@endforeach

@endpush
