<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            Tambah Data
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Pencarian Mahasiswa.." name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Button</button>
          </div>
        </div>
        </form>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar mahasiswa</h3>
            <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs):?>
                <li class="list-group-item ">
                    <?= $mhs['nama']; ?>
                    <a href="<?= BASEURL ; ?>/mahasiswa/hapus/<?= $mhs['id'];?>" class= "badge badge-danger badge-pill float-right ml-1" onclick="return confirm('yakin data akan dihapus???');">hapus</a>
                    <a href="<?= BASEURL ; ?>/mahasiswa/ubah/<?= $mhs['id'];?>" class= "badge badge-success badge-pill float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                    <a href="<?= BASEURL ; ?>/mahasiswa/detail/<?= $mhs['id'];?>" class= "badge badge-primary badge-pill float-right">detail</a>
                </li>
            <?php endforeach;?>
            </ul>   
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">

            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama mahasiswa!">
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukan nim mahasiswa!">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Listrik">Teknik Listrik</option>
                <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                <option value="Teknik Manajemen Informasi">Teknik Manajemen Informasi</option>
                </select>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>