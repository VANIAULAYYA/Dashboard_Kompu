<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Aduan</h3>
    </div>
    <div class="card-body">
        <table id="aduanTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pengadu</th>
                    <th>Isi Aduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($aduan as $a): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d/m/Y', strtotime($a->tanggal)) ?></td>
                    <td><?= $a->nama_pengadu ?></td>
                    <td><?= substr($a->isi_aduan, 0, 50) ?>...</td>
                    <td>
                        <?php if($a->status == 'proses'): ?>
                            <span class="badge badge-warning">Proses</span>
                        <?php else: ?>
                            <span class="badge badge-success">Selesai</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
