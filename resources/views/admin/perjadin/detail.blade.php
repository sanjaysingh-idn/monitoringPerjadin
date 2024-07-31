@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="mt-3">
									<p><strong>Nama:</strong> {{ $perjadin->user->name }}</p>
									<p><strong>Golongan:</strong> {{ $perjadin->user->golongan }}</p>
									<p><strong>Jabatan:</strong> {{ $perjadin->user->jabatan }}</p>
									<p><strong>Tujuan:</strong> {{ $perjadin->tujuan }}</p>
									<p><strong>Dalam Rangka:</strong> {{ $perjadin->dalam_rangka }}</p>
									<p><strong>Tanggal Berangkat:</strong> {{ date('d F Y', strtotime($perjadin->tgl_berangkat)) }}</p>
									<p><strong>Tanggal Kembali:</strong> {{ date('d F Y', strtotime($perjadin->tgl_kembali)) }}</p>
									<p><strong>Biaya:</strong> Rp. {{ number_format($perjadin->biaya) }}</p>
									<!-- Add more details as needed -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						Upload Dokumen Bukti Perjalanan Dinas
						<br>
						<button class="btn btn-xs btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modalUpload"><i
								class="bx bx-upload me-1"></i> Upload Bukti Perjadin</button>
						<button class="btn btn-xs btn-info my-3" data-bs-toggle="modal" data-bs-target="#modalUangHarian"><i
								class="bx bx-upload me-1"></i> Input Uang Harian</button>
						<button class="btn btn-xs btn-success my-3" data-bs-toggle="modal" data-bs-target="#modalBBM"><i
								class="bx bx-upload me-1"></i> Input BBM</button>
						<button class="btn btn-xs btn-dark my-3" data-bs-toggle="modal" data-bs-target="#modalHotel"><i
								class="bx bx-upload me-1"></i> Input Hotel</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Nama Bukti</th>
										<th>Biaya</th>
										<th>Keterangan</th>
										<th>Upload</th>
										<th>Foto</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($bukti as $item)
										<tr>
											<td>{{ $item->nama_bukti }}</td>
											<td>Rp. {{ number_format($item->nominal) }}</td>
											<td>{{ $item->keterangan }}</td>
											<td>{{ $item->created_at->format('d-m-Y') }}</td>
											<td>
												@if ($item->nama_bukti !== 'Uang Harian')
													<button class="btn btn-primary" data-bs-toggle="modal"
														data-bs-target="#viewImageModal-{{ $item->id }}">
														<i class="bx bx-image me-1"></i> Lihat Bukti
													</button>
												@endif
											</td>
											<td>
												<form action="{{ route('bukti.destroy', $item->id) }}" method="POST"
													onsubmit="return confirm('Apakah anda yakin menghapus bukti ini?');">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-danger">Delete</button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						@php
							$totalBiaya = $bukti->sum('nominal');
						@endphp
						<h4>
							Total Biaya Nota Perjadin : <span class="badge bg-success">
								<strong> Rp. {{ number_format($totalBiaya) }}</strong>
							</span>
						</h4>
					</div>
				</div>

			</div>
	</section>
@endsection

@push('modals')
	<div class="modal fade" id="modalUpload" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalUploadTitle">Upload Bukti Perjalanan Dinas</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('bukti.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="perjadin_id" value="{{ request()->route('id') }}">
								<div class="row mt-3">
									<div class="mb-3 col-md-6">
										<label for="nama_bukti" class="form-label">Nama Bukti</label>
										<input class="form-control @error('nama_bukti') is-invalid @enderror" type="text" id="nama_bukti"
											name="nama_bukti" value="{{ old('nama_bukti') }}" autofocus required />
										@error('nama_bukti')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="mb-3 col-md-6">
										<label for="foto" class="form-label">Foto</label>
										<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto"
											required />
										@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="mb-3 col-md-6">
										<label for="nominal" class="form-label">Nominal</label>
										<input class="form-control @error('nominal') is-invalid @enderror" type="number" id="nominal" name="nominal"
											value="{{ old('nominal') }}" autofocus required />
										@error('nominal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="mb-3 col-md-6">
										<label for="keterangan" class="form-label">Keterangan</label>
										<input class="form-control @error('keterangan') is-invalid @enderror" type="text" id="keterangan"
											name="keterangan" value="{{ old('keterangan') }}" autofocus />
										@error('keterangan')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary"><i class="bx bx-upload me-1"></i> Upload Bukti</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalUangHarian" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalUploadTitle">Input Uang Harian</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('bukti.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="perjadin_id" value="{{ request()->route('id') }}">
								<input type="hidden" id="nama_bukti" name="nama_bukti" value="Uang Harian" />
								<div class="row mt-3">
									<div class="mb-3 col-md-6">
										<label for="nominal" class="form-label">Nominal</label>
										<input class="form-control @error('nominal') is-invalid @enderror" type="number" id="nominal"
											name="nominal" value="{{ old('nominal') }}" autofocus required />
										@error('nominal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary"><i class="bx bx-upload me-1"></i> Upload Bukti</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalBBM" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalUploadTitle">Input BBM</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('bukti.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="perjadin_id" value="{{ request()->route('id') }}">
								<input type="hidden" id="nama_bukti" name="nama_bukti" value="Biaya BBM" />
								<div class="row mt-3">
									<div class="mb-3 col-md-6">
										<label for="nominal" class="form-label">Nominal</label>
										<input class="form-control @error('nominal') is-invalid @enderror" type="number" id="nominal"
											name="nominal" value="{{ old('nominal') }}" autofocus required />
										@error('nominal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="mb-3 col-md-6">
										<label for="foto" class="form-label">Foto</label>
										<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
											name="foto" required />
										@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary"><i class="bx bx-upload me-1"></i> Upload Bukti</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalHotel" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalUploadTitle">Input Hotel</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('bukti.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="perjadin_id" value="{{ request()->route('id') }}">
								<input type="hidden" id="nama_bukti" name="nama_bukti" value="Hotel" />
								<div class="row mt-3">
									<div class="mb-3 col-md-6">
										<label for="nominal" class="form-label">Nominal</label>
										<input class="form-control @error('nominal') is-invalid @enderror" type="number" id="nominal"
											name="nominal" value="{{ old('nominal') }}" autofocus required />
										@error('nominal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="mb-3 col-md-6">
										<label for="foto" class="form-label">Foto</label>
										<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
											name="foto" required />
										@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary"><i class="bx bx-upload me-1"></i> Upload Bukti</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	@foreach ($bukti as $item)
		<div class="modal fade" id="viewImageModal-{{ $item->id }}" tabindex="-1"
			aria-labelledby="viewImageModalLabel-{{ $item->id }}" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="viewImageModalLabel-{{ $item->id }}">{{ $item->nama_bukti }}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" alt="Bukti Perjalanan Dinas">
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endpush
