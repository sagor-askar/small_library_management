<!-- resources/views/book-info/edit.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.info', ['id' => $books->id]) }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="book_name">{{ __('Book Name') }}</label>
                            <input id="book_name" type="text" class="form-control" name="book_name" value="{{ old('book_name', $books->book_name) }}" placeholder="Enter Book Name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="author">{{ __('Author') }}</label>
                            <input id="author" type="text" class="form-control" name="author" value="{{ old('author', $books->author) }}" placeholder="Enter Book Name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="Available" {{ old('status', $books->status) === 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="Checked Out" {{ old('status', $books->status) === 'Checked Out' ? 'selected' : '' }}>Checked Out</option>
                                <option value="Reserved" {{ old('status', $books->status) === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                            </select>
                        </div>






                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Info') }}
                            </button>
                            <button type="button" class="btn btn-primary" style="margin: 8px;">
                                <a href="{{ route('admin.home') }}" style="color: white; text-decoration: none;">Back</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection