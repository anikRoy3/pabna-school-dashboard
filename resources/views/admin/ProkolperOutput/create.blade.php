@extends('layouts.admin')

@section('title', 'প্রকল্পের আউটপুট তৈরি করুন')
@section('content-header', 'প্রকল্পের আউটপুট তৈরি করুন')

@section('content')

    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('prokolper_outputs.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="prokolper_output_description">দীর্ঘ বিবরণ</label>
                    <textarea name="prokolper_output_description" id="editor"
                        class="form-control @error('prokolper_output_description') is-invalid @enderror">{{ old('prokolper_output_description') }}</textarea>
                    @error('prokolper_output_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            // Set the content of CKEditor from old input or session
                            editor.setData("{!! old('prokolper_output_description') !!}");
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                <div class="form-group">
                    <label for="status">স্ট্যাটাস</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>সক্রিয়</option>
                        <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>নিষ্ক্রিয়</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">তৈরি করুন</button>
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
