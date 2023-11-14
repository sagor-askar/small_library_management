@extends('layouts.app')
<!-- <style>
    .disabled-link {
  pointer-events: none;
} -->
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Book Requests || Library Management System</div>
                <div class="card-body">

                    <!-- table of content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Book Name</th>
                                            <th>Requested Student</th>
                                            <th>Requesting Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($check_requests as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->bookInfo->book_name }}</td>
                                            <td>{{ $book->student_name }}</td>
                                            <td>{{ $book->requesting_date }}</td>
                                            <td>{{ $book->return_date }}</td>

                                            @if($book->status == 'Pending')
                                            <td>
                                                <button type="button" class="btn btn-danger">{{ $book->status }}</button>
                                            </td>
                                            @else
                                            <td>
                                                <button type="button" class="btn btn-success">{{ $book->status }}</button>
                                            </td>
                                            @endif

                                            <td>
                                                <a href="{{ route('book.statusChange',$book->id)}}" class="btn btn-success">Change Status</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" style="margin: 8px;">
                                    <a href="{{ route('admin.home') }}" style="color: white; text-decoration: none;">Back</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection