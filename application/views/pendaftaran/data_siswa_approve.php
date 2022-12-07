<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Data Siswa PMB
				</h4>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No. </th>
					<th>No Pendaftaran</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Prog. Study</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$total = 0;
				if ($siswa) :
					foreach ($siswa as $bm) :
				?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $bm['id_daftar']; ?></td>
							<td><?php if ($bm['foto'] != null) { ?>
									<?php echo "<img src='assets/img/avatar/$bm[foto]' width='70px' style='border-radius: 5px;' />"; ?>
								<?php } ?></td>
							<td><?= $bm['nama']; ?></td>
							<td><?= $bm['tempat_lahir']; ?></td>
							<td><?= $bm['tanggal_lahir']; ?></td>
							<td><?= $bm['nama_prodi']; ?></td>
							<td>

								<a href="<?= base_url('siswa/views/') . $bm['id_daftar'] ?>" class="btn btn-primary btn-circle btn-sm" title="View Data"><i class="fa fa-chevron-circle-right"></i></a>
							</td>


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
