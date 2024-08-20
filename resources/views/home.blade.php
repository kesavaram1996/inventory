@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <p class="text-success">{{ session('success') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Card Row -->
                    <div class="row">
                        @if(auth()->user()->getrole->name == 'Super Admin')
                        <!-- Total Admins Card -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Admins</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_admins']}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Total Inventory Card -->
                        <div class="{{auth()->user()->getrole->name == 'Super Admin' ? 'col-xl-6':'col-xl-12'}} mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Inventory Items</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_items']}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    

                    <!-- Table -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            @if(auth()->user()->getrole->name == 'Super Admin')
                            <!-- Recent Admins DataTales -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Admins</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Admin Name</th>
                                                    <th>Admin Email</th>
                                                    <th>Created at</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Admin Name</th>
                                                    <th>Admin Email</th>
                                                    <th>Created at</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @if($data['recent_admins'])
                                                    @foreach ($data['recent_admins'] as $key => $admin)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$admin->first_name.' '.$admin->last_name}}</td>
                                                            <td>{{$admin->email}}</td>
                                                            <td>{{$admin->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4">No data found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(auth()->user()->getrole->name == 'Admin')
                            <!-- Recent Items DataTales -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Inventory Items</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @if($data['recent_items'])
                                                    @foreach ($data['recent_items'] as $key => $item)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->description}}</td>
                                                            <td>{{$item->quantity_in_stock}}</td>
                                                            <td>{{$item->price}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5">No data found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                      
                    
@endsection