@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Algoritma Wagner Within</h6>
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
          {{ $wagners->links('vendor.pagination.pagination-template') }}
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Bahan Baku</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Holding Cost</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biaya Pemesanan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Demand Periode 1</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Demand Periode 2</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Demand Periode 3</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wagner Within</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wagners as $wagner)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-bold mb-0" style="padding-left: 10px;">{{ $wagner->sukuCadangs->nama }}</h6>
                        <h6 class="mb-0 text-xs" style="padding-left: 10px;">{{ $wagner->sukuCadangs->nomor }}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->sukuCadangs->harga }}</p>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->sukuCadangs->holdingCosts }}</p>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->sukuCadangs->biayaPemesanan }}</p>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->periode1 }}</p>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->periode2 }}</p>
                  </td>
                  <td class="text-sm">
                    <p class="text-sm font-weight-bold mb-0">{{ $wagner->periode3 }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-sm font-weight-bold mb-0">Rp. {{ $wagner->ww }}</p>
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