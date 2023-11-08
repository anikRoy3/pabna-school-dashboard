@extends('layouts.admin')

@section('title', 'পরীক্ষা ও পরীক্ষার ফলাফল')
@section('content-header', 'পরীক্ষা ও পরীক্ষার ফলাফল ')
@section('content-actions')
    <a href="{{ route('coCurricular.create') }}" class="btn btn-success">তৈরি করুন</a>
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
        <div class="table-responsive card-body p-0"> 
            <table class="table">
                <thead>
                    <tr style="color: black">
                        <th>আইডি</th>
                        <th>পরীক্ষার নাম</th>
                        <th>সাল</th>
                        <th>পরীক্ষার্থীদের সংখ্যা</th>
                        <th>পরীক্ষার্থীদের উপস্থিতি</th>
                        <th>এ+</th>
                        <th>মোট পাস</th>
                        <th>পাসের %</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ strtoupper($item->exam_name) }}</td>
                            <td>{{ $item->exam_year }}</td>
                            <td>{{ $item->total_candidates }}</td>
                            <td>{{ $item->attended_candidates }}</td>
                            <td>{{ $item->a_plus_holder }}</td>
                            <td>{{ $item->total_pass }}</td>
                            <td>{{ $item->pass_rate }}</td>

                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('coCurricular.edit', $item) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i>
                                </a>
                                <button data-id="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete ml-1"
                                    data-url="{{ route('coCurricular.destroy', $item) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center d-flex justify-content-center align-items-center">তথ্য
                                পাওয়া যাচ্ছে না!
                            </td>
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
