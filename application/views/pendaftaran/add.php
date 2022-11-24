<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Form Pendaftaran
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('daftar') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
				<?= form_open('', [], ['id_daftar' => $id_daftar, 'user_id' => $this->session->userdata('login_session')['user']]); ?>
				<div class="row form-group">
					<label class="col-md-12 text-md-left" for="id_daftar">No Pendaftaran</label>
					<div class="col-md-12">
						<input value="<?= $id_daftar; ?>" type="text" readonly="readonly" class="form-control">
						<?= form_error('id_daftar', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-12 text-md-left" for="id_daftar">Nama</label>
					<div class="col-md-12">
						<input value="<?= userdata('nama'); ?>" type="text" readonly="readonly" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-12 text-md-left" for="id_daftar">Email</label>
					<div class="col-md-12">
						<input value="<?= userdata('email'); ?>" type="text" readonly="readonly" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nik" class="myform required">NIK<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<input name="nik" id="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan">
							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="nisn" class="myform required">NISN<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Nomor Induk Kependudukan"> -->
							<input name="nisn" id="nisn" type="text" class="form-control" placeholder="Nomor Induk Sekolah Nasional">
							<?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="jk" class="myform required">Jenis Kelamin <strong style="color:#e91212 ;">*</strong></label>
							<select name="jk" class="form-control" id="jk">
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tempat_lahir">Tempat<strong style="color:#e91212 ;">*</strong></label>
								<!-- <input type="text" name="" class="form-control" id="inputCity" placeholder="Tempat lahir"> -->
								<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir">
								<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>

							</div>
							<div class=" form-group col-md-6">
								<label for="tanggal_lahir">Tanggal Lahir<strong style="color:#e91212 ;">*</strong></label>
								<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control">
								<?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class=" form-group">
							<label for="agama_id" class="myform required">Agama <strong style="color:#e91212 ;">*</strong></label>
							<select name="agama_id" id="agama_id" class="custom-select">

								<?php foreach ($agama as $j) : ?>
									<option <?= set_select('agama_id', $j['id_agama']) ?> value="<?= $j['id_agama'] ?>"><?= $j['agama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<?php
						$ta = $this->admin->getAktif()->result();
						foreach ($ta as $t) :
							$a = $t->id_ta; ?>
						<?php endforeach; ?>
						<input name="id_ta" type="hidden" class="form-control" value="<?= $a ?>">


					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama_ibu" class="myform required">Nama Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<input name="nama_ibu" id="nama_ibu" type="text" class="form-control" placeholder="Nama Ibu / Wali">
							<?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="no_telp_ibu" class="myform required">No Telp. Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Nomor Induk Kependudukan"> -->
							<input name="no_telp_ibu" id="no_telp_ibu" type="text" class="form-control" placeholder="Nomor Telp Orang Tua / Wali">
							<?= form_error('no_telp_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="penghasilan_id" class="myform required"> Pendapatan Orang Tua / Wali<strong style="color:#e91212 ;">*</strong></label>
							<select name="penghasilan_id" id="penghasilan_id" class="custom-select">
								<option value="" selected disabled>--Pilih--</option>
								<?php foreach ($penghasilan as $j) : ?>
									<option <?= set_select('penghasilan_id', $j['id_penghasilan']) ?> value="<?= $j['id_penghasilan'] ?>"><?= $j['penghasilan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tempat_lahir_ibu">Tempat Lahir Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
								<!-- <input type="text" name="" class="form-control" id="inputCity" placeholder="Tempat lahir"> -->
								<input name="tempat_lahir_ibu" id="tempat_lahir_ibu" type="text" class="form-control" placeholder="Tempat Lahir Orang Tua / Wali">
								<?= form_error('tempat_lahir_ibu', '<small class="text-danger">', '</small>'); ?>

							</div>
							<div class=" form-group col-md-6">
								<label for="tanggal_lahir_ibu">Tanggal Lahir Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
								<input name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" type="date" class="form-control">
								<?= form_error('tanggal_lahir_ibu', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class=" form-group">
							<label for="alamat_ibu" class="myform required">Alamat Orang Tua / Wali <strong style="color:#e91212 ;">*</strong></label>
							<textarea name="alamat_ibu" id="alamat_ibu" type="text" class="form-control"></textarea>
							<?= form_error('alamat_ibu', '<small class="text-danger">', '</small>'); ?>
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
							<label for="id_provinsi" class="myform required"> Provinsi<strong style="color:#e91212 ;">*</strong></label>
							<select class="js-example-prov text-muted form-control" id="id_provinsi">
								<option value="" selected disabled></option>
								<?php foreach ($provinsi as $key => $value) { ?>
									<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="id_kabupaten" class="myform required"> Kabupaten <strong style="color:#e91212 ;">*</strong></label>
							<select class="js-example-kab element form-control embed-responsive" name="id_kabupaten">
								<option value="" selected disabled></option>
								<?php foreach ($kabupaten as $key => $value) { ?>
									<option value="<?= $value['id_kabupaten'] ?>"><?= $value['nama_kabupaten'] ?></option>
								<?php } ?></option>
							</select>
						</div>
						<div class=" form-group">
							<label for="id_provinsi" class="myform required"> Kecamatan <strong style="color:#e91212 ;">*</strong></label>
							<select class="form-control js-example-kec" name="id_kecamatan">
								<option value="" selected disabled></option>
								<?php foreach ($kecamatan as $key => $value) { ?>
									<option value="<?= $value['id_kecamatan'] ?>"><?= $value['nama_kecamatan'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class=" form-group">
							<label for="alamat" class="myform required">Alamat Lengkap <strong style="color:#e91212 ;">*</strong></label>
							<textarea name="alamat" id="alamat" type="text" class="form-control" placeholder="Jln Raya / Gang ...."></textarea>
							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

				</div>
				<hr>
				<div class="col">
					<h4 class="h5 align-middle text-center m-4 font-weight-bold text-primary">
						<div class="col">
							<h4 class="h5 align-middle m-4 font-weight-bold text-primary">
								Informasi Asal Sekolah
							</h4>
						</div>
					</h4>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama_ibu" class="myform required">Nama Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<input name="nama_ibu" id="nama_ibu" type="text" class="form-control" placeholder="Nama Ibu / Wali">
							<?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="no_telp_ibu" class="myform required">No Telp. Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Nomor Induk Kependudukan"> -->
							<input name="no_telp_ibu" id="no_telp_ibu" type="text" class="form-control" placeholder="Nomor Telp Orang Tua / Wali">
							<?= form_error('no_telp_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="penghasilan_id" class="myform required"> Pendapatan Orang Tua / Wali<strong style="color:#e91212 ;">*</strong></label>
							<select name="penghasilan_id" id="penghasilan_id" class="custom-select">
								<option value="" selected disabled>--Pilih--</option>
								<?php foreach ($penghasilan as $j) : ?>
									<option <?= set_select('penghasilan_id', $j['id_penghasilan']) ?> value="<?= $j['id_penghasilan'] ?>"><?= $j['penghasilan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama_ibu" class="myform required">Nama Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan"> -->
							<input name="nama_ibu" id="nama_ibu" type="text" class="form-control" placeholder="Nama Ibu / Wali">
							<?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="no_telp_ibu" class="myform required">No Telp. Ibu / Wali<strong style="color:#e91212 ;">*</strong></label>
							<!-- <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Nomor Induk Kependudukan"> -->
							<input name="no_telp_ibu" id="no_telp_ibu" type="text" class="form-control" placeholder="Nomor Telp Orang Tua / Wali">
							<?= form_error('no_telp_ibu', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class=" form-group">
							<label for="penghasilan_id" class="myform required"> Pendapatan Orang Tua / Wali<strong style="color:#e91212 ;">*</strong></label>
							<select name="penghasilan_id" id="penghasilan_id" class="custom-select">
								<option value="" selected disabled>--Pilih--</option>
								<?php foreach ($penghasilan as $j) : ?>
									<option <?= set_select('penghasilan_id', $j['id_penghasilan']) ?> value="<?= $j['id_penghasilan'] ?>"><?= $j['penghasilan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#provinsi").change(function() {
			var id_provinsi = $("#provinsi").val();
			$.ajax({
				type: 'GET',
				url: '<?= site_url('daftar/dataKabupaten') ?>/' + id_provinsi,
				success: function(html) {
					$("#kabupaten").html(html);
				}
			});
		});
	});

	$(document).ready(function() {
		$("#kabupaten").change(function() {
			var id_kabupaten = $("#kabupaten").val();
			$.ajax({
				type: 'GET',
				url: '<?= site_url('daftar/dataKecamatan') ?>/' + id_kabupaten,
				success: function(html) {
					$("#kecamatan").html(html);
				}
			});
		});
	});
</script>

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
