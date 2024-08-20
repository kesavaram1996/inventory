@extends('layouts.app')

@section('content')
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Inventory Items</h1>
                        @if(auth()->user()->getrole->name == 'Admin')
                        <a href="{{route('inventory.create')}}" class="btn btn-primary float-end">Add Inventtory</a>
                        @endif
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
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mt-2 font-weight-bold text-primary">Inventory Items</h6>
                                        </div>
                                        <div class="col-1">
                                        </div>
                                        <div class="col-3">
                                            @if(auth()->user()->getrole->name == 'Admin')
                                            <div>
                                            <a href="javascript:void(0)" class="btn btn-success import">Import</a>
                                            </div>
                                            <a href="{{asset('import_sample.xlsx')}}" download>Import Sample Doc</a>
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            <a href="{{route('export')}}" class="btn btn-info">Export</a>
                                        </div>
                                    </div>
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
                                                    @if(auth()->user()->getrole->name == 'Super Admin')
                                                    <th>Admin Name</th>
                                                    @endif
                                                    @if(auth()->user()->getrole->name == 'Admin')
                                                    <th>Actions</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    @if(auth()->user()->getrole->name == 'Super Admin')
                                                    <th>Admin Name</th>
                                                    @endif
                                                    @if(auth()->user()->getrole->name == 'Admin')
                                                    <th>Actions</th>
                                                    @endif
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @if($data['items'])
                                                    @foreach ($data['items'] as $key => $item)
                                                        <tr class="{{$data['alert_limit'] >= $item->quantity_in_stock ? 'table-alert-bg': '' }}">
                                                            <td>{{++$key}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->description}}</td>
                                                            <td>{{$item->quantity_in_stock}}</td>
                                                            <td>{{$item->price}}</td>
                                                            @if(auth()->user()->getrole->name == 'Super Admin')
                                                            <td>{{$item->getUser->first_name.' '.$item->getUser->last_name}}</td>
                                                            @endif
                                                            @if(auth()->user()->getrole->name == 'Admin')
                                                            <td>
                                                                <!-- Edit -->
                                                                <a href="{{route('inventory.edit',$item->id)}}"><img src="{{asset('img/edit.png')}}" alt="Edit"></a>
                                                                <!-- Delete -->
                                                                <form id="delete-form-{{ $item->id }}" action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <img onclick="deleteItem({{ $item->id }})" src="{{asset('img/delete.png')}}" alt="Delete">
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">No data found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Import Modal -->
                    <div id="import_modal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="import_close">&times;</span>
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('import')}}" method="post" enctype="multipart/form-data" id="import_form">
                                        @csrf
                                        <input type="hidden" name="id" id="import_id" value="">
                                        
                                        <div class="mb-3">
                                            <label for="file">File</label>
                                            <input type="file" name="file" class="form-control" id="file">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    <script type="text/javascript">
                        // Delete item
                        function deleteItem(id) {
                            if(confirm("Are you sure you want to delete this item?")) {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        }

                        // Import modal Open
                        $(document).on("click",".import",function() {
                            $("#import_modal").show();
                            var id     = $(this).attr('data-id');
                            $("#import_id").val(id);
                        });

                        //Import modal Form Validation
                        $(document).on("submit","#import_form",function(e) {
                            var file = $("#file").val();
                            $(".error-msg").empty();
                            if(file.length < 1){
                                e.preventDefault();
                                $("#file").after('<span class="error-msg">This field is required </span>');
                            }
                        });

                        // Import modal Close
                        $(document).on("click",".import_close",function() {
                            $("#import_form")[0].reset();
                            $(".error-msg").empty();
                            $("#import_modal").hide();
                        });
                    </script>
                    
@endsection