<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Mohon Untuk di Cek</strong> Data Pribadi Apakah Sudah Benar.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="container text-lg-center">
					<h4 class="h5 align-middle m-0 font-weight-bold text-primary">Data Pribadi</h4>
				</div>
			</div>
			<div class="card-body">
				<?= $this->session->flashdata('pesan'); ?>
				<?= form_open_multipart('', [], ['id_user' => $user['id_user']]); ?>
				<div class="row">
					<div class="col-md-4">
						<div class="row form-group">
							<label class="col-md-4 text-md-left" for="foto">Foto<strong style="color:#e91212 ;">*</strong></label>
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-8">
										<img src="<?= base_url() ?>assets/img/avatar/<?= $user['foto']; ?>" alt="<?= $user['nama']; ?>" class="square-circle shadow-md img-thumbnail">
										<div class="col-md-12">
											<p class="text-center">Size Photo Maksimal 2MB <strong>File berupa png,jpg,jpeg</strong></p>
											<input type="file" name="foto" id="foto">
											<?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row form-group required">
							<label class="col-md-2 text-md-left" for="username">Username<strong style="color:#e91212 ;">*</strong></label>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
									</div>
									<input value="<?= set_value('username', $user['username']); ?>" name="username" id="username" type="text" class="form-control" placeholder="Username...">
									<input value="<?= set_value('no_pendaftaran', $daftar['no_pendaftaran']); ?>" name="no_pendaftaran" id="no_pendaftaran" type="text" class="form-control">

								</div>
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-2 text-md-left" for="nama">Nama Anda<strong style="color:#e91212 ;">*</strong></label>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
									</div>
									<input value="<?= set_value('nama', $user['nama']); ?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda...">
								</div>
								<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 text-md-left" for="email">Email<strong style="color:#e91212 ;">*</strong></label>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
									</div>
									<input value="<?= set_value('email', $user['email']); ?>" name="email" id="email" type="text" class="form-control" placeholder="Email...">
								</div>
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 text-md-left" for="no_telp">Telp. <strong style="color:#e91212 ;">*</strong></label>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
									</div>
									<input value="<?= set_value('no_telp', $user['no_telp']); ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="Nomor Telepon...">
								</div>
								<?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

					</div>
				</div>
				<hr>

				<div class="row form-group">
					<div class="col-md-9 offset-md-5 ">
						<button type="submit" class="btn btn-primary"> Simpan Data </button>
						<!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
