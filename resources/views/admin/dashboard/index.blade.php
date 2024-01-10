@extends('admin.layouts.app')
@section('content')
	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="col-xxl-4">
						<div class="card info-card sales-card">

							<div class="card-body">
								<h5 class="card-title">Total Perdin</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-airplane"></i>
									</div>
									<div class="ps-3">
										<h6>{{ $countPerjadin }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Sales Card -->

					<!-- Revenue Card -->
					<div class="col-xxl-4">
						<div class="card info-card revenue-card">

							<div class="card-body">
								<h5 class="card-title">Total Biaya Perdin</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-cash"></i>
									</div>
									<div class="ps-3">
										<h6>Rp. {{ number_format($countPerjadinB) }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Revenue Card -->

					<!-- Customers Card -->
					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">

							<div class="card-body">
								<h5 class="card-title">Pegawai</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-people"></i>
									</div>
									<div class="ps-3">
										<h6>{{ $countPegawai }}</h6>
									</div>
								</div>

							</div>
						</div>

					</div><!-- End Customers Card -->

				</div>
			</div><!-- End Left side columns -->
		</div>
	</section>
@endsection
