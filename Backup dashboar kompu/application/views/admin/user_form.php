<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru'; ?></h1>
</div>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?php echo form_open(isset($user) ? site_url('admin/users/edit/' . $user['id']) : site_url('admin/users/add')); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($user) ? set_value('username', $user['username']) : set_value('username'); ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password <?php echo isset($user) ? '<small>(Kosongkan jika tidak ingin mengubah)</small>' : ''; ?></label>
        <input type="password" class="form-control" id="password" name="password" <?php echo isset($user) ? '' : 'required'; ?>>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="admin" <?php echo (isset($user) && $user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="kepala_ppid" <?php echo (isset($user) && $user['role'] == 'kepala_ppid') ? 'selected' : ''; ?>>Kepala PPID</option>
            <option value="staff" <?php echo (isset($user) && $user['role'] == 'staff') ? 'selected' : ''; ?>>Staff</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-secondary">Batal</a>
<?php echo form_close(); ?>