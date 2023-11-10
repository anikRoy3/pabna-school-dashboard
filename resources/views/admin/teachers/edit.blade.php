@extends('layouts.admin')

@section('title', 'শিক্ষকমন্ডলী আপডেট করুন')
@section('content-header', 'শিক্ষকমন্ডলী আপডেট করুন')

@section('content')

    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

        <div class="card-body">

            <form action="{{ route('teachers.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- @dd($data) --}}
                <div class="form-group">
                    <label for="name">শিক্ষকের নাম<span class="text-danger"> * </span></label>
                    <input type="text" required name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="শিক্ষকের নাম লিখুন" value="{{ old('name', $data->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">ই-মেইল<span class="text-danger"> * </span></label>
                    <input type="email" required name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="শিক্ষকের ই-মেইল লিখুন" value="{{ old('email', $data->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="designation">উপাধি<span class="text-danger"> * </span></label>
                    <input type="text" name="designation" required
                        class="form-control @error('designation') is-invalid @enderror" id="designation"
                        placeholder="শিক্ষকের উপাধি লিখুন" value="{{ old('designation', $data->designation) }}">
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">মোবাইল-নং<span class="text-danger"> * </span></label>
                    <input type="text" name="phone" required class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="শিক্ষকের মোবাইল-নং লিখুন" value="{{ old('phone', $data->phone) }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="section">শাখা</label>
                    <select name="section" class="form-control" id="section">
                        <option value="day">দিবা</option>
                        <option value="morning">প্রভাত</option>
                        <option value="others">অন্যান্য</option>
                    </select>
                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">ছবি <span class="text-danger"> * </span> <small class="text-danger">( নির্বাচিত
                            ফাইলের আকার 2MB এর নিচে হতে হবে )</small> </label>
                    <div class="mb-2">
                        <img width="200" height="100" class="slider-img" src="{{ Storage::url($data->image) }}"
                            alt="">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="image">ছবি নির্বাচন করুন</label>
                    </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" id="image-preview">
                    <!-- Image previews will be displayed here -->
                </div>

                <div class="form-group">
                    <label for="lastDegree">সর্বশেষ ডিগ্রি<span class="text-danger"> * </span></label>
                    <input type="text" required name="lastDegree"
                        class="form-control @error('lastDegree') is-invalid @enderror" id="lastDegree"
                        placeholder="সর্বশেষ ডিগ্রি লিখুন" value="{{ old('lastDegree', $data->lastDegree) }}">
                    @error('lastDegree')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

                <button class="btn btn-primary" type="submit">আপডেট করুন</button>
                <a href="{{ route('teachers.index') }}" class="btn btn-danger">বাতিল করুন</a>
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
        document.querySelector('#image').addEventListener('change', function(e) {
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
