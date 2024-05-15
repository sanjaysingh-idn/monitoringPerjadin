@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="mb-3">
					<a href="/perjadin" class="btn btn-secondary">
						< Kembali</a>
				</div>
				<div class="card">
					<div class="card-header">
						Silahkan masukkan Bukti / Dokumen Perjadin
					</div>
					<div class="card-body">
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
							<div class="mt-2">
								<button type="submit" class="btn btn-primary me-2"><i class="bx bx-send"></i>
									Kirim</button>
								<button type="reset" class="btn btn-outline-secondary">Cancel</button>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						Daftar Bukti Perjalanan Dinas
					</div>
					<div class="card-body">
						<div class="row">
							@foreach ($bukti as $item)
								<div class="col-md-4">
									<div class="card mb-3">
										<div class="card-header">
											<p class="card-text">Nama Bukti : <strong>{{ $item->nama_bukti }}</strong></p>
											<p class="card-text">Keterangan : <strong>{{ $item->keterangan }}</strong></p>
											<small class="card-text">Upload : {{ $item->created_at->format('d-m-Y') }}</small>
										</div>
										<div class="card-body">
											<img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="Bukti Perjalanan Dinas">
										</div>
										<div class="card-footer">
											<form action="{{ route('bukti.destroy', $item->id) }}" method="POST"
												onsubmit="return confirm('Apakah anda yakin menghapus bukti ini?');">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger">Delete</button>
											</form>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
