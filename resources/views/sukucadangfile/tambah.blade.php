@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Suku Cadang</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/sukucadang/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor Suku Cadang</label>
              <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="DC06" name="nomor" value="{{ old('nomor') }}" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama Suku Cadang</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Oil" name="nama" value="{{ old('nama') }}" required>
              @error('nama')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga">Harga Suku Cadang</label>
              <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="15000" name="harga" value="{{ old('harga') }}" required>
              @error('harga')
              <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="holdingCosts">Biaya Simpan Suku Cadang</label>
              <input type="number" class="form-control @error('holdingCosts') is-invalid @enderror" id="holdingCosts" placeholder="500" name="holdingCosts" value="{{ old('holdingCosts') }}" required>
              @error('holdingCosts')
              <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="biayaPemesanan">Biaya Pemesanan Suku Cadang</label>
              <input type="number" class="form-control @error('biayaPemesanan') is-invalid @enderror" id="biayaPemesanan" placeholder="15000" name="biayaPemesanan" value="{{ old('biayaPemesanan') }}" required>
              @error('biayaPemesanan')
              <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock">Stock Awal</label>
              <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="15" name="stock" value="{{ old('stock') }}" required>
              @error('stock')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis">Alat</label>
              <select class="form-control @error('jenis') is-invalid @enderror" aria-label=".form-select-sm example" name="jenis" id="jenis" required>
                <option value="">- Pilih Salah Satu -</option>
                @foreach ($alats as $alat)
                  <option {{ (old('jenis')==$alat->nomor)?"selected":"" }} value="{{ $alat->nomor }}">{{ $alat->nomor }}</option>
                @endforeach
            </select>
            </div>
            <button type="submit" class="btn bg-gradient-primary">Sumbit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection