@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Suku Cadang Terlaris </p>
              @if ($penjualanTerbanyak)
                <h5 class="font-weight-bolder">
                  {{ $penjualanTerbanyak->total_laporan_penjualans }}
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">{{ $penjualanTerbanyak->suku_cadangs_nama }}</span>
                  {{ $penjualanTerbanyak->nomor }}
                </p>
              @else
              <h5 class="font-weight-bolder">
              </h5>
              <p class="mb-0">
                <span class="text-Danger text-sm font-weight-bolder">Tidak Ada Penjualan</span>
              </p>
              @endif
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Suku Cadang Terbanyak</p>
              <h5 class="font-weight-bolder">
                {{ $sukuCadangTerbanyak->stock }}
              </h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">{{ $sukuCadangTerbanyak->nama }}</span>
                {{ $sukuCadangTerbanyak->nomor }}
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Transaksi Bulan ini</p>
              <h5 class="font-weight-bolder">
                {{ $totalTransaksiBulanIni }}               
              </h5>
              <p class="mb-0">
                @if ($sukuCadangTerlarisBulanIni)
                  Terlaris
                  <span class="text-success text-sm font-weight-bolder">{{ $sukuCadangTerlarisBulanIni->nama }}</span>
                  {{ $sukuCadangTerlarisBulanIni->nomor }}
                @else
                  <span class="text-danger text-sm font-weight-bolder">Tidak Ada Penjualan</span>    
                @endif
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Sales overview</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">4% more</span> in 2021
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Gudang</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-mobile-button text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Suku Cadang</h6>
                <span class="text-xs">{{ $total->sukucadang }} Item </span>
              </div>
            </div>
            <div class="d-flex">
              <a href="/sukucadang" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-tag text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Alat</h6>
                <span class="text-xs">{{ $total->alat }} Item </span>
              </div>
            </div>
            <div class="d-flex">
              <a href="/alat" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-box-2 text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Teknisi</h6>
                <span class="text-xs">{{ $total->teknisi }} Orang</span>
              </div>
            </div>
            <div class="d-flex">
              <a href="/teknisi" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

  
  var months = @json($months);
  var totalTransaksiBulanan = @json($totalTransaksiBulanan);

  new Chart(ctx1, {
    type: "line",
    data: {
      labels: months, 
      datasets: [{
        label: "Total Transaksi",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: totalTransaksiBulanan, 
        maxBarThickness: 6
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
@endsection