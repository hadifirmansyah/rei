@push('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ProvinceRequest'); !!}

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
                    location.replace("{{ route('admin.places.provinces.index') }}");
                }).error(function(xhr, ajaxOptions, thrownError) {
                    $(this).find("input[type='submit']").prop('disabled', false);                    
                    alert('Oops! Something went wrong. Please try again.');
                })
            }
        });
    </script>
@endpush