@extends('layouts.app')

@section('content')
    <section class="profile-section vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5 text-center">
                            <img src="{{ asset('storage/' . $user->profImg) }}" alt="Profile Image" class="img-fluid rounded-circle mb-4" style="width: 400px;">
                            <h2 class="mb-3">{{ $user->name }}</h2>
                            <p class="text-muted">{{ $user->email }}</p>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">Profile Information</h4>
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-3">Update Profile</h4>
                                    <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="updateName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="updateName" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="updateEmail" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProfilePhoto" class="form-label">Update Profile Photo</label>
                                            <input type="file" class="form-control" id="profImg" name="profImg">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Update Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
