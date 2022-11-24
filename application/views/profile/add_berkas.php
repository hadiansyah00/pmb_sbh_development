<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Berkas Form
				</h4>
			</div>
			<div class="card-body">
				<?= form_open_multipart(''); ?>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="foto">File Berkas</label>
					<div class="col-md-9">
						<input name="file_berkas" id="file_berkas" type="file"> <br>
						<small>Wajib di isi</small>
						<?= form_error('file_berkas', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="alamat">Keterangan Berkas</label>
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
							</div>
							<input type="text" name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Keterangan..."><?= set_value('keterangan'); ?></input>
						</div>
						<?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
				</div>
			</div>

			<div class="col-md-9 offset-md-3">
				<button type="submit" class="btn btn-primary">Save</button>
				<button type="reset" class="btn btn-secondary">Reset</button>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
</div>
