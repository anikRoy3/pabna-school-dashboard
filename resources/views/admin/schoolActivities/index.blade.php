@extends('layouts.admin')

@section('title', 'স্কুল কার্যক্রমের তালিকা')
@section('content-header', 'স্কুল কার্যক্রমের তালিকা')
@section('content-actions')
    <a href="{{ route('schoolActivities.create') }}" class="btn btn-success">তৈরি করুন</a>
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
                        <th style="color: black">ক্যাটাগরি</th>
                        <th style="color: black">শিরোনাম</th>
                        <th style="color: black"> বিবরণ</th>
                        <th style="color: black">ছবি সমূহ</th>
                        <th style="color: black">স্ট্যাটাস</th>
                        <th style="color: black" class="text-center">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            {{-- <td>{{ bnNum($rank++) }}</td> --}}
                            {{-- <td>{{ $item->is_top ? 'হ্যাঁ' : 'না' }}</td> --}}
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->long_description !!}</td>
                            {{-- <td>
                                <a href="{{ Storage::url($item->notice_pdf) }}" target="_blank">পিডিএফ দেখুন</a>
                            </td> --}}
                            <td>
                                @foreach (json_decode($item->images) as $imagePath)
                                    <img width="200" height="100" class="slider-img"
                                        src="{{ Storage::url($imagePath) }}" alt="">
                                @endforeach
                            </td>
                            <td>
                                <span
                                    class="p-2 mt-1 right badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                                </span>
                            </td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('schoolActivities.edit', $item) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm btn-delete ml-1" data-id="{{$item->id}}"
                                    data-url="{{ route('schoolActivities.destroy', $item) }}">
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
        {{-- <div class="mt-4 mr-4 d-flex justify-content-end align-items-center">
            {{ $data->render() }}
        </div> --}}
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
                            _body:id
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
