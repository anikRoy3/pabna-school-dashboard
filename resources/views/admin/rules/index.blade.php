@extends('layouts.admin')

@section('title', 'নিয়মকানুন')
@section('content-header', 'নিয়মকানুনের তালিকা')
@section('content-actions')
    <a href="{{ route('rules.create') }}" class="btn btn-success">তৈরি করুন</a>
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
                        <th style="color: black">id</th>
                        <th style="color: black">নিয়ম</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @if () --}}
                    @if ($data != null)    
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{!! $data->description !!}</td>


                        <td class="text-center d-flex justify-content-center align-items-center">
                            <a href="{{ route('rules.edit', $data) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i>
                            </a>
                            <button data-id="{{ $data->id }}" class="btn btn-danger btn-sm btn-delete ml-1"
                                data-url="{{ route('rules.destroy', $data) }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>

                    </tr>
                    @else
                    <tr>
                        <td colspan="5" class="text-center d-flex justify-content-center align-items-center">তথ্য
                            পাওয়া যাচ্ছে না!</td>
                    </tr>
                        
                    @endif
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
