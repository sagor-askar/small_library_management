@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- css for the table -->
<style>
    h4 {
        margin: 2rem 0rem 1rem;
    }

    a {
        text-decoration: none;
        color: white;
    }

    .table-image {

        td,
        th {
            vertical-align: middle;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Book Information || Library Management System</div>
                <div class="card-body">
                    <button type="button" class="btn btn-success" style="margin: 8px;">
                        <a href="{{ route('create') }}">Create Info</a>
                    </button>
                    <button type="button" class="btn btn-success" style="margin: 8px;">
                        <a href="{{ route('check.requests') }}">Book Requests</a>
                    </button>

                    <!-- table of content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->status }}</td>
                                            <td>{{ $book->created_at }}</td>
                                            <td>
                                                <a href="{{ route('edit.info', ['id' => $book->id]) }}" class="btn btn-primary">Update Info</a>
                                                <form action="{{ route('book-info.destroy', ['id' => $book->id ]) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection