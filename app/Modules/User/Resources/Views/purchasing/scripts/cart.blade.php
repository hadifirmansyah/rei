@push('scripts')
    <script>
        $(function() {
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
                    $('#total').text(total);
                    countCart();                    
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