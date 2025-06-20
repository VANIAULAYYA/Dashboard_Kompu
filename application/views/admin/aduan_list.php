<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Aduan Masyarakat</h1>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Aduan</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Penginput</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($aduan)): ?>
                <?php $no = 1; foreach ($aduan as $item): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $item['judul_aduan']; ?></td>
                        <td><?php echo substr($item['deskripsi_aduan'], 0, 100); ?>...</td>
                        <td><?php echo $item['tanggal_aduan']; ?></td>
                        <td><?php echo ucfirst($item['status']); ?></td>
                        <td><?php echo $item['username']; ?></td>
                        <td>
                            <?php if ($this->session->userdata('role') == 'admin'): ?>
                                <a href="<?php echo site_url('admin/aduan/edit/' . $item['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('admin/aduan/delete/' . $item['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            <?php elseif ($this->session->userdata('role') == 'staff' && $item['id_user'] == $this->session->userdata('id_user')): ?>
                                <a href="<?php echo site_url('staff/aduan/edit/' . $item['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('staff/aduan/delete/' . $item['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            <?php else: ?>
                                <span class="badge badge-info">Tidak ada aksi</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada data aduan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>