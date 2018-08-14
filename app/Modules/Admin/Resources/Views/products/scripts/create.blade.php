@push('scripts')
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProductRequest'); !!}

<script>
    
</script>
<script>
    $(document).ready(function() {
        
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
                    location.replace("{{ route('admin.products.index') }}");
                }).error(function(xhr, ajaxOptions, thrownError) {
                    $(this).find("input[type='submit']").prop('disabled', false);                    
                    alert('Oops! Something went wrong. Please try again.');
                })
            }
        });

        $(document).on('change', '.input-images-product', function(){
            var before = $(this).siblings('img').length
            var id = $(this).parent().data('id');
            if (id) {
                deletedImages(id);
                $(this).parent().removeAttr("data-id");
            }
            var index =  $(this).data('index');            
            var fileLogo = $(this).val().toLowerCase();
            var fileExtension = fileLogo.split('.').pop().toLowerCase();
            
            readURL(this, index, before);

            if(fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png'){
                $('.preview-image').show();
            }else{
                $('.preview-image').hide();
            }
        });

        $('.remove-before').click(function() {
            var index = $(this).parent().data('index')
            var id = $(this).parent().data('id')
            deletedImages(id);
            $('#image-group-'+index).remove();            
        })
    });

    function deletedImages(id) {
        $('<input>').attr({
            type: 'hidden',
            value: id,
            name: 'deleted_images[]'
        }).appendTo('#form-edit');
    }
    
    function readURL(input, index, before) {
        next = index + 1;        
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                // $('.preview-image').attr('src', e.target.result);
                image_display = document.createElement('img');
                image_display.className ='image-preview-display';
                image_display.src = "";
                image_display.id ='image-preview-display-'+index;
                
                $('#image-group-'+index).append(image_display);
                image_display.src = reader.result;
                
                remove_image = document.createElement('span');
                remove_image.className ='image-product-remove';
                remove_image.id = "image-product-remove-"+index;
                remove_image.innerHTML = 'x';
                remove_image.setAttribute('onclick','$("#image-group-'+index+'").remove()');
                // 
                $('#image-group-'+index).append(remove_image);                
                //
                if (before == 0) {
                    image_group = document.createElement('div');
                    image_group.className = 'image-preview';
                    image_group.id = 'image-group-'+next;
                    $('#image-group-preview').append(image_group);                
                    //
                    new_input = document.createElement('input');
                    new_input.className = input.className;
                    new_input.name = input.name;
                    new_input.type = input.type;
                    new_input.value='';
                    new_input.id='input-image-'+next;
                    new_input.accept = input.accept;
                    new_input.setAttribute('data-index', next);
                    image_group.appendChild(new_input);
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush