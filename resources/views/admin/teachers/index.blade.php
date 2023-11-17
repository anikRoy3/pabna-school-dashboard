@extends('layouts.admin')

@section('title', 'আমাদের শিক্ষকমন্ডলীর তালিকা')
@section('content-header', 'আমাদের শিক্ষকমন্ডলীর তালিকা ')
@section('content-actions')
    <a href="{{ route('teachers.create') }}" class="btn btn-success">তৈরি করুন</a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

    <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');

        @media (max-width: 576px) {
            .table-responsive {
                overflow-x: auto;
            }
        }

        body {
            font-family: 'Kalpurush', Arial, sans-serif !important;
        }

        .badge-success {
            color: black;
        }

        .badge-danger {
            color: black;
        }
    </style>
@endsection
@section('content')


    <div class="card slider-list">
        <div class="table-responsive card-body p-0"> <!-- Wrap table in a responsive container -->
            <table class="table">
                <thead>
                    <tr class="">
                        <th style="color: black">আইডি</th>
                        <th style="color: black">শিক্ষকের নাম</th>
                        <th style="color: black">ই-মেইল</th>
                        <th style="color: black">উপাধি </th>
                        <th style="color: black">মোবাইল-নং </th>
                        <th style="color: black">শাখা</th>
                        <th style="color: black">ছবি</th>
                        <th style="color: black">সর্বশেষ ডিগ্রি</th>
                        <th style="color: black">স্ট্যাটাস</th>
                        <th style="color: black" class="text-center">অ্যাকশন</th>
                    </tr>
                </thead>
                {{-- @dd($data) --}}
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->section }}</td>
                            <td>
                                <img width="100" height="100" class="slider-img" src="{{ Storage::url($item->image) }}"
                                    alt="">
                            </td>
                            <td>{{ $item->lastDegree }}</td>
                            <td>
                                <span
                                    class="p-2 mt-1 right badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                                </span>
                            </td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('teachers.edit', $item) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm btn-delete ml-1" data-id="{{ $item->id }}"
                                    data-url="{{ route('teachers.destroy', $item) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center d-flex justify-content-center align-items-center">তথ্য
                                পাওয়া যাচ্ছে না!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: 'আপনি কি নিশ্চিত?',
                    text: "আপনি কি সত্যিই এই বিজ্ঞপ্তিটি মুছতে চান?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'হ্যাঁ, এটা মুছে ফেলুন!',
                    cancelButtonText: 'না',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        const id = $this.data('id');
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}',
                            _body: id
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                });
            })
        })
    </script>
@endsection
