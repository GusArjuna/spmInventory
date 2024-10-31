@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Alat</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/alat/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor Alat</label>
              <input type="text" class="form-control" id="nomor" placeholder="DC06" name="nomor" required autofocus>
            </div>
            <div class="form-group">
              <label for="nama">Nama Alat</label>
              <input type="text" class="form-control" id="nama" placeholder="Oil" name="nama" required>
            </div>
            <div class="form-group">
              <label for="sukucadang">Jenis Suku Cadang</label>
              <select class="form-control @error('foodCategory') is-invalid @enderror" aria-label=".form-select-sm example" name="sukucadang" id="sukuCadang" required>
                <option value="">- Pilih Salah Satu -</option>
                {{-- @foreach ($foodCategories as $foodCategory) --}}
                <option value="123">Kangen</option>
                {{-- <option {{ (old('foodCategory')==$foodCategory->kode)?"selected":"" }} value="{{ $foodCategory->kode }}">{{ $foodCategory->kode }} - {{ $foodCategory->nama }}</option> --}}
                {{-- @endforeach --}}
            </select>
            </div>
            <div class="form-group">
              <label for="harga">Harga Suku Cadang</label>
              <input type="number" class="form-control" id="harga" placeholder="15000" name="harga" required>
            </div>
            <div class="form-group">
              <label for="ketersediaan">Ketersediaan</label>
              <select class="form-control @error('foodCategory') is-invalid @enderror" aria-label=".form-select-sm example" name="ketersediaan" id="ketersediaan" required>
                <option value="1">Ada</option>
                <option value="0">Tidak Ada</option>
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