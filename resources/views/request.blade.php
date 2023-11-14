
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book Request') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.request') }}">
                        @csrf

                        <div class="form-group">
                            <label for="bookinfo_id">{{ __('Select Book') }}</label>
                            <select id="book_info_id" class="form-control" name="book_info_id" required>
                                @foreach($availableBooks as $id => $bookName)
                                <option value="{{ $id }}">{{ $bookName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="student_name">{{ __('Your Name') }}</label>
                            <input id="student_name" type="text" class="form-control" name="student_name" placeholder="Enter Your Name" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="requesting_date">Requesting Date:</label>
                            <input type="date" name="requesting_date" id="requesting_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="return_date">Return Date:</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Request') }}
                            </button>
                            <button type="button" class="btn btn-primary" style="margin: 8px;">
                                <a href="{{ route('home') }}" style="color: white; text-decoration: none;">Back</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection