@extends('layouts.admin')

@section('title', 'পরীক্ষা ও পরীক্ষার  আপডেট করুন ')
@section('content-header', 'পরীক্ষা ও পরীক্ষার  আপডেট করুন ')

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('coCurricular.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exam_name">পরীক্ষার নাম <span class="text-danger"> * </span></label>
                    <input type="text" name="exam_name" class="form-control @error('exam_name') is-invalid @enderror"
                        id="exam_name" placeholder="পরীক্ষার নাম লিখুন" value="{{ old('exam_name', $data->exam_name) }}">
                    @error('exam_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exam_year">পরীক্ষার সাল <span class="text-danger"> * </span></label>
                    <input type="number" name="exam_year" class="form-control @error('exam_year') is-invalid @enderror"
                        id="exam_year" placeholder="পরীক্ষার সাল লিখুন" value="{{ old('exam_year', $data->exam_year) }}">
                    @error('exam_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_candidates">পরীক্ষার্থীদের সংখ্যা<span class="text-danger"> * </span></label>
                    <input type="number" name="total_candidates" class="form-control @error('total_candidates') is-invalid @enderror"
                        id="total_candidates" placeholder="পরীক্ষার্থীদের সংখ্যা লিখুন" value="{{ old('total_candidates', $data->total_candidates) }}">
                    @error('total_candidates')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="attended_candidates">পরীক্ষার্থীদের উপস্থিতি<span class="text-danger"> * </span></label>
                    <input type="number" name="attended_candidates" class="form-control @error('attended_candidates') is-invalid @enderror"
                        id="attended_candidates" placeholder="উপস্থিতি সংখ্যা লিখুন" value="{{ old('attended_candidates', $data->attended_candidates) }}">
                    @error('attended_candidates')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="a_plus_holder">এ+ প্রাপ্ত পরীক্ষার্থীর সংখ্যা<span class="text-danger"> * </span></label>
                    <input type="number" name="a_plus_holder" class="form-control @error('a_plus_holder') is-invalid @enderror"
                        id="a_plus_holder" placeholder="এ+ প্রাপ্ত সংখ্যা লিখুন" value="{{ old('a_plus_holder', $data->a_plus_holder) }}">
                    @error('a_plus_holder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_pass">মোট পাস<span class="text-danger"> * </span></label>
                    <input type="number" name="total_pass" class="form-control @error('total_pass') is-invalid @enderror"
                        id="total_pass" placeholder="মোট পাস এর সংখ্যা" value="{{ old('total_pass', $data->total_pass) }}">
                    @error('total_pass')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pass_rate">পাসের হার<span class="text-danger"> * </span></label>
                    <input type="number" name="pass_rate" class="form-control @error('pass_rate') is-invalid @enderror"
                        id="pass_rate" placeholder="মোট পাসের হার" value="{{ old('pass_rate', $data->pass_rate) }}">
                    @error('pass_rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <button class="btn btn-primary" type="submit">তৈরি করুন</button>
                <a href="{{ route('coCurricular.index') }}" class="btn btn-danger">বাতিল করুন</a>
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
