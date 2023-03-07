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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookModal-{{ $book->id }}">Detail</a>
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
    <div class="modal fade" id="bookModal-{{ $books->id }}" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel-{{ $books->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel-{{ $book->id }}">{{ $book->judul }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/'.$book->image) }}" alt="{{ $book->judul }}" class="mb-2" width="200">
                    <p><strong>Pengarang:</strong> {{ $book->pengarang }}</p>
                    <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection