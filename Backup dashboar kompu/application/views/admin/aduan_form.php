<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo isset($aduan) ? 'Edit Aduan' : 'Tambah Aduan Baru'; ?></h1>
</div>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?php echo form_open(isset($aduan) ? site_url('staff/aduan/edit/' . $aduan['id']) : site_url('staff/aduan/add')); ?>
    <div class="form-group">
        <label for="judul_aduan">Judul Aduan</label>
        <input type="text" class="form-control" id="judul_aduan" name="judul_aduan" value="<?php echo isset($aduan) ? set_value('judul_aduan', $aduan['judul_aduan']) : set_value('judul_aduan'); ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi_aduan">Deskripsi Aduan</label>
        <textarea class="form-control" id="deskripsi_aduan" name="deskripsi_aduan" rows="5" required><?php echo isset($aduan) ? set_value('deskripsi_aduan', $aduan['deskripsi_aduan']) : set_value('deskripsi_aduan'); ?></textarea>
    </div>

    <?php if ($this->session->userdata('role') == 'admin' && isset($aduan)): ?>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="pending" <?php echo (isset($aduan) && $aduan['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="proses" <?php echo (isset($aduan) && $aduan['status'] == 'proses') ? 'selected' : ''; ?>>Proses</option>
            <option value="selesai" <?php echo (isset($aduan) && $aduan['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
        </select>
    </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?php echo site_url($this->session->userdata('role') . '/aduan'); ?>" class="btn btn-secondary">Batal</a>
<?php echo form_close(); ?>