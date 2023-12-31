@extends('layouts.admin')

@section('title', 'স্কুল কার্যক্রম আপডেট করুন')
@section('content-header', 'স্কুল কার্যক্রম আপডেট করুন')

@section('content')

    <div class="card">
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

        <div class="card-body">
            <form action="{{ route('schoolActivities.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">ক্যাটাগরি</label>
                    <p>{{ $data->category }}</p>
                    <input type="text" hidden name="category" value="{{ $data->category }}">
                </div>
                @if ($data->category != 'অনুষ্ঠান ও কর্মসূচি')
                    <div class="form-group" id="long_description">
                        <label for="long_description">বিবরণ</label>
                        <textarea name="long_description" id="editor" class="form-control @error('long_description') is-invalid @enderror">{!! old('long_description', $data->long_description) !!}</textarea>
                        @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @else
                @endif
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                <div class="form-group">
                    <label for="title">শিরোনাম <span class="text-danger"> * </span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="title" placeholder="শিরোনাম লিখুন" value="{{ old('title', $data->title) }}">
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
                        <input type="file" class="custom-file-input" name="images[]" id="image" multiple>
                        <label class="custom-file-label" for="image" id="image-label">ছবি নির্বাচন করুন</label>
                    </div>
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    @foreach (json_decode($data->images) as $imagePath)
                        <img width="200" height="100" class="slider-img" src="{{ Storage::url($imagePath) }}"
                            alt="">
                    @endforeach
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

                <button class="btn btn-primary" type="submit">আপডেট  করুন</button>
                <a href="{{ route('schoolActivities.index') }}" class="btn btn-danger">বাতিল করুন</a>
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

    <script>
        $(document).ready(function() {
            const category = $("#category");
            const long_description = $("#long_description")
            $('#category').on('change', function() {
                const selectedCategory = $(this).val();
                console.log(selectedCategory)
                if (selectedCategory === 'অনুষ্ঠান ও কর্মসূচি') {
                    long_description.hide();

                } else {
                    long_description.show();
                }
            });
        });
    </script>
@endsection
