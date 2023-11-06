@extends('layouts.admin')

@section('title', 'নোটিশ তৈরি করুন')
@section('content-header', 'নোটিশ তৈরি করুন')

@section('content')
    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <div class="card-body">
            {{-- @dd($categories[0]->id); --}}
            <form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="d_c_id">ক্যাটাগরি</label>
                    <select name="d_c_id" class="form-control @error('d_c_id') is-invalid @enderror" id="d_c_id">
                        @foreach ($categories as $d_c_id)
                            <option value="{{ $d_c_id->id  +0}}">
                                {{ $d_c_id->name }}</option>
                        @endforeach
                    </select>
                    @error('d_c_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">নাম <span class="text-danger"> * </span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="নাম লিখুন" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">ই-মেইল <span class="text-danger"> * </span></label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="ই-মেইল লিখুন" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="designation">উপাধি<span class="text-danger"> * </span></label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                        id="designation" placeholder="উপাধি লিখুন" value="{{ old('designation') }}">
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" style="display: none" id="subject">
                    <label for="subject">বিষয়<span class="text-danger"> * </span></label>
                    <input type="text" name="subject" class="form-control  @error('subject') is-invalid @enderror"
                        id="subject" placeholder="বিষয় লিখুন" value="{{ old('subject') }}">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">মোবাইল-নং <span class="text-danger"> * </span></label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="মোবাইল নং লিখুন" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">ছবি <span class="text-danger"> * </span> <small class="text-danger">( নির্বাচিত
                            ফাইলের আকার 2MB এর নিচে হতে হবে )</small> </label>
                    <div class="custom-file">
                        <input type="file" required class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="image">ছবি নির্বাচন করুন</label>
                    </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" id="biodata">
                    <label for="biodata">জীবন বৃত্তান্ত</label>
                    <textarea name="biodata" id="editor" class="form-control @error('biodata') is-invalid @enderror">{{ old('biodata') }}</textarea>
                    @error('biodata')
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
                            editor.setData("{!! old('biodata') !!}");
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
                <div class="form-group" id="speech">
                    <label for="speech">বাণী </label>
                    <textarea name="speech" id="editor2" class="form-control @error('speech') is-invalid @enderror">{{ old('speech') }}</textarea>
                    @error('speech')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor2'))
                        .then(editor => {
                            editor.setData("{!! old('speech') !!}");
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
                <a href="{{ route('notices.index') }}" class="btn btn-danger">বাতিল করুন</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            const bioData = $("#biodata");
            const speech = $("#speech");
            const subject = $("#subject");
            $('#d_c_id').on('change', function() {
                const selectedCategory = $(this).val();
                console.log(selectedCategory)
                if (selectedCategory == 3) {
                    bioData.hide();
                    speech.hide();
                    subject.show();
                }else{
                    bioData.show();
                    speech.show();
                    subject.hide()
                }
            });
        });
    </script>
@endsection
