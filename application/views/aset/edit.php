<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Form Edit Aset
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('aset') ?>" class="btn btn-sm btn-secondary btn-icon-split">
							<span class="icon">
								<i class="fa fa-arrow-left"></i>
							</span>
							<span class="text">
								Back
							</span>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<?= $this->session->flashdata('pesan'); ?>
				<?= form_open_multipart('', [], ['stok' => 0, 'id_aset' => $aset['id_aset']]); ?>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="image">Image:</label>
					<div class="col-md-9">
						<?php
						if ($aset['image'] !== null) { ?>
							<div style="margin-bottom: 10px;">
								<img src="<?= base_url() ?>assets/upload/<?= $aset['image']; ?>" width="100px">
							</div>
						<?php } ?>
						<input name="image" id="image" type="file" class="input-group">
						<small>(Biarkan Kosong Jika Tidak <?= $aset['image'] ? 'Diganti' : 'Ada' ?>)</small>
						<?= form_error('image', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="nama_barang">Nama Aset</label>
					<div class="col-md-9">
						<input value="<?= set_value('nama_aset', $aset['nama_aset']); ?>" name="nama_aset" id="nama_aset" type="text" class="form-control" placeholder="Nama Aset...">
						<?= form_error('nama_aset', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="jenis_id">Jenis Aset</label>
					<div class="col-md-9">
						<div class="input-group">
							<select name="jenis_id" id="jenis_id" class="custom-select">
								<option value="" selected disabled>Pilih Jenis Aset</option>
								<?php foreach ($jenis as $j) : ?>
									<option <?= $aset['jenis_id'] == $j['id_jenis'] ? 'selected' : ''; ?> <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="input-group-append">
								<a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
							</div>
						</div>
						<?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="satuan_id">Satuan Aset</label>
					<div class="col-md-9">
						<div class="input-group">
							<select name="satuan_id" id="satuan_id" class="custom-select">
								<option value="" selected disabled>Pilih Satuan Aset</option>
								<?php foreach ($satuan as $s) : ?>
									<option <?= $aset['satuan_id'] == $s['id_satuan'] ? 'selected' : ''; ?> <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="input-group-append">
								<a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
							</div>
						</div>
						<?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="harga_aset">Harga Aset</label>
					<div class="col-md-9">
						<input value="<?= set_value('harga_aset', $aset['harga_aset']); ?>" name="harga_aset" id="harga_aset" type="text" class="form-control" placeholder="Harga Aset...">

						<?= form_error('harga_aset', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="gudang_id">Lokasi</label>
					<div class="col-md-9">
						<div class="input-group">
							<select name="gudang_id" id="gudang_id" class="custom-select">
								<option value="" selected disabled>Pilih Gudang</option>
								<?php foreach ($gudang as $g) : ?>
									<option <?= $aset['gudang_id'] == $g['id_gudang'] ? 'selected' : ''; ?> <?= set_select('gudang_id', $g['id_gudang']) ?> value="<?= $g['id_gudang'] ?>"><?= $g['nama_gudang'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="input-group-append">
								<a class="btn btn-primary" href="<?= base_url('gudang/add'); ?>"><i class="fa fa-plus"></i></a>
							</div>
						</div>
						<?= form_error('gudang_id', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="status_id">Status Aset</label>
					<div class="col-md-9">
						<div class="input-group">
							<select name="status_id" id="status_id" class="custom-select">
								<option value="" selected disabled>Pilih Status</option>
								<?php foreach ($status as $st) : ?>
									<option <?= $aset['status_id'] == $st['id_status'] ? 'selected' : ''; ?> <?= set_select('status_id', $st['id_status']) ?> value="<?= $st['id_status'] ?>"><?= $st['status'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="input-group-append">
								<a class="btn btn-primary" href="<?= base_url('status/add'); ?>"><i class="fa fa-plus"></i></a>
							</div>
						</div>
						<?= form_error('gudang_id', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-9 offset-md-3">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="reset" class="btn btn-secondary">Reset</bu>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
