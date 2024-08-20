<!-- resources/views/inventory/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inventory Items</h1>
        <a href="{{ route('inventory.create') }}" class="btn btn-primary">Add Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity_in_stock }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
    $('#search').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: "{{ route('inventory.search') }}",
            type: "GET",
            data: {'query': query},
            success: function(data) {
                $('tbody').html(data);
            }
        });
    });
</script>
@endsection
