@extends('layouts.admin')

@section('title', 'প্রশ্নাবলী সম্পাদনা করুন')
@section('content-header', 'প্রশ্নাবলী সম্পাদনা করুন')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('faqs.update', $data) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="show_sl">আপনি কত তম সিরিয়ালে দেখবেন ?</label>
                    <input type="text" name="show_sl" class="form-control @error('show_sl') is-invalid @enderror"
                        id="show_sl" placeholder="Show Serial" value="{{ old('show_sl', $data->show_sl) }}">
                    @error('show_sl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="question">প্রশ্ন <span class="text-danger"> * </span></label>
                    <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                        id="question" placeholder="প্রশ্ন লিখুন" value="{{ old('question', $data->question) }}">
                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="answer">উত্তর <span class="text-danger"> * </span></label>
                    <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="answer" rows="4"
                        placeholder="উত্তর লিখুন">{{ old('answer', $data->answer) }}</textarea>
                    @error('answer')
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
