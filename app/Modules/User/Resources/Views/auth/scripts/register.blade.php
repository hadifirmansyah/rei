@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Front\UserRequest'); !!}

    <script>
        $("form").submit(function(event) {
            event.preventDefault();
            if($(this).valid()){
                $(this).find("input[type='submit']").prop('disabled', true);
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData($(this)[0]),
                    processData: false, 
                    contentType: false,
                }).done(function(response){
                    location.replace("{{ route('home') }}");
                }).error(function(xhr, ajaxOptions, thrownError) {
                    $(this).find("input[type='submit']").prop('disabled', false);                    
                    alert('Oops! Something went wrong. Please try again.');
                })
            }
        });
    </script>
@endpush