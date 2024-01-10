@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-header">
						Silahkan masukkan data laporan perjadin
					</div>
					<div class="card-body">
						<form action="{{ route('perjadin.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row mt-3">
								<div class="mb-3 col-6">
									<label for="user_id" class="form-label">Pilih Pegawai</label>
									<select id="user_id" class="select2 form-select @error('user_id') is-invalid @enderror" name="user_id"
										required>
										<option value="" class="text-capitalize">--Pilih Pegawai--</option>
										@foreach ($user as $u)
											<option value="{{ $u->id }}" class="text-capitalize">{{ $u->name }}</option>
										@endforeach
									</select>
									@error('user_id')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror

								</div>
								<div class="mb-3 col-md-6">
									<label for="tujuan" class="form-label">Tujuan</label>
									<input class="form-control @error('tujuan') is-invalid @enderror" type="text" id="tujuan" name="tujuan"
										value="{{ old('tujuan') }}" autofocus />
									@error('tujuan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="mb-3 col-md-6">
									<label for="biaya" class="form-label">Biaya</label>
									<input class="form-control @error('biaya') is-invalid @enderror" type="number" id="biaya" name="biaya"
										value="{{ old('biaya') }}" autofocus />
									@error('biaya')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="mb-3 col-md-6">
									<label for="dalam_rangka" class="form-label">Dalam Rangka</label>
									<input class="form-control @error('dalam_rangka') is-invalid @enderror" type="text" id="dalam_rangka"
										name="dalam_rangka" value="{{ old('dalam_rangka') }}" autofocus />
									@error('dalam_rangka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="mb-3 col-12">
									<div class="row">
										<div class="col-6">
											<div class="row">
												<div class="mb-3 col-sm-6">
													<label for="tgl_berangkat" class="form-label">Tanggal Berangkat</label>
													<input class="form-control @error('tgl_berangkat') is-invalid @enderror" type="date" id="tgl_berangkat"
														name="tgl_berangkat" min="{{ date('Y-m-d') }}" value="{{ old('tgl_berangkat') }}" />
													@error('tgl_berangkat')
														<div class="invalid-feedback">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="mb-3 col-sm-6">
													<label for="tgl_kembali" class="form-label">Tanggal Pulang</label>
													<input class="form-control @error('tgl_kembali') is-invalid @enderror" type="date" id="tgl_kembali"
														name="tgl_kembali" min="{{ date('Y-m-d') }}" value="{{ old('tgl_kembali') }}" />
													@error('tgl_kembali')
														<div class="invalid-feedback">
															{{ $message }}
														</div>
													@enderror
												</div>
											</div>
										</div>
									</div>
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

			</div>
	</section>
@endsection
