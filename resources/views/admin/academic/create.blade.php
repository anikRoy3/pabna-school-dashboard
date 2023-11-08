@extends('layouts.admin')

@section('title', 'শিক্ষা কার্যক্রম তৈরি করুন')
@section('content-header', 'শিক্ষা কার্যক্রম তৈরি করুন')

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('academic.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="show_sl">আপনি কত তম সিরিয়ালে দেখবেন ?</label>
                    <input type="text" name="show_sl" class="form-control @error('show_sl') is-invalid @enderror"
                        id="show_sl" placeholder="সিরিয়াল লিখুন" value="{{ old('show_sl') }}">
                    @error('show_sl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                    <label for="pdf_file">পিডিএফ ফাইল <span class="text-danger"> * </span> <small class="text-danger">( নির্বাচিত
                            ফাইলের আকার 2MB এর নিচে হতে হবে )</small> </label>
                    <div class="custom-file">
                        <input type="file" required accept=".pdf" class="custom-file-input" name="pdf_filee" id="pdf_file">
                        <label class="custom-file-label" for="pdf_file">পিডিএফ ফাইল নির্বাচন করুন</label>
                    </div>
                    @error('pdf_file')
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

                <button class="btn btn-primary" type="submit">তৈরি করুন</button>
                <a href="{{ route('academic.index') }}" class="btn btn-danger">বাতিল করুন</a>
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
        //  $(document).ready(function() {
        //     //  const input = document.getElementById('pdf_file');
        //     //  const label = document.getElementById('pdf_file_label');
        //     //  const fileName = input.files[0].name;
        //      console.log('fileName', fileName)
        //     //  label.innerText = fileName;
        // });
        // function updateFileNameLabel() {
        // }zz
    </script>
@endsection
