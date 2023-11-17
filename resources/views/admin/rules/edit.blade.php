@extends('layouts.admin')

@section('title', 'নিয়মকানুন আপডেট করুন')
@section('content-header', 'নিয়মকানুন আপডেট করুন')

@section('content')

    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

        <div class="card-body">

            <form action="{{ route('rules.update', $data) }}" method="POST" enctype="multipart/form-data">
                {{-- @dd($data) --}}
                @csrf
                @method('PUT')
                <div class="form-group" id="description">
                    <label for="description">বিবরণ</label>
                    <textarea name="description" id="deditor" required class="form-control @error('description') is-invalid @enderror">{{ old('description', $data->description) }}</textarea>
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
                            editor.setData(`{!! addslashes(old('description', $data->description)) !!}`);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                <button class="btn btn-primary" type="submit">আপডেট করুন</button>
                <a href="{{ route('rules.index') }}" class="btn btn-danger">বাতিল করুন</a>
            </form>
        </div>
    </div>
@endsection
