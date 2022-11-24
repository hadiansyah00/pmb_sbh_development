<!-- Outer Row -->
<div class="row justify-content-center mt-3">

	<div class="col-xl-6 col-lg-12 col-md-8">

		<div class="card o-hidden border-0 shadow-lg">
			<div class="card-body p-lg-5 p-2">
				<div class="p-4">
				<div class="text-center mb-4">
						<h3 class="h2 text-gray-900">
							<strong>Login</strong>
								</h3>
								<p>Admin PMB
								</p>
								<!-- <span class="text-muted">Silahkan Login </span> -->
							</div>
							<?= $this->session->flashdata('pesan'); ?>
							<?= $this->session->flashdata('message'); ?>
							<?= form_open($action = 'admin', '', ['class' => 'user']); ?>
							<div class="form-group">
								<input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
						
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Masuk Pak
							</button>
						
							<div class="text-right mt-4">
							</div>
							<?= form_close(); ?>
						</div>
			</div>
		</div>

	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
