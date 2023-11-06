@extends('layouts.admin')

@section('title', 'নাগরিকের সুবিধা সম্পাদনা করুন')
@section('content-header', 'নাগরিকের সুবিধা সম্পাদনা করুন')

@section('content')

    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('nagoriker_subidhas.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nagoriker_subidha_description">দীর্ঘ বিবরণ</label>
                    <textarea name="nagoriker_subidha_description" id="editor"
                        class="form-control @error('nagoriker_subidha_description') is-invalid @enderror">{{ old('nagoriker_subidha_description', $data->nagoriker_subidha_description) }}</textarea>
                    @error('nagoriker_subidha_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
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
