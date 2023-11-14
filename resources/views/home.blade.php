@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Book Information || Library Management System</div>
                <div class="card-body">
                    <!-- request button -->
                    <button type="button" class="btn btn-success" style="margin: 8px;">
                        <a href="{{ route('create.request') }}" style="text-decoration: none; color: white;">Make Request</a>
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
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info">{{ $book->status }}</button>
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