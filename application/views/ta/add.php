<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Add Type Form
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('tahunakademik') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open(''); ?>   
				<!-- <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tahun">Tahun</label>
                    <div class="col-md-9">
					<input value="<?= set_value('tahun'); ?>" name="tahun" id="tahun" type="text" class="form-control" placeholder="Nama Tahun...">
                        <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ta">Tahun Akademik</label>
                    <div class="col-md-9">
                        <input  value="<?= set_value('ta'); ?>"name="ta" id="ta" type="text" class="form-control" placeholder="Tahun Akademik..">
                        <?= form_error('ta', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="periode">Periode Akademik</label>
                    <div class="col-md-9">
                        <input  value="<?= set_value('periode'); ?>"name="periode" id="periode" type="text" class="form-control" placeholder="periode Akademik..">
                        <?= form_error('periode', '<small class="text-danger">', '</small>'); ?>
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
