@extends('layouts.admin')

@section('title', 'ভর্তি- সংক্রান্ত আপডেট করুন')
@section('content-header', 'ভর্তি- সংক্রান্ত আপডেট করুন')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('admission.update', $data) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="show_sl">আপনি কত তম সিরিয়ালে দেখবেন ?</label>
                <input type="text" value="{{ old('show_sl', $data->show_sl) }}" required name="show_sl" class="form-control @error('show_sl') is-invalid @enderror" id="show_sl" placeholder="সিরিয়াল লিখুন" value="{{ old('show_sl') }}">
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
                <label for="notice_pdf">PDF <span class="text-danger">*</span></label>
                <input type="file" name="pdf_file" accept="application/pdf" class="form-control-file @error('notice_pdf') is-invalid @enderror" id="notice_pdf">
                @error('notice_pdf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
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