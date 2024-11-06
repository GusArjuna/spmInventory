@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Tambah Jenis</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/jenis/tambah" method="POST">
            @csrf
            <div class="form-group">
              <label for="nomor">Nomor Jenis</label>
              <input type="text" class="form-control" id="nomor" placeholder="DC06" name="nomor" value="{{ old('nomor') }}" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis">Jenis</label>
              <select class="form-control @error('jenis') is-invalid @enderror" aria-label=".form-select-sm example" name="jenis" id="jenis" required>
                <option @if (old('jenis')=="Alat") selected @endif value="Alat">Alat</option>
                <option @if (old('jenis')=="Suku Cadang") selected @endif value="Suku Cadang">Suku Cadang</option>
              </select>
              @error('jenis')
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