<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Edit Data <i> <?= $sw['nama']; ?></i>
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('status') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
				<?= form_open('', [], ['id_daftar' => $siswa['id_daftar']]); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nik" class="myform required">NIK<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<input value="<?= $siswa['nik'] ?>" name="nik" id="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan">
							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="nisn" class="myform required ">NISN<strong style="color:#e91212 ;">*</strong>
							</label>
							<input name="nisn" value="<?= $siswa['nisn'] ?>" id="nisn" type="text" class="form-control" placeholder="Nomor Induk Sekolah Nasional">
							<?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="jk" class="myform required">Jenis Kelamin <strong style="color:#e91212 ;">*</strong></label>
							<select name="jk" class="form-control">
								<option <?php echo ($siswa['jk'] == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
								<option <?php echo ($siswa['jk'] == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
							</select>

						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tempat_lahir">Tempat<strong style="color:#e91212 ;">*</strong></label>
								<!-- <input type="text" name="" class="form-control" id="inputCity" placeholder="Tempat lahir"> -->
								<input value="<?= $siswa['tempat_lahir'] ?>" name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir">
								<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>

							</div>
							<div class=" form-group col-md-6">
								<label for="tanggal_lahir">Tanggal Lahir<strong style="color:#e91212 ;">*</strong></label>
								<input value="<?= $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control">
								<?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class=" form-group">
							<label for="agama_id" class="myform required">Agama <strong style="color:#e91212 ;">*</strong></label>
							<select name="agama_id" id="agama_id" class="custom-select">
								<?php foreach ($agama as $j) : ?>
									<option <?= $siswa['agama_id'] == $j['id_agama'] ? 'selected' : ''; ?> <?= set_select('agama_id', $j['id_agama']) ?> value="<?= $j['id_agama'] ?>"><?= $j['agama'] ?></option>
								<?php endforeach; ?>
							</select>
							</select>
						</div>

						<?php
						$ta = $this->admin->getAktif()->result();
						foreach ($ta as $t) :
							$a = $t->id_ta; ?>
						<?php endforeach; ?>
						<input name="id_ta" type="text" class="form-control" value="<?= $a ?>" readonly>


					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama_ibu" class="myform required">Nama Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<input value="<?= $siswa['nama_ibu'] ?>" name="nama_ibu" id="nama_ibu" type="text" class="form-control" placeholder="Nama Ibu / Wali">
							<?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="no_telp_ibu" class="myform required">No Telp. Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<input value="<?= $siswa['no_telp_ibu'] ?>" name="no_telp_ibu" id="no_telp_ibu" type="text" class="form-control" placeholder="Nomor Telp Orang Tua / Wali">
							<?= form_error('no_telp_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="penghasilan_id" class="myform required"> Pendapatan Orang Tua / Wali<strong style="color:#e91212 ;">*</strong></label>
							<select name="penghasilan_id" id="penghasilan_id" class="custom-select">
								<option value="" selected disabled>--Pilih--</option>
								<?php foreach ($penghasilan as $j) : ?>
									<option <?= $siswa['penghasilan_id'] == $j['id_penghasilan'] ? 'selected' : ''; ?> <?= set_select('penghasilan_id', $j['id_penghasilan']) ?> value="<?= $j['id_penghasilan'] ?>"><?= $j['penghasilan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tempat_lahir_ibu">Tempat Lahir Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
								<!-- <input type="text" name="" class="form-control" id="inputCity" placeholder="Tempat lahir"> -->
								<input value="<?= $siswa['tempat_lahir_ibu'] ?>" name="tempat_lahir_ibu" id="tempat_lahir_ibu" type="text" class="form-control" placeholder="Tempat Lahir Orang Tua / Wali">
								<?= form_error('tempat_lahir_ibu', '<small class="text-danger">', '</small>'); ?>

							</div>
							<div class=" form-group col-md-6">
								<label for="tanggal_lahir_ibu">Tanggal Lahir Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
								<input value="<?= $siswa['tanggal_lahir_ibu'] ?>" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" type="date" class="form-control">
								<?= form_error('tanggal_lahir_ibu', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class=" form-group">
							<label for="alamat_ibu" class="myform required">Alamat Ortu <strong style="color:#e91212 ;">*</strong></label>
							<input value="<?= $siswa['alamat_ibu'] ?>" name="alamat_ibu" id="alamat_ibu" type="text" class="form-control"></input>
							<?= form_error('alamat_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="jurs_id_asal" class="myform required">Jurusan Asal Sekolah<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<select name="jurs_id_asal" id="jurs_id_asal" class="custom-select">

								<?php foreach ($jurs_asal as $j) : ?>
									<option <?= $siswa['jurs_id_asal'] == $j['id_jurs_asal_sek'] ? 'selected' : ''; ?> <?= set_select('jurs_id_asal', $j['id_jurs_asal_sek']) ?> value="<?= $j['id_jurs_asal_sek'] ?>"><?= $j['jurs_asal'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="jenis_sekolah" class="myform required"> Jenis Asal Sekolah<strong style="color:#e91212 ;">*</strong></label>
							<select name="jenis_sekolah" id="jenis_sekolah" class="custom-select">
								<option <?php echo ($siswa['jenis_sekolah'] == 'Perguruan Tinggi') ? "selected" : "" ?>>Perguruan Tinggi</option>
								<option <?php echo ($siswa['jenis_sekolah'] == 'Sekolah Menengah') ? "selected" : "" ?>>Sekolah Menengah</option>
							</select>

						</div>
						<div class=" form-group">
							<label for="asal_sekolah" class="myform required">Asal Sekolah<strong style="color:#e91212 ;">*</strong></label>
							<input value="<?= $siswa['asal_sekolah'] ?>" name="asal_sekolah" id="asal_sekolah" type="text" class="form-control" placeholder="Asal Sekolah / Perguruan Tinggi">
							<?= form_error('asal_sekolah', '<small class="text-danger">', '</small>'); ?>
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kelas" class="myform required">Kelas<strong style="color:#e91212 ;">*</strong></label>
							<select name="kelas" id="kelas" class="custom-select">
								<option <?php echo ($siswa['kelas'] == 'reguler') ? "selected" : "" ?>>reguler</option>
								<option <?php echo ($siswa['kelas'] == 'karyawan') ? "selected" : "" ?>>karyawan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="kelas" class="myform required">Program Study / Jurusan<strong style="color:#e91212 ;">*</strong></label>
							<select name="jurusan_id" id="jurusan_id" class="custom-select">
								<?php foreach ($prodi as $j) : ?>
									<option <?= $siswa['jurusan_id'] == $j['id_jurusan'] ? 'selected' : ''; ?> <?= set_select('jurusan_id', $j['id_jurusan']) ?> value="<?= $j['id_jurusan'] ?>"><?= $j['nama_prodi'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="sts_pendaftaran" class="myform required">Status Pendaftaran<strong style="color:#e91212 ;">*</strong></label>
							<select name="sts_pendaftaran" id="sts_pendaftaran" class="custom-select">

								<option <?php echo ($siswa['sts_pendaftaran'] == 'mahasiswa baru') ? "selected" : "" ?>>mahasiswa baru</option>
								<option <?php echo ($siswa['sts_pendaftaran'] == 'mahasiswa pindahan') ? "selected" : "" ?>>mahasiswa pindahan</option>
								<option <?php echo ($siswa['sts_pendaftaran'] == 'mahasiswa lanjutan') ? "selected" : "" ?>>mahasiswa lanjutan</option>

							</select>
						</div>

					</div>
				</div>
				<hr>
				<div class="col">
					<h4 class="h5 align-middle text-center m-0 font-weight-bold text-primary">
						<div class="col">
							<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
								Alamat Tempat Tinggal
							</h4>
						</div>
					</h4>
				</div>
				<div class=""></div>
				<div class="row">
					<div class="col-md-12">
						<div class=" form-group">
							<label for="provinsi_id" class="myform required"> Provinsi<strong style="color:#e91212 ;">*</strong></label>
							<select class="js-example-prov text-muted form-control" name="provinsi_id" id="provinsi_id">
								<option value="" selected disabled></option>
								<?php foreach ($provinsi as $j) : ?>
									<option <?= $siswa['provinsi_id'] == $j['id_provinsi'] ? 'selected' : ''; ?> <?= set_select('provinsi_id', $j['id_provinsi']) ?> value="<?= $j['id_provinsi'] ?>"><?= $j['nama_provinsi'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="kabupaten_id" class="myform required"> Kabupaten <strong style="color:#e91212 ;">*</strong></label>
							<select class="js-example-kab element form-control embed-responsive" id="kabupaten_id" name="kabupaten_id">
								<?php foreach ($kabupaten as $j) : ?>
									<option <?= $siswa['kabupaten_id'] == $j['id_kabupaten'] ? 'selected' : ''; ?> <?= set_select('kabupaten_id', $j['id_kabupaten']) ?> value="<?= $j['id_kabupaten'] ?>"><?= $j['nama_kabupaten'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class=" form-group">
							<label for="kecamatan_id" class="myform required"> Kecamatan <strong style="color:#e91212 ;">*</strong></label>
							<select class="form-control js-example-kec" name="kecamatan_id" id="kecamatan_id">
								<?php foreach ($kecamatan as $j) : ?>
									<option <?= $siswa['kecamatan_id'] == $j['id_kecamatan'] ? 'selected' : ''; ?> <?= set_select('kecamatan_id', $j['id_kecamatan']) ?> value="<?= $j['id_kecamatan'] ?>"><?= $j['nama_kecamatan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="alamat" class="myform required">Alamat Lengkap <strong style="color:#e91212 ;">*</strong></label>
							<input value="<?= $siswa['alamat'] ?>" name="alamat" id="alamat" type="text" class="form-control" placeholder="Jln Raya / Gang ...."></input>
							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
				</div>
				<hr>
				<div class="row form-group">
					<div class="col offset-md-4">
						<button type="submit" class="btn btn-primary">Apply Pendaftaran</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$(".js-example-prov").select2({
		width: 'resolve',

		placeholder: "Masukan Nama Provinsi",
		// allowClear: true,
		tags: true
	});
	$(".js-example-kab").select2({
		width: 'resolve',

		placeholder: "Masukan Nama Kabupaten",
		// allowClear: true,
		tags: true
	});
	$(".js-example-kec").select2({
		width: 'resolve',

		placeholder: "Masukan Nama Kecamatan",
		// allowClear: true,
		tags: true
	});
</script>
