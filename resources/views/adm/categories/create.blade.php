@extends('layouts.adm')

@section('title', 'Categories Page')

@section('content')
    <br><br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center mb-4">CATEGORIES Create</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('adm.categories.store') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="nameKZ" class="form-label">Санатың атауы:</label>
                                <input type="text" class="form-control" name="Name_kz" id="nameKZ">
                            </div>

                            <div class="mb-3">
                                <label for="nameRU" class="form-label">Name in RU:</label>
                                <input type="text" class="form-control" name="Name_ru" id="nameRU">
                            </div>

                            <div class="mb-3">
                                <label for="nameEN" class="form-label">Name in EN:</label>
                                <input type="text" class="form-control" name="Name_en" id="nameEN">
                            </div>

                            <div class="mb-3">
                                <label for="imgInput" class="form-label">Санат суреті:</label>
                                <input type="file" class="form-control @error('catImg') is-invalid @enderror" id="imgInput" name="catImg">
                                @error('catImg')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
