<h1 class="mt-4">Tentang Buku</h1>
<?php
$id=$_GET['id'];
// Definisikan variabel $data
$query=mysqli_query($koneksi,"SELECT * FROM buku WHERE buku_id='$id'");
$buku=mysqli_fetch_array($query);
$data = [
    'buku' => [
        'judul' => $buku['judul'],
        'penulis' => $buku['penulis'],
        'penerbit' => $buku['penerbit'],
        'tahun_terbit' => $buku['tahun_terbit']
    ],
    'ulasan' => [
        ['Ulasan' => 'Ulasan 1', 'Rating' => 'Rating 1', 'NamaLengkap' => 'Nama Lengkap 1'],
        ['Ulasan' => 'Ulasan 2', 'Rating' => 'Rating 2', 'NamaLengkap' => 'Nama Lengkap 2'],
        ['Ulasan' => 'Ulasan 3', 'Rating' => 'Rating 3', 'NamaLengkap' => 'Nama Lengkap 3']
    ]
];
?>

<div class="container-fluid" >
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile" >
                    <h3 class="profile-username text-center"><?= $data['buku']['judul']; ?></h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Penulis</b>
                            <label style="color:black" class="badge badge-dark"> <?= $data['buku']['penulis']; ?></label>
                        </li>
                        <li class="list-group-item">
                            <b>Penerbit</b>
                            <label style="color:black" class="badge badge-info float-right"><?= $data['buku']['penerbit']; ?></label>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Terbit</b>
                            <label style="color:black" class="badge badge-info float-right"><?= $data['buku']['tahun_terbit']; ?></label>
                        </li>
                        
                        <a href="berikan_ulasan.php?id=<?= $id; ?>" class="btn btn-success btn-block mt-2">
                            <b>Berikan Ulasan</b>
                        </a>
                        <a href="?page=daftarbuku" class="btn btn-danger btn-block mt-2">
                            <b>Kembali</b>
                        </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4>Ulasan</h4>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Pemberi Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['ulasan'] as $ulasan): ?>
                            <tr>
                                <td><?= $ulasan['Ulasan']; ?></td>
                                <td><?= $ulasan['Rating']; ?></td>
                                <td><?= $ulasan['NamaLengkap']; ?></td>
                            </tr>
                            <?php endforeach ?>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
