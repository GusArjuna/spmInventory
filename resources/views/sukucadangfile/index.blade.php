@extends('template.navbar')
@section('bagan')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="width: 1150px">
        <h6>Daftar Suku Cadang</h6>
        <a href="{{ url('#') }}"  class="mdc-button mdc-menu-button mdc-button--raised icon-button shaped-button secondary-filled-button mr-4">
          <i class="fas fa-plus text-success text-lg"></i>
        </a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Ada</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">Habis</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Ada</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user4">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Ada</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user5">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">Habis</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Oil Seal</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">DC06</p>
                  <p class="text-xs text-secondary mb-0">seal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">Habis</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">Rp. 15.000</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  |
                  <a href="javascript:;" class="text-danger font-weight-bold text-xs">
                    Hapus
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection