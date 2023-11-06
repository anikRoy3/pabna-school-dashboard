@extends('layouts.admin')

@section('title', 'স্লাইডার সম্পাদনা করুন')
@section('content-header', 'স্লাইডার সম্পাদনা করুন')

@section('content')

    <div class="card">
        <div class="card-body">


            <form action="{{ route('directors_categories.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">ক্যাটাগরির নাম <span class="text-danger"> * </span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="ক্যাটাগরির নাম" value="{{ old('name', $data->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">হালনাগাদ করুন</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
