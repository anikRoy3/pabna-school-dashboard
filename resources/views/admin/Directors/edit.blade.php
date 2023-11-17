@extends('layouts.admin')

@section('title', 'আপডেট করুন')
@section('content-header', 'আপডেট করুন')

@section('content')
    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <div class="card-body">
            {{-- @dd($categories[0]->id); --}}
            <form action="{{ route('directors.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="d_c_id">ক্যাটাগরি</label>
                    <input type="text" hidden name="d_c_id" value="{{ $data->d_c_id }}">
                    <p> @switch($data->d_c_id)
                            @case(1)
                                গভর্নিং বডি
                            @break

                            @case(2)
                                অধ্যক্ষ
                            @break

                            @case(3)
                                অনুষদ সদস্য
                            @break

                            @default
                                প্রাক্তন পর্ষদ
                        @endswitch
                    </p>

                </div>

                <div class="form-group">
                    <label for="name">নাম <span class="text-danger"> * </span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="নাম লিখুন" value="{{ old('name', $data->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">ই-মেইল <span class="text-danger"> * </span></label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="ই-মেইল লিখুন" value="{{ old('email', $data->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="designation">উপাধি<span class="text-danger"> * </span></label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                        id="designation" placeholder="উপাধি লিখুন" value="{{ old('designation', $data->designation) }}">
                    @error('designation')
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
                <div class="form-group">
                    <label for="phone">মোবাইল-নং <span class="text-danger"> * </span></label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="মোবাইল নং লিখুন" value="{{ old('phone', $data->phone) }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- @dd($data) --}}
                <div class="form-group" id="biodata">
                    <label for="biodata">জীবন বৃত্তান্ত</label>
                    <textarea name="biodata" id="editorBio" class="form-control @error('biodata') is-invalid @enderror">{{ old('biodata', $data->biodata) }}</textarea>
                    @error('biodata')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editorBio'))
                        .then(editor => {
                            // Set the content of CKEditor from old input or session
                            editor.setData("{!! old('biodata', $data->biodata) !!}");
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
                <div class="form-group" id="speech">
                    <label for="speech">বাণী </label>
                    <textarea name="speech" id="editor2Bio" class="form-control @error('speech') is-invalid @enderror">{{ old('speech', $data->speech) }}</textarea>
                    @error('speech')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor2Bio'))
                        .then(editor => {
                            editor.setData("{!! old('speech', $data->speech) !!}");
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>



                {{--  <div class="form-group">
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
                </div> --}}
                <button class="btn btn-primary" type="submit">আপডেট করুন</button>
                <a href="{{ route('directors.index') }}" class="btn btn-danger">বাতিল করুন</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

@endsection
