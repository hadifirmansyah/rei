@push('scripts')
    <script>
        $(function() {
            $(".cart-form").submit(function(event) {
                event.preventDefault();
                if(true){
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
                        console.log(response.meta.message);
                        countCart()
                    }).error(function(xhr, ajaxOptions, thrownError) {
                        // $(this).find("input[type='submit']").prop('disabled', false);                    
                        alert('Oops! Something went wrong. Please try again.');
                    })
                }
            });
            // Remove Items From Cart
            $('a.remove').click(function(){
                event.preventDefault();
                $( this ).parent().parent().parent().hide( 400 );
            })

            // Just for testing, show all items
            $('a.btn.continue').click(function(){
                $('li.items').show(400);
            })
        });

    </script>
@endpush