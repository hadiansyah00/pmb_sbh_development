<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Form Pendaftaran Mahasiswa
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('daftar/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Input Item
					</span>
				</a>
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
					<th>Alamat</th>
					<th>Nama Ibu</th>
					<!-- <th>Alamat Ibu</th> -->
					<th>Jurusan</th>
					<th>Jurusan Asal Sekolah</th>

					<?php if (is_admin()) : ?><th>Hapus</th><?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$total = 0;
				if ($daftar) :
					foreach ($daftar as $bm) :
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
							<td><?= $bm['agama']; ?></td>
							<td><?= $bm['nama_provinsi']; ?>,<?= $bm['nama_kabupaten']; ?>, <?= $bm['nama_kecamatan']; ?>, <?= $bm['alamat']; ?></td>
							<td><?= $bm['nama_prodi']; ?></td>
							<td><?= $bm['jurs_asal']; ?></td>
							<?php if (is_admin()) : ?><td>
									<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('daftar/delete/') . $bm['id_daftar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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
