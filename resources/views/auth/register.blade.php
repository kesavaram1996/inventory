@extends('auth.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" value="{{old('first_name')}}" id="first_name" name="first_name" >
                            @if($errors->has('first_name'))
                                <div class="error">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" value="{{old('last_name')}}" id="last_name" name="last_name" >
                            @if($errors->has('last_name'))
                                <div class="error">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="dob">DOB</label>
                            <input type="date" class="form-control" value="{{old('dob')}}" id="dob" name="dob" >
                            @if($errors->has('dob'))
                                <div class="error">{{ $errors->first('dob') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" >
                            @if($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" value="{{old('mobile')}}" id="mobile" name="mobile" >
                            @if($errors->has('mobile'))
                                <div class="error">{{ $errors->first('mobile') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" value="{{old('address')}}" id="address" name="address" >
                            @if($errors->has('address'))
                                <div class="error">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" value="{{old('state')}}" id="state" name="state" >
                            @if($errors->has('state'))
                                <div class="error">{{ $errors->first('state') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" value="{{old('city')}}" id="city" name="city" >
                            @if($errors->has('city'))
                                <div class="error">{{ $errors->first('city') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="pincode">Pincode</label>
                            <input type="number" class="form-control" value="{{old('pincode')}}" id="pincode" name="pincode" >
                            @if($errors->has('pincode'))
                                <div class="error">{{ $errors->first('pincode') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password" >
                            @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" value="{{old('password_confirmation')}}" id="password-confirm" name="password_confirmation"  autocomplete="new-password">
                            @if($errors->has('password_confirmation'))
                                <div class="error">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <div class="row mb-0 mt-3 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
