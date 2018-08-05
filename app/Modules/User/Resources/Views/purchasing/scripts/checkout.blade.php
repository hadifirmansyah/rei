@push('scripts')

	<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
    
    <script>
        $(function() {
            $("#province_id, #city_id, #sub_district_id").select2({
                placeholder: "Select Here",
                allowClear: true
            });

            $("#province_id").on('change',function() {
                $('#city_id')
                    .find('option')
                    .remove()
                    .end()
                $('#city_id').val('');
                getCities($(this).val());
            });

            $("#city_id").on('change',function() {
                $('#sub_district_id')
                    .find('option')
                    .remove()
                    .end()
                $('#sub_district_id').val('');
                getSubDistricts($(this).val());
            });

            $("#sub_district_id").on('change',function() {
                var charges = $("option:selected", this).data('charges');
                $('#charges').val(charges);
            });
        });

        function getCities(province_id)
        {
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.places.cities.find') }}",
                data: { id : province_id }
            }).done(function(response){
                $('#city_id').append($("<option></option>")
                        .attr("value",'')
                        .text('Choose Option')); 
                $.each(response, function(key, value) {   
                    $('#city_id').append($("<option></option>")
                        .attr("value",value.id)
                        .text(value.name)); 
                });                   
            }).error(function(xhr, ajaxOptions, thrownError) {
                alert('Oops! Something went wrong. Please try again.');
            })
        }

        function getSubDistricts(city_id)
        {
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.places.sub_districts.find') }}",
                data: { id : city_id }
            }).done(function(response){
                $('#sub_district_id').append($("<option></option>")
                        .attr("value",'')
                        .text('Choose Option')); 
                $.each(response, function(key, value) {   
                    $('#sub_district_id').append($("<option></option>")
                        .attr("data-charges",value.charges)                    
                        .attr("value",value.id)
                        .text(value.name)); 
                });                   
            }).error(function(xhr, ajaxOptions, thrownError) {
                alert('Oops! Something went wrong. Please try again.');
            })
        }
    </script>
@endpush