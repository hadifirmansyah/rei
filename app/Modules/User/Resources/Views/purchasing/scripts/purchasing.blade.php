@push('scripts')
    <script>
        $(function() {
            $(".cart-form").submit(function(event) {
                event.preventDefault();
                if('{{ user() }}'){
                    _this = $(this)
                    $(_this).find("input[type='submit']").prop('disabled', true);
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: new FormData($(this)[0]),
                        processData: false, 
                        contentType: false,
                    }).done(function(response){
                        $(_this).find("input[type='submit']").prop('disabled', false);                    
                        countCart()
                    }).error(function(xhr, ajaxOptions, thrownError) {
                        $(_this).find("input[type='submit']").prop('disabled', false);                    
                        alert('Oops! Something went wrong. Please try again.');
                    })
                } else {
                    swal("Oops!", "You need to Login to purchase!", "error");
                }
            });
        });

    </script>
@endpush