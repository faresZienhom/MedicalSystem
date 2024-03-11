@extends('Admin.layouts.master')

@section('title')
    | Edit Patient
@endsection

@section('css')
@endsection

@section('page-name')
    Patients
@endsection

@section('page-link')
    {{ route('admin.dashboard.patients.index') }}
@endsection

@section('main-title')
    Edit Patient
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Patient : {{ $patient->user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.dashboard.patients.update', $patient) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Patient Name</label>
                            <input type="text" class="form-control" value="{{ old('name') ?? $patient->user->name }}"
                                id="name" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="address">Patient Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3">{{ old('address') ?? $patient->address }}</textarea>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Patient Phone</label>
                            <input type="text" class="form-control" value="{{ old('phone') ?? $patient->user->phone }}"
                                id="phone" name="phone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Date range:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>

                                <input name="birth_date" value="{{ old('birth_date') ?? $patient->birth_date }}"
                                    type="date" class="form-control float-right" id="reservation">
                            </div>
                            @error('birth_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <!-- /.input group -->
                        </div>


                        <div class="form-group">
                            <label for="password">Change Patient Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Patient password ...">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" id="password" name="password_confirmation"
                                placeholder="Enter password again ...">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <img src="{{ asset($patient::UPLOAD_PATH . ($patient->user->image ?? 'default_image.png')) }}"
                            width="200" class="img-thumbnail">

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
