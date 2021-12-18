@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash='$active' :prod='$nope' :ord='$nope'>
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-4">Welcome, {{auth()->user()->name}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{auth()->user()->email}}</li>
                    </ol>
                </div>
                <div class="col-md-6" align="right">
                    <br><br>
                    <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#print-modal"><span class="fa fa-print text-white"></span>  Print Order Reports</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">In-Stock Products: {{$inStock->count()}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin-all-products">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Out-Of-Stock Products: {{$outOfStock->count()}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin-out-products">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Pending Orders: 0</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/pending-orders">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Completed Orders: 0</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/completed-orders">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Website Visits
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Overall Sales
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="print-modal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title"> <span class="fa fa-print"></span> Print Order Reports</h4>
        
      </div>
      <div class="modal-body">
      <form action="{{route('print-order')}}" target="_blank" method="GET" id="print-form" autocomplete="off">
        @csrf
        <div class="form-group">
          <b>Select City:</b>
          <select class="form-control" name="city" required>
                <option value="">--Select City--</option>
                <option value="Mandaluyong">Mandaluyong</option>
                <option value="Pasig" >Pasig</option>
                <option value="Cainta">Cainta</option>
                <option value="Quezon City">Quezon City</option>
                <option value="Makati" >Makati</option>
                <option value="Marikina" >Marikina</option>
                <option value="Pateros" >Pateros</option>
                <option value="Taguig" >Taguig</option>
          </select>
        </div>
        <div class="form-group">
        <b>Date Range:</b>
            <div class="input-group mb-3">
                <input type="date" name="start-date" class="form-control" required />
                <div class="input-group-prepend">
                <span class="input-group-text">TO</span>
                </div>
                <input type="date" name="end-date" class="form-control" required />
            </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" form="print-form">Submit</button>
      </div>
    </div>

  </div>
</div>
</x-admin-layout>
