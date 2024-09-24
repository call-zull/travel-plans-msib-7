@push('scripts')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        $(document).on("click", "[data-sweetalert-delete]", function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var title = $(this).data('title');
            var text = $(this).data('text');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: csrf_token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Successfully",
                                text: data.message,
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            var error = data.responseJSON;
                            console.log(error.error);
                            Swal.fire({
                                title: "Failed",
                                text: error.message,
                                icon: "error"
                            });
                        }
                    })
                }
            });
        });
    </script>
@endpush
