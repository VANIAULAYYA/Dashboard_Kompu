<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Pengguna</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo site_url('admin/users/add'); ?>" class="btn btn-sm btn-primary">Tambah Pengguna Baru</a>
    </div>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php $no = 1; foreach ($users as $item): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $item['username']; ?></td>
                        <td><?php echo ucfirst($item['role']); ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/users/edit/' . $item['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?php echo site_url('admin/users/delete/' . $item['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengguna.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>