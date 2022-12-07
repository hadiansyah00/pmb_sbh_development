<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
	<link rel="icon" type="image/png" href="assets/img/logo_sbh.png" />
	<title><?= $title; ?> | App PMB STIKes Bogor Husada</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Datepicker -->
	<link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- DataTables -->
	<link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

	<style>
		#accordionSidebar,
		.topbar {
			z-index: 1;
		}
	</style>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex text-gardient-warning align-items-center bg-light justify-content-center" href="<?= base_url('dashboard'); ?>">

				<div class="sidebar-brand-icon">

					<i aria-hidden="true"><img src="<?= base_url(); ?>assets/img/logo_sbh.png" width="85"></i>
				</div>
			</a>
			<!-- Nav Item - Dashboard -->
			<li class=" nav-item">
				<a class="nav-link" href="<?= base_url('dashboard'); ?> ">
					<i class="fas fa fa-home"></i>
					<span><b>Dashboard</b></span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<!-- <div class="sidebar-heading">
				Master Data
			</div> -->
			<!-- Nav Biodata Siswa -->

			<li class="nav-item">
				<a class="nav-link pb-0" href="<?= base_url('profile') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>
						<b>Biodata</b>
					</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link pb-2" href="<?= base_url('daftar/add') ?>">
					<i class="fas fa-fw fa-plus-circle"></i>
					<span>
						<b>Form Pendaftaran</b>
					</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link pb-2" href="<?= base_url('status') ?>">
					<i class="fas fa-fw fa-money-check"></i>
					<span>
						<b>Status Pendaftaran</b>
					</span>
				</a>
			</li>
			<hr class="pt-2 sidebar-divider">
			<!-- End Biodata SIswa -->
			<!-- Nav Item - Dashboard -->


			<!-- Nav Item - Pages Collapse Menu -->

			<li class="nav-item">
				<a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
					<i class="fas fa-fw fa-folder"></i>
					<span><b>Master Data</b></span>
				</a>
				<div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-light py-2 collapse-inner rounded">
						<h6 class="collapse-header">Master Data:</h6>
						<a class="collapse-item" href="<?= base_url('tahunakademik'); ?>">Tahun Akademik</a>
						<a class="collapse-item" href="<?= base_url('agama'); ?>">Agama</a>
						<a class="collapse-item" href="<?= base_url('penghasilan'); ?>">Penghasilan</a>
						<a class="collapse-item" href="<?= base_url('prodi'); ?>">Program Study</a>
						<a class="collapse-item" href="<?= base_url('jurs_asal'); ?>">Jurusan Asal</a>
					</div>
				</div>
			</li>

			<div class="sidebar-heading">
				Data PMB
			</div>

			<!-- Nav Item -->
			<li class="nav-item">
				<a class="nav-link pb-0" href="<?= base_url('siswa') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>
						<b>Data PMB</b>
					</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link pb-2" href="<?= base_url('SiswaAprove') ?>">
					<i class="fas fa-fw fa-check-circle"></i>
					<span>
						<b>Siswa Diterima</b>
					</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link pb-2" href="<?= base_url('SiswaReject') ?>">
					<i class="fas fa-fw fa-exclamation-triangle"></i>
					<span>
						<b>Siswa Ditolak</b>
					</span>
				</a>
			</li>
			<!-- Divider -->




			<!-- Nav Item - Dashboard -->


			<!-- Nav Item - Dashboard -->


			<!-- Divider -->

			<?php if (is_admin()) : ?>


				<!-- Heading -->
				<div class="sidebar-heading">
					Pengaturan
				</div>

				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('user'); ?>">
						<i class="fas fa-fw fa-user-plus"></i>
						<span><b>Managemen User</b></span>
					</a>
				</li>
			<?php endif; ?>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-dark bg-gardient-warning topbar mb-4 static-top shadow-sm">

					<div class="sidebar-brand-text mx-2"><strong>PMB ONLINE</strong>

					</div>

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link bg-transparent d-md-none rounded-circle mr-3">
						<i class="fa fa-bars text-white"></i>
					</button>

					<!-- Topbar Navbar -->

					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small text-bg-primary" style="color:#000;">
									<?= userdata('nama'); ?>
								</span>
								<img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>" width="20px">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('profile'); ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="<?= base_url('profile/biodata'); ?>">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Edit Biodata
								</a>
								<a class="dropdown-item" href="<?= base_url('profile/ubahpassword'); ?>">
									<i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
									Change Password
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

					<?= $contents; ?>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-light">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Aplikasi PMB | STIKes Bogor Husada &bull; 2022 &bull; by <?= anchor('#', 'IT-Division'); ?> &bull; <a href="#" class='btn-sm btn-success'>
								<i class='fa fa-phone-alt'></i>
								WA
							</a>
						</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

	<!-- Datepicker -->
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

	<script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>

	<script type="text/javascript">
		$(function() {
			$('.date').datepicker({
				uiLibrary: 'bootstrap4',
				format: 'yyyy-mm-dd'
			});

			var start = moment().subtract(29, 'days');
			var end = moment();

			function cb(start, end) {
				$('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
			}

			$('#tanggal').daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					'Hari ini': [moment(), moment()],
					'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'7 hari terakhir': [moment().subtract(6, 'days'), moment()],
					'30 hari terakhir': [moment().subtract(29, 'days'), moment()],
					'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
					'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
					'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
					'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
				}
			}, cb);

			cb(start, end);
		});

		$(document).ready(function() {
			var table = $('#dataTable').DataTable({
				buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
				dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
					"<'row'<'col-md-12'tr>>" +
					"<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
				lengthMenu: [
					[5, 10, 25, 50, 100, -1],
					[5, 10, 25, 50, 100, "All"]
				],
				columnDefs: [{
					targets: -1,
					orderable: false,
					searchable: false
				}]
			});

			table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
		});
	</script>
	<script type="text/javascript">
		let hal = '<?= $this->uri->segment(1); ?>';

		let satuan = $('#satuan');
		let stok = $('#stok');
		let total = $('#total_stok');
		let jumlah = hal == 'barangmasuk' ? $('#jumlah_masuk') : $('#jumlah_keluar');

		$(document).on('change', '#barang_id', function() {
			let url = '<?= base_url('barang/getstok/'); ?>' + this.value;
			$.getJSON(url, function(data) {
				satuan.html(data.nama_satuan);
				stok.val(data.stok);
				total.val(data.stok);
				jumlah.focus();
			});
		});

		$(document).on('keyup', '#jumlah_masuk', function() {
			let totalStok = parseInt(stok.val()) + parseInt(this.value);
			total.val(Number(totalStok));
		});

		$(document).on('keyup', '#jumlah_keluar', function() {
			let totalStok = parseInt(stok.val()) - parseInt(this.value);
			total.val(Number(totalStok));
		});
	</script>


</body>

</html>
