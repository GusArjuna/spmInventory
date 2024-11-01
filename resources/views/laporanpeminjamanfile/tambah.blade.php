@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Laporan</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/laporanpeminjaman/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor Laporan</label>
              <input type="text" class="form-control" id="nomor" placeholder="DC06" name="nomor" required autofocus>
            </div>
            <div class="form-group">
              <label for="peminjam">peminjam Peminjam</label>
              <input type="text" class="form-control" id="peminjam" placeholder="John" name="peminjam" required>
            </div>
            <div class="form-group">
              <label for="sukucadang">Barang Yang Dipinjam</label>
              <select class="form-control @error('foodCategory') is-invalid @enderror" aria-label=".form-select-sm example" name="sukucadang" id="sukuCadang" required>
                <option value="">- Pilih Salah Satu -</option>
                {{-- @foreach ($foodCategories as $foodCategory) --}}
                <option value="123">Kangen</option>
                {{-- <option {{ (old('foodCategory')==$foodCategory->kode)?"selected":"" }} value="{{ $foodCategory->kode }}">{{ $foodCategory->kode }} - {{ $foodCategory->nama }}</option> --}}
                {{-- @endforeach --}}
            </select>
            </div>
            <div class="form-group">
              <label for="tanggal" class="form-control-label">Tanggal Kembali</label>
              <input class="form-control" type="date" value="2018-11-23" id="tanggal">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" required disabled>
            </div>
            <button type="submit" class="btn bg-gradient-primary">Sumbit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection