@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{'home'}}" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('books.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Book</a>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4">
                <div class="thumbnail border border-3 rounded-3 p-5">
                    <img class="w-100 mb-3" src="{{ asset($book->image) }}" alt="{{ $book->judul }}">
                    <div class="caption">
                        <h3>{{ $book->judul }}</h3>
                        <p>{{ $book->pengarang }}</p>
                        <div class="d-flex">
                            <a href="{{ route('home', $book->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ route('books.update', $book->id) }}" class="btn btn-warning mx-2"><i class="fa fa-pencil"></i> Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection