@extends('layouts.admin')

@section('title', 'ক্যাটাগরির তালিকা')
@section('content-header', 'ক্যাটাগরির তালিকা')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
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

        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <th>সিরিয়াল</th>
                        <th>ক্যাটাগরির নাম</th>
                        <th class="text-center">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>

                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ route('directors_categories.edit', $item) }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center d-flex justify-content-center align-items-center">Data is
                                not found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- <div class="mt-4 mr-4 d-flex justify-content-end align-items-center">
            {{ $data->render() }}
        </div> --}}
        {{-- </div> --}}
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
                    text: "আপনি কি সত্যিই এই স্লাইডারটি মুছতে চান?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'হ্যাঁ, মুছে ফেলুন !',
                    cancelButtonText: 'না',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                });
            });
        });
    </script>
@endsection
