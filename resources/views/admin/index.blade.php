@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin List</h1>
                        <!-- <a class="btn btn-primary float-end" href="{{route('admin.create')}}">Add Admin</a> -->
                    </div>

                    <!-- Table -->
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
                        <div class="col-xl-12 col-lg-7">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
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
                                                @if($data['admins'])
                                                    @foreach ($data['admins'] as $key => $admin)
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
                        </div>
                    </div>
                      
                    
@endsection