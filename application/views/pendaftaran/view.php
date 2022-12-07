<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							<?= $siswa['nama']; ?>
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
				<div class="row ">
					<div class="col-md-4 mb-4 mb-md-0">
						<img src="<?= base_url() ?>assets/img/avatar/<?= $siswa['foto']; ?>" alt="" class="img-thumbnail rounded mb-2">
					</div>
					<div class="col-md-8">
						<table class="table table-bordered">
							<tr>
								<th>NIK</th>
								<td><?= $siswa['nik']; ?></td>
							</tr>
							<tr>
								<th>Id Daftar</th>
								<td><?= $siswa['id_daftar']; ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?= $siswa['email']; ?></td>
							</tr>
							<tr>
								<th>Nomor Telepon</th>
								<td><?= $siswa['no_telp']; ?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin </th>
								<td><?= $siswa['jk']; ?></td>
							</tr>
							<tr>
								<th>Tempat Lahir / Tgl Lahir</th>
								<td><?= $siswa['tempat_lahir']; ?>, <?= $siswa['tanggal_lahir']; ?> </td>
							</tr>

						</table>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<table class="table table-bordered">
							<tr>
								<th>Nama Ibu</th>
								<td><?= $siswa['nama_ibu']; ?></td>

							</tr>
							<tr>
								<th>No Telp Ibu</th>
								<td><?= $siswa['no_telp_ibu']; ?></td>
							</tr>
							<tr>
								<th>Tempat Lahir / Tgl Lahir Ibu</th>
								<td><?= $siswa['tempat_lahir_ibu']; ?>, <?= $siswa['tanggal_lahir_ibu']; ?> </td>
							</tr>
							<tr>
								<th>Pendapatan Orang Tua</th>
								<td><?= $siswa['penghasilan']; ?></td>
							</tr>
							<tr>
								<th>Alamat Ibu : </th>
								<td><?= $siswa['alamat_ibu']; ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-bordered">
							<tr>
								<th>Jurusan Asal Sekolah </th>
								<td><?= $siswa['jurs_asal']; ?></td>
							</tr>
							<tr>
								<th>Jenis Asal Sekolah</th>
								<td><?= $siswa['id_daftar']; ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td><?= $siswa['kelas']; ?></td>
							</tr>
							<tr>
								<th>Prog. Studi</th>
								<td><?= $siswa['nama_prodi']; ?></td>
							</tr>
							<tr>
								<th>Status Pendaftaran </th>
								<td><?= $siswa['sts_pendaftaran']; ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col">
					<h4 class="h5 text-center align-middle m-0 font-weight-bold text-primary">
						<hr>
						Alamat Tempat Tinggal

					</h4>
					<br>
					<div class="col md-12">
						<table class="table table-striped-columns">
							<tr>
								<th>Alamat </th>
								<td><?= $siswa['nama_provinsi']; ?>, <?= $siswa['nama_kabupaten']; ?>, <?= $siswa['nama_kecamatan']; ?> <br>
									<?= $siswa['alamat']; ?> </td>
							</tr>

						</table>
					</div>

				</div>

				<hr>

			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>
</div>
</div>
</div>
</div>
