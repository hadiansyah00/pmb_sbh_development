<?php error_reporting(0); ?>
<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Status Pendaftaran Mahasiswa
				</h4>
			</div>
			<!-- <div class="col-auto">
				<a href="<?= base_url('aset/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Tambah Aset
					</span>
				</a> -->
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped w-100 dt-responsive " id="dataTable">
			<thead>
				<tr>
					<th>No. </th>
					<th>Nomor Pendaftaran</th>
					<th>Photo</th>
					<th>Nama </th>
					<th>Asal Sekolah</th>
					<th>Nama Ibu</th>
					<th>Alamat</th>
					<th>Status Registrasi</th>
				</tr>
			</thead>
			
		</table>
	</div>
</div>
