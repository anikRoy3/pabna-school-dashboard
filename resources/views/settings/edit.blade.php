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
                {{-- @dd() --}}
                <div class="form-group">
                    <label for="school_name">স্কুলের নাম</label>
                    <input type="text" name="school_name" class="form-control @error('school_name') is-invalid @enderror"
                        id="school_name" placeholder="স্কুলের নাম"
                        value="{{ explode('/', Storage::url(App\Models\Setting::first()->school_name))[2] }}">
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
                        <img src="{{ Storage::url(App\Models\Setting::first()->school_logo) }}" style="height: 90px;"
                            alt="Logo" class="">
                    </div>
                    <div class="custom-file">
                        <input value="{{ @$setting->school_logo }}" type="file"
                            class="custom-file-input @error('school_logo') is-invalid @enderror" name="school_logo"
                            id="school_logo_input">
                        <label class="custom-file-label" for="school_logo">লোগো নির্বাচন করুন</label>
                    </div>

                    @error('school_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="EIIN_num">EIIN নং:</label>
                    <input type="number" name="EIIN_num" class="form-control @error('EIIN_num') is-invalid @enderror"
                        id="EIIN_num" placeholder="EIIN নং:" value="">
                    @error('EIIN_num')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="collegeCode">কলেজ কোড</label>
                    <input type="number" name="collegeCode" class="form-control @error('collegeCode') is-invalid @enderror"
                        id="collegeCode" placeholder="কলেজ কোড" value="">
                    @error('collegeCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="schoolCode">স্কুল কোড</label>
                    <input type="number" name="schoolCode" class="form-control @error('schoolCode') is-invalid @enderror"
                        id="schoolCode" placeholder="স্কুল কোড" value="">
                    @error('schoolCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_1">ইমেল আইডি</label>
                    <span id="plus_btn">Plus</span>
                    <span id="minius_btn" hidden>Minus</span>
                    <input type="email" name="email_1" class="form-control @error('email_1') is-invalid @enderror"
                        id="email_1" placeholder="ইমেল" value="">
                    @error('schoolCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input hidden type="email" name="email_2"
                        class="form-control mt-2 @error('email_2') is-invalid @enderror" id="email_2" placeholder="ইমেল"
                        value="">
                    @error('schoolCode')
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const plus_btn = $('#plus_btn');
            const minus_btn = $("#minius_btn");
            const email_2 = $("#email_2");
            const hasAttribute = minus_btn.attr("hidden");

            plus_btn.on('click', function() {
                plus_btn.attr('hidden', true);
                minus_btn.removeAttr('hidden');
                console.log(hasAttribute)
            });
            minus_btn.on('click', function() {
                minus_btn.attr('hidden', true);
                plus_btn.removeAttr('hidden');
           m, ./    
                // console.log(hasAttribute)
            });


        });
    </script>
@endsection
