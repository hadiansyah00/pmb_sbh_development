<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Form Pendaftaran Mahasiswa
				</h4>
			</div>

		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped dt-responsive nowrap" id="dataTable">
			<thead>
				<tr>
					<th>No. </th>
					<th>No Pendaftaran</th>
					<th>Tgl daftar</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Status</th>
					<th>Aksi</th>
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
							<td><?= format_indo($bm['tgl_insert']); ?></td>
							<td><?php if ($bm['foto'] != null) { ?>
									<?php echo "<img src='assets/img/avatar/$bm[foto]' width='70px' style='border-radius: 5px;' />"; ?>
								<?php } ?></td>
							<td><?= $bm['nama']; ?></td>

							<td><?= $bm['nama_prodi']; ?></td>

							<td>
								<?php if ($bm['status_siswa'] == 0) {
									echo "<span class='btn btn-danger'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tes Akademik
                                                     </span>";
								} elseif ($bm['status_siswa'] == 3) {
									echo "<span class='btn btn-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Diterima
                                                     </span>";
								} ?>
							</td>
							<td>
								<a href="<?= base_url('daftar/edit/') . $bm['id_daftar'] ?>" class="btn btn-info btn-circle btn-sm"><i class="fa fa-edit"></i></a>
								<a href="<?= base_url('siswa/views/') . $bm['id_daftar'] ?>" class="btn btn-primary btn-circle btn-sm" title="View Data"><i class="fa fa-chevron-circle-right"></i></a>
								<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('daftar/delete/') . $bm['id_daftar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php ?>
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
