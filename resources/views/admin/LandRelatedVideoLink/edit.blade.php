@extends('layouts.admin')

@section('title', 'ভিডিও-লিংক সম্পাদনা করুন')
@section('content-header', 'ভিডিও-লিংক সম্পাদনা করুন')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('land-related-video-links.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="show_sl">আপনি কত তম সিরিয়ালে দেখবেন ?</label>
                    <input type="text" name="show_sl" class="form-control @error('show_sl') is-invalid @enderror"
                        id="show_sl" placeholder="সিরিয়াল লিখুন" value="{{ old('show_sl', $data->show_sl) }}">
                    @error('show_sl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                    <label for="link">ইউটিউব ভিডিও লিঙ্ক <span class="text-danger"> * </span></label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                        id="link" placeholder="ইউটিউব ভিডিও লিঙ্ক লিখুন" value="{{ old('link', $data->link) }}">
                    @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">স্ট্যাটাস</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ old('status', $data->status) === 1 ? 'selected' : '' }}>সক্রিয়</option>
                        <option value="0" {{ old('status', $data->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয়
                        </option>
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
