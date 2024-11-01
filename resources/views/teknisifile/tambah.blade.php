@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Teknisi</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor</label>
              <input type="text" class="form-control" id="nomor" placeholder="DC06" name="nomor" required autofocus>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Oil" name="nama" required>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" placeholder="Manager" name="jabatan" required>
            </div>
            <div class="form-group">
              <label for="tanggal" class="form-control-label">Tanggal Dipekerjakan</label>
              <input class="form-control" type="date" value="2018-11-23" id="tanggal">
            </div>
            <button type="submit" class="btn bg-gradient-primary">Sumbit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection