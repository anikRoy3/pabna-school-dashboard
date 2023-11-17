@extends('layouts.admin')

@section('title', 'পরিচালনা পর্ষদ ও শিক্ষকমন্ডলী')
@section('content-header', 'পরিচালনা পর্ষদ ও শিক্ষকমন্ডলীর তালিকা')
@section('content-actions')
    <a href="{{ route('directors.create') }}" class="btn btn-success">তৈরি করুন</a>
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
    {{-- @dd($data) --}}
    <div class="card slider-list">
        <div class="table-responsive card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="color: black">ছবি</th>
                        <th style="color: black">ক্যাটাগরি</th>
                        <th style="color: black">নাম</th>
                        <th style="color: black">ই-মেইল</th>
                        <th style="color: black">মোবাইল-নং</th>
                        <th style="color: black">পেশা</th>
                        <th style="color: black">জীবন বৃত্তান্ত</th>
                        <th style="color: black">বাণী </th>
                        <th style="color: black">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td><img width="100" height="100" class="slider-img" src="{{ Storage::url($item->image) }}"
                                    alt=""></td>
                            <td>
                                @switch($item->d_c_id)
                                    @case(1)
                                        গভর্নিং বডি
                                    @break
                                    @case(2)
                                        প্রাক্তন পর্ষদ
                                    @break

                                    @case(3)
                                        অনুষদ সদস্য
                                    @break

                                    @default
                                        অধ্যক্ষ
                                @endswitch
                            </td>
                            <td>{{ $item->name }}</td>

                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{!! $item->biodata !!}</td>
                            <td>{!! $item->speech !!}</td>
                            {{--   <td>{{ $item->is_top ? 'হ্যাঁ' : 'না' }}</td>
                            <td>{{ $item->notice }}</td>
                            <td>
                                <a href="{{ Storage::url($item->notice_pdf) }}" target="_blank">পিডিএফ দেখুন</a>
                            </td> --}}
                            {{--  <td>
                                <span
                                    class="p-2 mt-1 right badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                                </span>
                            </td> --}}

                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('directors.edit', $item) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i>
                                </a>
                                <button data-id="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete ml-1"
                                    data-url="{{ route('directors.destroy', $item) }}">
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
            <div class="mt-4 mr-4 d-flex justify-content-end align-items-center">
                {{-- {{ $data->render() }} --}}
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
                            confirmButton: 'btn btn-success me-3',
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
                                console.log(res);
                                $this.closest('tr').fadeOut(500, function() {
                                    $(this).remove();
                                });
                            })
                        }
                    });
                })
            })
        </script>
    @endsection
