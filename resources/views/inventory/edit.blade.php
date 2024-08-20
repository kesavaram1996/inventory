@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Inventory</h1>
                        <a href="{{route('inventory.index')}}" class="btn btn-primary float-end">Back</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Inventory</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST" action="{{route('inventory.update',$data[0]->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" value="{{$data[0]->name}}" id="name" name="name" >
                                                    @if($errors->has('name'))
                                                        <div class="error-msg">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>

                                                <!-- Description -->
                                                <div class="form-group">
                                                    <label for="description">description</label>
                                                    <input type="text" class="form-control" value="{{$data[0]->description}}" id="description" name="description" >
                                                    @if($errors->has('description'))
                                                        <div class="error-msg">{{ $errors->first('description') }}</div>
                                                    @endif
                                                </div>

                                                <!-- Quantity -->
                                                <div class="form-group">
                                                    <label for="quantity_in_stock">Quantity in Stock</label>
                                                    <input type="number" class="form-control" value="{{$data[0]->quantity_in_stock}}" id="quantity_in_stock" name="quantity_in_stock" >
                                                    @if($errors->has('quantity_in_stock'))
                                                        <div class="error-msg">{{ $errors->first('quantity_in_stock') }}</div>
                                                    @endif
                                                </div>

                                                <!-- Price -->
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" value="{{$data[0]->price}}" id="price" name="price" >
                                                    @if($errors->has('price'))
                                                        <div class="error-msg">{{ $errors->first('price') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group text-center">
                                                    <input type="submit" class="btn btn-primary" value="update">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    
@endsection