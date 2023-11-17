@extends('layouts.admin')

@section('title', 'নিয়মকানুন তৈরি করুন')
@section('content-header', 'নিয়মকানুন তৈরি করুন')

@section('content')

    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

        <div class="card-body">

            <form action="{{ route('rules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="description">
                    <label for="description">বিবরণ</label>
                    <textarea name="description" id="deditor" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#deditor'))
                        .then(editor => {
                            editor.setData("{!! old('description') !!}");
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                <button class="btn btn-primary" type="submit">তৈরি করুন</button>
                <a href="{{ route('rules.index') }}" class="btn btn-danger">বাতিল করুন</a>
            </form>
        </div>
    </div>
@endsection

