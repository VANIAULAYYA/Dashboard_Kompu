<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Buku Tamu</h3>
        <div class="card-tools">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahModal">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="tamuTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Tanggal</th>
                    <th>Kepuasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($tamu as $t): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t->nama ?></td>
                    <td><?= $t->instansi ?></td>
                    <td><?= date('d/m/Y', strtotime($t->tanggal)) ?></td>
                    <td>
                        <?php for($i=0; $i<$t->nilai_kepuasan; $i++): ?>
                            <i class="fas fa-star text-warning"></i>
                        <?php endfor; ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
