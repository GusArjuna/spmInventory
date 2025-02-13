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
          <form action="/teknisi/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor</label>
              <input type="text" class="form-control  @error('nomor') is-invalid @enderror" id="nomor" value="{{ old('nomor') }}" placeholder="DC06" name="nomor" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}" placeholder="Oil" name="nama" required>
              @error('nama')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" value="{{ old('jabatan') }}" placeholder="Manager" name="jabatan" required>
              @error('jabatan')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="dipekerjakan" class="form-control-label">Tanggal Dipekerjakan</label>
              <input class="form-control  @error('dipekerjakan') is-invalid @enderror" type="date" id="dipekerjakan" value="{{ old('dipekerjakan') }}" name="dipekerjakan"> 
              @error('dipekerjakan')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn bg-gradient-primary">Sumbit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection