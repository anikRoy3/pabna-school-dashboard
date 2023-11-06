@extends('layouts.admin')

@section('title', 'সেটিংস হালনাগাদ করুন')
@section('content-header', 'সেটিংস হালনাগাদ করুন')

@section('css')

    <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');

        body {
            font-family: 'Kalpurush', Arial, sans-serif !important;
        }
    </style>

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="school_name">স্কুলের নাম</label>
                    <input type="text" name="school_name" class="form-control @error('school_name') is-invalid @enderror"
                        id="school_name" placeholder="স্কুলের নাম" value="{{ @$setting->school_name }}">
                    @error('school_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div>
                        <label for="school_logo">লোগো <span class="text-danger"><small class="text-danger font-sm">(
                                    নির্বাচিত ফাইলের আকার 2MB এর নিচে হতে হবে )</small></span> </label>
                    </div>
                    <div class="p-2 ">
                        <img src="{{ asset(Storage::url(@$setting->school_logo)) }}" style="height: 90px;" alt="Logo" class="">
                    </div>
                    <div class="custom-file">
                        <input value="{{@$setting->school_logo}}" type="file" class="custom-file-input @error('school_logo') is-invalid @enderror"
                            name="school_logo" id="school_logo_input">
                        <label class="custom-file-label" for="school_logo">লোগো নির্বাচন করুন</label>
                    </div>

                    @error('school_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">হালনাগাদ করুন</button>
            </form>
        </div>
    </div>
@endsection



{{-- <div class="form-group">
                <label for="application_slider_limit">অ্যাপ্লিকেশন এর টাইটেল</label>
                <input type="text" name="application_title" class="form-control @error('application_title') is-invalid @enderror" id="application_title" placeholder="অ্যাপ্লিকেশন স্লোগান" value="{{ @$setting->application_title }}">
                @error('application_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}

{{--     <div class="form-group">
                <label for="application_slider_limit">অ্যাপ্লিকেশন স্লাইডার সীমাবদ্ধতা</label>
                <input type="number" name="application_slider_limit" class="form-control @error('application_slider_limit') is-invalid @enderror" id="application_slider_limit" placeholder="অ্যাপ্লিকেশন স্লাইডার সীমাবদ্ধতা" value="{{ @$setting->application_slider_limit }}">
                @error('application_slider_limit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="application_main_menu_limit">অ্যাপ্লিকেশন মেনু সীমাবদ্ধতা</label>
                <input type="number" name="application_main_menu_limit" class="form-control @error('application_main_menu_limit') is-invalid @enderror" id="application_main_menu_limit" placeholder="অ্যাপ্লিকেশন মেনু সীমাবদ্ধতা" value="{{ @$setting->application_main_menu_limit }}">
                @error('application_main_menu_limit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
