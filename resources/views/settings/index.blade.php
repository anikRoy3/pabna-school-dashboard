@extends('layouts.admin')

@section('title', 'সেটিংস এর তথ্যসমূহ')
@section('content-header', 'সেটিংস এর তথ্যসমূহ')
@section('content-actions')
    <a href="{{ route('settings.create') }}" class="btn btn-success">তৈরি করুন</a>
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
                    <tr style="color: black">
                        <th>স্কুলের নাম</th>
                        <th>স্কুলের লোগো </th>
                        <th>EIIN নং:</th>
                        <th>কলেজ কোড</th>
                        <th>স্কুল কোড</th>
                        <th>মোবাইল-নং </th>
                        <th>ইমেল আইডি </th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                {{-- @dd($data)  --}}
                <tbody>
                    @if ($data != null)
                        <tr>
                            <td>{{ $data->school_name }}</td>
                            <td>
                                <img width="100" height="100" class="slider-img"
                                    src="{{ Storage::url($data->school_logo) }}" alt="">
                            </td>
                            <td>{{ $data->EIIN_no }}</td>
                            <td>{{ $data->college_code }}</td>
                            <td>{{ $data->school_code }}</td>
                            <td>
                                <ul>

                                    @forelse (json_decode($data->mobile_numbers) as $item)
                                        <li>{{ $item }}</li>
                                    @empty
                                        <li>No mobile numbers available</li>
                                    @endforelse

                                </ul>
                            </td>
                            <td>
                                <ul>

                                    @forelse (json_decode($data->emails) as $item)
                                        <li>{{ $item }}</li>
                                    @empty
                                        <li>No mobile numbers available</li>
                                    @endforelse

                                </ul>
                            </td>

                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('settings.edit', $data) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i>
                                </a>
                            </td>

                        </tr>
                    @else
                        <tr>
                            <td colspan="5" class="text-center d-flex justify-content-center align-items-center">তথ্য
                                পাওয়া যাচ্ছে না!
                            </td>
                        </tr>
                    @endif

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
                        const id = $this.data('id')
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
