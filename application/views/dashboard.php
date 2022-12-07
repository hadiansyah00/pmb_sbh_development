<div class="container py-1">
	<h5 class="text-black op-7 mb-2"> Hallo, <b class="text-info"><?= userdata('nama'); ?></b></h5>
	<br>
	<!-- For demo purpose -->
	<div class="row">
		<div class="col-lg-6 p0 mx-auto">
			<!-- Timeline -->
			<ul class="timeline">
				<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
					<div class="timeline-arrow"></div>
					<h2 class="h5 mb-0">Biodata</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
					<p class="text-small mt-1 font-weight-light">Lengkapi Foto Profile upload foto pada edit Profile</p><a href="<?= site_url('') ?>" class="btn btn-sm btn-primary"> Selengkapnya..</a>
				</li>
				<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
					<div class="timeline-arrow"></div>
					<h2 class="h5 mb-0">Form Pendaftaran</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
					<p class="text-small mt-1 font-weight-light">Silahkan untuk mengisi form Pendaftaran</p><a href="<?= site_url('') ?>" class="btn btn-sm btn-primary"> Selengkapnya..</a>
				</li>
			</ul><!-- End -->
		</div>
		<div class="col-lg-6 p0 mx-auto">
			<!-- Timeline -->
			<ul class="timeline">
				<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
					<div class="timeline-arrow"></div>
					<h2 class="h5 mb-0">Upload Berkas</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
					<p class="text-small mt-1 font-weight-light">Status pendaftaran setelah mengisi form pendaftaran</p>
					< href="<?= site_url('') ?>" class="btn btn-sm btn-primary"> Selengkapnya..</a>
				</li>
				<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
					<div class="timeline-arrow"></div>
					<h2 class="h5 mb-0"> Status Pendaftaran</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
					<?php

					if ($daftar['sts_pendaftaran'] == 0) { ?>
						<p>Status Pending</p>

					<?php } else { ?>
						<p>Status Diterima</p>
					<?php } ?>
					pendaftaran</p><a href="<?= site_url('') ?>" class="btn btn-sm btn-primary"> Selengkapnya..</a>
				</li>

			</ul><!-- End -->

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
