@extends('admin.layout.layout')

@section('content')
  @include('admin.components.sidebar')
  <div class="row m-0">
    <div class="col-lg-2 col-4">

    </div>
    <div class="col-lg-10 col-8">
      <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="m-0">Dashboard</h3>
        </div>
        <div class="border border-bottom border-black mt-3"></div>
      </div>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-12 col-lg-4 mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-dark-subtle px-3 py-4">
                <div class="d-flex align-items-center gap-3">
                  <div class="d-flex align-items-center justify-content-center rounded-circle bg-white" style="width: 50px; height: 50px">
                    <ion-icon class="fs-3" name="people-outline"></ion-icon>
                  </div>
                  <div class="">
                    <h4 class="m-0">20.000</h4>
                    <small>User Active</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-secondary-subtle px-3 py-4">
                <div class="d-flex align-items-center gap-3">
                  <div class="d-flex align-items-center justify-content-center rounded-circle bg-white" style="width: 50px; height: 50px">
                    <ion-icon class="fs-3" name="document-text-outline"></ion-icon>
                  </div>
                  <div class="">
                    <h4 class="m-0">20.000</h4>
                    <small>CV Created</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-body-secondary px-3 py-4">
                <div class="d-flex align-items-center gap-3">
                  <div class="d-flex align-items-center justify-content-center rounded-circle bg-white" style="width: 50px; height: 50px">
                    <ion-icon class="fs-3" name="cloud-download-outline"></ion-icon>
                  </div>
                  <div class="">
                    <h4 class="m-0">20.000</h4>
                    <small>CV Exported</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-12 col-lg-8 mb-4">
            <div class="card p-2 rounded-4">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>bennartdg</td>
                    <td>bennart.dgunawan@gmail.com</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>fahrikun</td>
                    <td>fahri@gmail.com</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>addien</td>
                    <td>addien@gmail.com</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-4">
            <div class="card p-2 rounded-4">
              <h6 class="p-3">User Status Chart</h6>
              @include('admin.components.pie-chart')

              <div id="piechart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
