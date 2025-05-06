@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
<div class="container-fluid">
  <h3 class="fw-semibold">Dashboard</h3>
  <h6>Menu ini berisi ringkasan data dan statistik operasional laundry.</h6>

  <div class="row">
    <div class="col-lg-12">

      <div class="row">
        <div class="col-lg-4">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Admin</h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_data_admin }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-user fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Pelanggan </h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_data_pelanggan }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-user fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Pesanan </h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_data_pesanan }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-ticket fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Pending</h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_pesanan_pending }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-dark rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-currency-dollar fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Diproses </h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_pesanan_diproses }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-currency-dollar fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Selesai </h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_pesanan_selesai }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-currency-dollar fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Diterima </h5>
                  <h4 class="fw-semibold mb-3">{{ $jumlah_pesanan_diterima }}</h4>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-currency-dollar fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@section('script')
    
@endsection