<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Edit Jurusan Asal Sekolah
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('jurs_asal') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
				<?= form_open('', [], ['id_jurs_asal_sek' => $jurs_asal['id_jurs_asal_sek']]); ?>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="jurs_asal">Nama Jurusan Asal Sekolah</label>
					<div class="col-md-9">
						<input value="<?= set_value('jurs_asal', $jurs_asal['jurs_asal']); ?>" name="jurs_asal" id="jurs_asal" type="text" class="form-control" placeholder="Nama Jurusan Asal...">
						<?= form_error('jurs_asal', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-9 offset-md-3">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
