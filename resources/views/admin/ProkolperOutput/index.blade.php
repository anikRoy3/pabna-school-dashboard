@extends('layouts.admin')

@section('title', 'প্রকল্পের আউটপুট তালিকা')
@section('content-header', 'প্রকল্পের আউটপুট তালিকা')
@section('content-actions')
    <a href="{{ route('prokolper_outputs.create') }}" class="btn btn-success">তৈরি করুন</a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="card slider-list">
        <div class="card-body table-responsive p-0"> <!-- Wrap table in a responsive container -->
            <table class="table">
                <thead>
                    <tr class="">

                        <th>প্রকল্পের আউটপুট বিবরণ</th>
                        <th>স্ট্যাটাস</th>
                        <th class="text-center">প্রক্রিয়া</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>

                            <td class="text-truncate" style="max-width: 200px;">{{ strip_tags(str_replace('&nbsp;', ' ', $item->prokolper_output_description)) }}</td>

                            <td>
                                <span
                                    class="p-3 right badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}</span>
                            </td>


                            <td class="text-center d-flex justify-content-center align-items-center">

                                <a href="{{ route('prokolper_outputs.edit', $item) }}"
                                    class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm btn-delete ml-1"
                                    data-url="{{ route('prokolper_outputs.destroy', $item) }}"><i
                                        class="fas fa-trash"></i></button>
                            </td>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center d-flex justify-content-center align-items-center">তথ্য
                                পাওয়া যাচ্ছে না!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 mr-4 d-flex justify-content-end align-items-center">
            {{ $data->render() }}
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
                    text: "আপনি কি সত্যিই এই সেবা মুছতে চান?",
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
            })
        })
    </script>
@endsection
