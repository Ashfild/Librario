@extends('layouts.app')

@section('judul', 'Edit Book')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Book</h1>
            <hr>

            <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}" required>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $book->pengarang }}" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="{{ asset('storage/'.$book->image) }}" alt="{{ $book->judul }}" class="mt-2" width="200">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection