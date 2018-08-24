@push('scripts')
<script>
    $(document).ready(function() {
        $("#print").click(function(){ 
            month = $('#month').val();
            url = "{!! route('admin.purchasings.print', ['month' => ':month']) !!}";
            url = url.replace(':month', month);
            window.open(url, "_blank");
        });
    });
</script>
@endpush