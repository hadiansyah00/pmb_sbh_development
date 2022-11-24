<?php error_reporting(0); ?>
<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Aset
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('aset/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Tambah Aset
					</span>
				</a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped w-100 dt-responsive " id="dataTable">
			<thead>
				<tr>
					<th>No. </th>
					<th>ID Aset</th>
					<th>Gambar</th>
					<th>Nama Aset</th>
					<th>Jenis Aset</th>
					<th>Stok</th>
					<th>Satuan</th>
					<th>Harga Aset(Rp)</th>
					<th>Total Harga Aset(Rp)</th>
					<th>Lokasi</th>
					<th>Status</th>
					<?php if (is_admin()) : ?>
						<th>Aksi</th><?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$tot_bayar = 0;
				if ($aset) :
					foreach ($aset as $a) :
						$total = $a['harga_aset'] * $a['stok'];
				?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $a['id_aset']; ?></td>
							<td><?php if ($a['image'] != null) { ?>
									<?php echo "<img src='assets/upload/$a[image]' width='80px'  />"; ?>
								<?php } ?>
							</td>
							<td><?= $a['nama_aset']; ?></td>
							<td><?= $a['nama_jenis']; ?></td>
							<td><?= $a['stok']; ?></td>
							<td><?= $a['nama_satuan']; ?></td>
							<td><?php echo number_format($a['harga_aset'])  ?></td>
							<td><?php echo number_format($total)  ?></td>
							<td><?= $a['nama_gudang']; ?></td>
							<td><?= $a['status']; ?></td>
							<?php if (is_admin()) : ?>
								<td>
									<a href="<?= base_url('aset/edit/') . $a['id_aset'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

									<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('aset/delete/') . $a['id_aset'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a> <?php endif; ?>
								</td>
						</tr>

					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="7" class="text-center">
							Data Aset Kosong
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
