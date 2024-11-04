@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Edit Teknisi</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <form action="/teknisi/{{ $teknisi->id }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="nomor">Nomor</label>
              <input type="text" class="form-control  @error('nomor') is-invalid @enderror" id="nomor" value="{{ old('nomor',$teknisi->nomor) }}" placeholder="DC06" name="nomor" required autofocus>
              @error('nomor')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama',$teknisi->nama) }}" placeholder="Oil" name="nama" required>
              @error('nama')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" value="{{ old('jabatan',$teknisi->jabatan) }}" placeholder="Manager" name="jabatan" required>
              @error('jabatan')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="dipekerjakan" class="form-control-label">Tanggal Dipekerjakan</label>
              <input class="form-control  @error('dipekerjakan') is-invalid @enderror" type="date" id="dipekerjakan" value="{{ old('dipekerjakan',$teknisi->dipekerjakan) }}" name="dipekerjakan"> 
              @error('dipekerjakan')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control @error('status') is-invalid @enderror" aria-label=".form-select-sm example" name="status" id="status" required>
                <option @if (old('status',$teknisi->status)==0) selected @endif value=0>Istirahat</option>
                <option @if (old('status',$teknisi->status)==1) selected @endif value=1>Ada</option>
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