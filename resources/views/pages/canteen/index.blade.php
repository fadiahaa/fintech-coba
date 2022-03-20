@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            Add
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action={{ route('item.add') }}>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" id="stock">
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="desc">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <img width="100" height="75" src={{ asset('assets/images/' . $item->image) }}
                                alt="not found" />
                        </td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div style="float: left;margin-right:3px;">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{ $item->id }}">
                                    Edit
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action={{ route('item.edit', ['item' => $item->id]) }}>
                                                    @csrf
                                                    @method("PUT")
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Select Image</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            name="image">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" id="price" name="price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="stock" class="form-label">Stock</label>
                                                        <input type="number" name="stock" class="form-control" id="stock">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="desc" class="form-label">Description</label>
                                                        <input type="text" name="description" class="form-control"
                                                            id="desc">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <form method="POST" action={{ route('item.delete', $item->id) }}>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
