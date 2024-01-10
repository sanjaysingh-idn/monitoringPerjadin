@extends('admin.layouts.app')
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">

					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-6">
								<form action="{{ route('generateReport') }}" method="post">
									@csrf
									<div class="col-6">

										<div class="mb-3">
											<label for="bulan" class="form-label">Pilih Bulan</label>
											<input type="month" class="form-control" name="bulan" id="bulan" aria-describedby="" placeholder="" />
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
