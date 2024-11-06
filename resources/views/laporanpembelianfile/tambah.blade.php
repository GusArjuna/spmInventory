@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Laporan</h6>
      </div>
      @if (session()->has('danger'))
        <div class="container">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon" style="color: white"><i class="fas fa-exclamation"></i></span>
            <span class="alert-text" style="color: white"><strong>Gagal!</strong> {{ session('danger') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/laporanpembelian/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor Laporan</label>
              <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="DC06" name="nomor" value="{{ old('nomor') }}" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Suku Cadang</label>
              <select class="form-control @error('nama') is-invalid @enderror" aria-label=".form-select-sm example" name="nama" id="nama" required>
                @foreach ($sukuCadangs as $sukuCadangs)
                    <option {{ (old('nama')==$sukuCadangs->nomor)?"selected":"" }} value="{{ $sukuCadangs->nomor }}">{{ $sukuCadangs->jenis }} - {{ $sukuCadangs->nomor }} - {{ $sukuCadangs->nama }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="15" name="jumlah" value="{{ old('jumlah') }}" required>
              @error('jumlah')
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