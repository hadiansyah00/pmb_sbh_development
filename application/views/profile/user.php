<!-- Card Data Profile -->

<div class="card p-2 shadow-sm border-bottom-warning">
	<div class="card-header bg-white">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-black">
					Data Pribadi
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('profile/biodata') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-edit"></i>
					</span>
					<span class="text">
						Edit
					</span>
				</a>
			</div>
		</div>
	</div>
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
	</div>

</div>


<hr>
<!-- Large modal -->

<div class="card p-2 shadow-sm border-bottom-warning">
	<div class="card-header bg-white">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-black">
					Data Lampiran Berkas
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('profile/addBerkas') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<i class="fa fa-edit"></i>
					</span>Tambah </a>

				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No. </th>
								<th>Jenis</th>
								<th>Keterangan</th>
								<th>File</th>

								<th>Aksi</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$total = 0;
							if ($berkas) :
								foreach ($berkas as $bm) :
							?>
									<tr>
										<td><?= $no++; ?></td>
										<td></td>
										<td><?php if ($bm['file_berkas'] != null) { ?>

											<?php } ?></td>
										<td><?= $bm['keterangan']; ?></td>
										<?php if (is_admin()) : ?><td>
												<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('user/delete/') . $bm['id_daftar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
											</td><?php endif; ?>
									</tr>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="8" class="text-center">
										Data Kosong
									</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>

</div>




<!-- <div class="col-md-2">
	<table class="table">
		<tr>
			<a href="<?= base_url('profile/biodata'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Data Pribadi</a>
		</tr>
		<tr>
			<a href="<?= base_url('profile/biodata'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Data Akademik</a>
		</tr>
		<tr>
			<a href="<?= base_url('profile/ubahpassword'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ganti Password</a>
		</tr>
	</table>
</div> -->
