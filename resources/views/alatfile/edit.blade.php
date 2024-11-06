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
          <form action="/alat/{{ $alat->id }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="nomor">Nama Alat</label>
              <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="DC06" name="nomor" value="{{ old('nomor',$alat->nomor) }}" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            {{-- <div class="form-group">
              <label for="nama">Nama Alat</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Oil" name="nama" value="{{ old('nama',$alat->nama) }}" required>
              @error('nama')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga">Harga Alat</label>
              <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="15000" name="harga" value="{{ old('harga',$alat->harga) }}" required>
              @error('harga')
              <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div> --}}
            <div class="form-group">
              <label for="stock">Stock Awal</label>
              <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="15" name="stock" value="{{ old('stock',$alat->stock) }}" required>
              @error('stock')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            {{-- <div class="form-group">
              <label for="jenis">Jenis Alat</label>
              <select class="form-control @error('jenis') is-invalid @enderror" aria-label=".form-select-sm example" name="jenis" id="jenis" required>
                <option value="">- Pilih Salah Satu -</option>
                @foreach ($jeniss as $jenis)
                  @if ($jenis->jenis == "Alat")
                    <option {{ (old('jenis',$alat->jenis)==$jenis->nomor)?"selected":"" }} value="{{ $jenis->nomor }}">{{ $jenis->nomor }} - {{ $jenis->jenis }}</option>
                  @endif
                @endforeach
            </select>
            </div> --}}
            <button type="submit" class="btn bg-gradient-primary">Sumbit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection