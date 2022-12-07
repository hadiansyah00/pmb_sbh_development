<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Tahun Akademik
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('tahunakademik/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Add Data
					</span>
				</a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped" id="dataTable">
			<thead>
				<tr>
					<th>No. </th>
					<th>Tahun</th>
					<th>Tahun Akademik</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				if ($ta) :
					foreach ($ta as $t) :
				?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $t['ta']; ?> (<?= $t['periode'] ?>)</td>
							<td>
								<?php if ($t['status_ta'] == 0) {
									echo "<span class='btn btn-danger'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
								} else {
									echo "<span class='btn btn-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif
                                                     </span>";
								} ?>
							</td>
							<td>
								<?php if ($t['status_ta'] == 0) { ?>
									<a href="<?= base_url('tahunakademik/setTa/') . $t['id_ta'] ?>" class="btn btn-success btn btn-sm"><i class="fa fa-check"></i>Aktif</a>
							</td>
							<td><a href="<?= base_url('tahunakademik/edit/') . $t['id_ta'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
								<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('tahunakademik/delete/') . $t['id_ta'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
							</td>
						<?php  } ?>
						</td>


						</tr>
					<?php endforeach; ?>

				<?php else : ?>
					<tr>
						<td colspan="3" class="text-center">
							Data Kosong
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
