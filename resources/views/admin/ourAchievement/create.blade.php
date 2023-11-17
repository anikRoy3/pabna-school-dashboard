@extends('layouts.admin')

@section('title', 'অর্জন সমূহ তৈরি করুন')
@section('content-header', 'অর্জন সমূহ তৈরি করুন')

@section('content')

    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

        <div class="card-body">

            <form action="{{ route('ourAchievement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="title">শিরোনাম <span class="text-danger"> * </span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="title" placeholder="শিরোনাম লিখুন" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="image">ছবি <span class="text-danger"> * </span> <small class="text-success">(একের অধিক
                            ছবি আপলোড দিতে পারেন)</small></label>
                    <div class="custom-file">
                        <input type="file" required class="custom-file-input" name="images[]" id="o_a_image" multiple>
                        <label class="custom-file-label" for="image" id="image-label">ছবি নির্বাচন করুন</label>
                    </div>
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" id="image-preview">
                    <!-- Image previews will be displayed here -->
                </div>

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
                <a href="{{ route('ourAchievement.index') }}" class="btn btn-danger">বাতিল করুন</a>
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

    <script>
        document.querySelector('#o_a_image').addEventListener('change', function(e) {
            const fileList = e.target.files;
            const imagePreview = document.querySelector('#image-preview');
            imagePreview.innerHTML = '';

            for (let i = 0; i < fileList.length; i++) {
                const image = document.createElement('img');
                image.src = URL.createObjectURL(fileList[i]);
                image.style.width = '100px';
                image.style.height = '100px';
                image.style.marginRight = '10px'
                imagePreview.appendChild(image);
            }
        });
    </script>
@endsection
