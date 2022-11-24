<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Status Data
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('status/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Tambah Status
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
					<th>Nama Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				if ($status) :
					foreach ($status as $st) :
				?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $st['status']; ?></td>
							<td>
								<a href="<?= base_url('status/edit/') . $st['id_status'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
								<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('status/delete/') . $st['id_status'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="3" class="text-center">
							Data Status Kosong
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
