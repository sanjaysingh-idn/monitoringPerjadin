@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<a name="" id="" class="btn btn-primary" href="#" role="button">Cetak PDF</a>

					</div>
					<div class="card-body">
						<div class="row mt-3">

							<div class="col-12">
								<div class="head text-center text-uppercase">
									<h5><strong>Badan perencanaaan pembangunan daerah kabupaten ngawi</strong></h5>
									<h5><strong>Laporan rekap perjalanan dinas luar daerah</strong></h5>
									<h5><strong>bulan : {{ date('F Y', strtotime($getBulan)) }}</strong></h5>
								</div>
								<div class="thetable my-4">
									<style>
										#table th:nth-child(5),
										#table td:nth-child(5) {
											width: 20%;
											/* Adjust the width as needed */
										}

										#table th:nth-child(8),
										#table td:nth-child(8) {
											width: 20%;
											/* Adjust the width as needed */
										}

										.currency-cell {
											text-align: right;
										}

										.currency-label {
											float: left;
										}
									</style>

									<table id="table" class="table table-bordered align-middle">
										<thead>
											<tr>
												<th class="align-middle text-center">No</th>
												<th class="align-middle text-center">Nama</th>
												<th class="align-middle text-center">Golongan</th>
												<th class="align-middle text-center">Tujuan</th>
												<th class="align-middle text-center">Dalam Rangka</th>
												<th class="align-middle text-center">Tanggal Berangkat</th>
												<th class="align-middle text-center">Tanggal Kembali</th>
												<th class="align-middle text-center">Biaya</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
												$totalBiaya = 0;
											@endphp
											@foreach ($data as $item)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $item->user->name }}</td>
													<td>{{ $item->user->golongan }}</td>
													<td>{{ $item->tujuan }}</td>
													<td>{{ $item->dalam_rangka }}</td>
													<td>{{ date('d F Y', strtotime($item->tgl_berangkat)) }}</td>
													<td>{{ date('d F Y', strtotime($item->tgl_kembali)) }}</td>
													<td class="currency-cell">
														<span class="currency-label">Rp.</span> {{ number_format($item->biaya) }}
													</td>
												</tr>
												@php
													$totalBiaya += $item->biaya;
												@endphp
											@endforeach
										</tbody>
									</table>

									<div class="text-end mt-3">
										<strong>Total Biaya:</strong>
										<span>Rp.</span> {{ number_format($totalBiaya) }}
									</div>

								</div>
								<div class="bottom mt-5">
									<div class="row">
										<div class="col-8">

										</div>
										<div class="col-4 text-center">
											<p>Ngawi, {{ now()->format('Y-m-d') }}</p>
											<p class="mt-0">Kasubag Keuangan BAPPEDA Ngawi</p>
											<br>
											<br>
											<br>
											<p>Erna Achirul R, S.Sos</p>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
