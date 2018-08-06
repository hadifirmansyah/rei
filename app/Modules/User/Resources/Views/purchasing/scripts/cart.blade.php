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
            $('a.remove').click(function(event){
                event.preventDefault();
                _this = $(this)
                var price = _this.parent().prev().find('.fix-price').data('price');               
                $.ajax({
                    type: "GET",
                    url: $(this).attr('href'),
                }).done(function(response){
                    var tempTotal = parseInt($('#total').text());
                    var total = tempTotal - price;
                    $('#total').text(total)
                    _this.parent().parent().parent().hide( 400 );
                }).error(function(xhr, ajaxOptions, thrownError) {
                    alert('Oops! Something went wrong. Please try again.');
                })
            })

            // Just for testing, show all items
            $('a.btn.continue').click(function(){
                $('li.items').show(400);
            })
        });

    </script>
@endpush