<div class="container py-1">
	<?= $this->session->flashdata('pesan'); ?>
	<!-- <h5 class="text-black op-6 mt-4 mb-2"> Selamat data di Website PMB STIKes Bogorhusada, <b class="text-info"><?= userdata('nama'); ?></b></h5>
	<br> -->
	<!-- For demo purpose -->
	<div class="row">
		<div class="col-lg-8 p0 mx-auto">
			<!-- Timeline -->
			<?php
			if ($siswa) :
				foreach ($siswa as $s) :

			?>

					<ul class="timeline">
						<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
							<div class="timeline-arrow"></div>
							<h2 class="h5 mb-0 text-primary font-weight-bold">Biodata</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
							<div class="card-body">
								<div class="row">
									<div class="col-md-4 mb-4 mb-md-0">
										<img src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>" alt="" class="img-thumbnail rounded mb-2">
									</div>
									<div class="col-md-8">
										<table class="table">
											<tr>
												<th width="200">Username</th>
												<td><?= userdata('username'); ?></td>
											</tr>
											<tr>
												<th>Email</th>
												<td><?= userdata('email'); ?></td>
											</tr>
											<tr>
												<th>Nomor Telepon</th>
												<td><?= userdata('no_telp'); ?></td>
											</tr>


										</table>

									</div>
								</div>
								<a href="<?= base_url('profile/biodata'); ?>" class="btn btn-sm btn-light">Edit Profile</a>
								<?php
								if ($s['status_siswa'] == 2 or 3) { ?>
									<a href="<?= base_url('daftar/add'); ?>" class="btn btn-sm btn-success disabled">Berhasil Input Form Pendaftaran</a>
									<hr>
									<strong>Catatan</strong> <br>
									Silahkan Edit Apabila Anda Salah Input Form Pendaftaran Pada Status Pembayaran
								<?php } else { ?>
									<a href="<?= base_url('daftar/add'); ?>" class="btn btn-sm btn-light">Form Pendaftaran</a>
						</li>
					<?php }  ?>

					<?php if ($s['status_siswa'] == 2) { ?>

						<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
							<div class="timeline-arrow"></div>
							<h2 class="h5 mb-0 text-primary font-weight-bold">Informasi Akademik</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
							<p class="text-small mt-1 font-weight-bold ">Tanggal Tes Akademik : <?php echo format_indo($s['tgl_tes']); ?> </p>
							<p class="text-small mt-1 font-weight-bold ">Lokasi Tes Akademik : <?php echo $s['tempat_tes']; ?></p>
							<p class="text-small mt-1 font-weight-normal text-danger"> <strong>Syarat dan Ketentuan Mengikuti Tes Akademik</strong></p>
							<hr>
							<p>Dokumen Persyaratan Pendaftaran
								<br>
								1. Membawa Berkas berkas
								<br>
								2. Pakain Hitam Putih
								<br>
								3. Membawa Kartu PMB

							</p>
							<button class="btn btn-sm btn-info"> Cetak Kartu PMB</button>
							<button class="btn btn-sm btn-success">Kontak Kami</button>
							<button class="btn btn-sm btn-success">Cek Status</button>
							<br>
							<!-- <p class="align-middle m-0 text-center text-primary "> <a class="btn btn-sm btn-success" href="<?= base_url('status') ?>"> Klik disini</a> Cek Status Pendaftarn</p> -->
						</li>
					<?php } elseif ($s['status_siswa'] == 3) { ?>
						<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
							<div class="timeline-arrow"></div>
							<h1 class="h5 mb-0 text-primary font-weight-bold">Informasi Akademik</h1><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
							<h4 class="text-small mt-1 font-weight-normal text-success"> <strong>Selamat Anda Lulus Mengikuti Tes Akademik</strong></h4>
							<br>
							<h4>Informasi Perkuliahan</h4>
							<p>Conto h </p>
							<hr>
						</li>
					<?php } ?>
				<?php endforeach ?>
			<?php else : ?>

					</ul>
				<?php endif; ?>
		</div>
	</div>
</div>
<style>
	/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

	/* Timeline holder */
	ul.timeline {
		list-style-type: none;
		position: relative;
		padding-left: 1.5rem;
	}

	/* Timeline vertical line */
	ul.timeline:before {
		content: ' ';
		background: #fff;
		display: inline-block;
		position: absolute;
		left: 16px;
		width: 4px;
		height: 100%;
		z-index: 400;
		border-radius: 1rem;
	}

	li.timeline-item {
		margin: 20px 0;
	}

	/* Timeline item arrow */
	.timeline-arrow {
		border-top: 0.5rem solid transparent;
		border-right: 0.5rem solid #fff;
		border-bottom: 0.5rem solid transparent;
		display: block;
		position: absolute;
		left: 2rem;
	}

	/* Timeline item circle marker */
	li.timeline-item::before {
		content: ' ';
		background: #ddd;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #fff;
		left: 11px;
		width: 14px;
		height: 14px;
		z-index: 400;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
	}


	/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
	body {
		background: #E8CBC0;
		background: -webkit-linear-gradient(to right, #E8CBC0, #636FA4);
		background: linear-gradient(to right, #E8CBC0, #636FA4);
		min-height: 100vh;
	}

	.text-gray {
		color: #999;
	}
</style>
