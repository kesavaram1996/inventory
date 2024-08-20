@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <form action="{{route('update_settings')}}" method="POST">
                                        @csrf
                                        <div class="text-center">
                                            <h5 class="mb-0 text-gray-800">Personal Settings</h5>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password" >
                                            @if($errors->has('password'))
                                                <div class="error-msg">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>  
                                        <div class="form-group">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input type="password" class="form-control" value="{{old('password_confirmation')}}" id="password-confirm" name="password_confirmation"  autocomplete="new-password">            
                                            @if($errors->has('password_confirmation'))
                                                <div class="error-msg">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div> 
                                        @if(auth()->user()->getrole->name == 'Super Admin')
                                            <div class="text-center">
                                                <h5 class="mb-0 text-gray-800">Inventory Settings</h5>
                                            </div>
                                            <div class="form-group">
                                                <label for="low_alert_limit">Inventory Low Alert Limit</label>
                                                <input type="number" class="form-control" value="{{$alert_count}}" id="low_alert_limit" name="low_alert_limit" >
                                                @if($errors->has('low_alert_limit'))
                                                    <div class="error-msg">{{ $errors->first('low_alert_limit') }}</div>
                                                @endif
                                            </div>  
                                        @endif
                                        <div class="form-group ">
                                            <input type="submit" value="update" class="btn btn-primary">
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    
@endsection