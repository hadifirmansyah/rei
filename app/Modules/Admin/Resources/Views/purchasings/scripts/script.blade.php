@push('scripts')
<script>
    $(document).ready(function() {
        $("#pay").click(function(){ 
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.purchasings.pay') }}",
                data: { id : id }
            }).done(function(response){
                alert(response.meta.message)
                $('#pay').prop('disabled', true);
            }).error(function(xhr, ajaxOptions, thrownError) {
                alert('Oops! Something went wrong. Please try again.');
            })
        });
    });
</script>
@endpush