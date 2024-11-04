@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Daftar Teknisi</h6>
        <a href="{{ url('/teknisi/tambah') }}"  class="mdc-button mdc-menu-button mdc-button--raised icon-button shaped-button secondary-filled-button mr-4">
          <i class="fas fa-plus text-success text-lg"></i>
        </a>
      </div>
      @if (session()->has('success'))
        <div class="container">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon" style="color: white"><i class="fas fa-thumbs-up"></i></span>
            <span class="alert-text" style="color: white"><strong>Berhasil!</strong> {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        @endif
        @if (session()->has('danger'))
        <div class="container">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon" style="color: white"><i class="fas fa-exclamation"></i></span>
            <span class="alert-text" style="color: white"><strong>Dihapus!</strong> {{ session('danger') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          {{ $teknisis->links('vendor.pagination.pagination-template') }}
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dipekerjakan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teknisis as $teknisi)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm" style="padding-left: 10px;">{{ $teknisi->nomor }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $teknisi->nama }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $teknisi->jabatan }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $teknisi->dipekerjakan }}</span>
                  </td>
                  <td class="align-middle text-center">
                    @if ($teknisi->status==1)
                        <span class="badge badge-sm bg-gradient-success">
                          Ada
                        </span>
                    @else
                        <span class="badge badge-sm bg-gradient-secondary">
                          Istirahat
                        </span>
                    @endif
                  </td>
                  <td class="align-middle">
                    <a href="/teknisi/{{ $teknisi->id }}/edit" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Edit
                    </a>
                    |
                    <form action="/teknisi/{{ $teknisi->id }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="text-danger font-weight-bold text-xs border-0" onclick="return confirm('Hapus Data?')" style="background-color: transparent;" data-toggle="tooltip" data-original-title="Hapus user">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection