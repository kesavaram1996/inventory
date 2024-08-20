@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Admin</h1>
                        <a class="btn btn-primary float-end" href="{{route('admin.index')}}">Back</a>
                    </div>

                    <!-- Form -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <form method="POST" action="{{route('admin.store')}}">
                                @csrf

                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" >
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" >
                                </div>

                                <div class="form-group">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control" id="dob" name="dob" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" >
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" >
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" >
                                </div>

                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" >
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" >
                                </div>

                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="number" class="form-control" id="pincode" name="pincode" >
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" >
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                      
                    
@endsection