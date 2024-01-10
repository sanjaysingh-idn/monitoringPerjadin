<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link" style="background: white; color: #012970;" href="/dashboard">
				<i class="bi bi-grid" style="color: #012970;"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-heading">Master</li>

		<li class="nav-item">
			<a class="nav-link collapsed active" data-bs-target="#perjadin-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-airplane-fill"></i><span>Perjadin</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="perjadin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="/perjadin/create">
						<i class="bi bi-circle"></i><span>Input Perjadin</span>
					</a>
				</li>
				<li>
					<a href="/perjadin">
						<i class="bi bi-circle"></i><span>Daftar Perjadin</span>
					</a>
				</li>
			</ul>
		</li><!-- End Components Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed active" data-bs-target="#pegawai-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-people"></i><span>Pegawai</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="pegawai-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="/user">
						<i class="bi bi-circle"></i><span>Daftar Pegawai</span>
					</a>
				</li>
				<li>
					<a href="/jabatan">
						<i class="bi bi-circle"></i><span>Jabatan</span>
					</a>
				</li>
				<li>
					<a href="/golongan">
						<i class="bi bi-circle"></i><span>Golongan</span>
					</a>
				</li>
			</ul>
		</li><!-- End Components Nav -->

		<li class="nav-heading">Laporan</li>

		<li class="nav-item">
			<a class="nav-link" style="background: white; color: #012970;" href="/laporanPerjadin">
				<i class="bi bi-files" style="color: #012970;"></i>
				<span>Laporan Perjadin</span>
			</a>
		</li><!-- End Dashboard Nav -->

	</ul>

</aside><!-- End Sidebar-->
