@extends('layouts.admin')

@section('title', 'সেটিংস আপডেট করুন')
@section('content-header', 'সেটিংস আপডেট করুন')

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
            <form action="{{ route('settings.update', $data) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="school_name">স্কুলের নাম</label>
                    <input type="text" name="school_name" class="form-control @error('school_name') is-invalid @enderror"
                        id="school_name" placeholder="স্কুলের নাম"
                        value="{{old('school_name', $data->school_name)}}">
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
                    <input type="number" name="EIIN_no" class="form-control @error('EIIN_num') is-invalid @enderror"
                        id="EIIN_num" placeholder="EIIN নং:" value="{{old('EIIN_num', $data->EIIN_no)}}">
                    @error('EIIN_num')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="college_code">কলেজ কোড</label>
                    <input type="number" name="college_code" class="form-control @error('college_code') is-invalid @enderror"
                        id="college_code" placeholder="কলেজ কোড" value="{{old('college_code', $data->college_code)}}">
                    @error('college_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="school_code">স্কুল কোড</label>
                    <input type="number" name="school_code" class="form-control @error('school_code') is-invalid @enderror"
                        id="school_code" placeholder="স্কুল কোড" value="{{old('school_code', $data->school_code)}}">
                    @error('school_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_1">ইমেল আইডি</label>
                    <span id="e_plus_btn" onclick="toggleEmailField(true)"><i class="fas fa-plus"></i>
                    </span>
                    <span id="e_minus_btn" onclick="toggleEmailField(false)" style="display: none;"><i class="fas fa-minus"></i>
                    </span>
                    {{-- @dd(json_decode($data->emails)[0])  --}}
                    <input type="email" value="{{old('email_1', json_decode($data->emails)[0])}}" name="email_1" class="form-control @error('email_1') is-invalid @enderror" id="email_1" placeholder="ইমেল" value="">
                    @error('email_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input hidden type="email" name="email_2" class="form-control mt-2 @error('email_2') is-invalid @enderror" id="email_2" placeholder="ইমেল" value="{{old('email_2', count(json_decode($data->emails)) > 1 ? json_decode($data->emails)[1] : '')}}">
                    @error('email_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mobile_1">মোবাইল-নং</label>
                    <span id="m_plus_btn" onclick="toggleMobileField(true)"><i class="fas fa-plus"></i>
                    </span>
                    <span id="m_minus_btn" onclick="toggleMobileField(false)" style="display: none;"><i class="fas fa-minus"></i>
                    </span>
                    <input type="text" value="{{old('mobile_number_1', json_decode($data->mobile_numbers)[0])}}" name="mobile_number_1" class="form-control @error('mobile_1') is-invalid @enderror" id="mobile_1" placeholder="ইমেল" value="">
                    @error('mobile_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input hidden type="text" name="mobile_number_2" class="form-control mt-2 @error('mobile_2') is-invalid @enderror" id="mobile_2" placeholder="ইমেল" value="{{old('mobile_number_2', count(json_decode($data->mobile_numbers)) > 1 ? json_decode($data->mobile_numbers)[1] : '')}}">
                    @error('mobile_2')
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
        function toggleEmailField(show) {
            var email2Field = document.getElementById('email_2');
            var e_plusBtn = document.getElementById('e_plus_btn');
            var e_minusBtn = document.getElementById('e_minus_btn');
    
            if (show) {
                email2Field.removeAttribute('hidden');
                e_plusBtn.style.display = 'none';
                e_minusBtn.style.display = 'inline';
            } else {
                email2Field.setAttribute('hidden', 'true');
                e_plusBtn.style.display = 'inline';
                e_minusBtn.style.display = 'none';
            }
        }
    </script>
    <script>
        function toggleMobileField(show) {
            var mobile_2_field = document.getElementById('mobile_2');
            var plusBtn = document.getElementById('m_plus_btn');
            var minusBtn = document.getElementById('m_minus_btn');
    
            if (show) {
                mobile_2_field.removeAttribute('hidden');
                plusBtn.style.display = 'none';
                minusBtn.style.display = 'inline';
            } else {
                mobile_2_field.setAttribute('hidden', 'true');
                plusBtn.style.display = 'inline';
                minusBtn.style.display = 'none';
            }
        }
    </script>
@endsection
