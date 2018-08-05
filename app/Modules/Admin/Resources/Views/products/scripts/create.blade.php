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

        $(".btn-success").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });

        $(document).on('change', '.input-images-product', function(){
            var index =  $(this).data('index');
            // console.log(index);
            // previewFileimg(this);
            // return false;
            
            var fileLogo = $(this).val().toLowerCase();
            var fileExtension = fileLogo.split('.').pop().toLowerCase();
            
            readURL(this, index);

            if(fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png'){
                $('.preview-image').show();
            }else{
                $('.preview-image').hide();
            }
        });

        $(document).on("click", "#add-logo", function () {
            if($("#place-add").val() == '3'){
                return false;
            }else{
                $("input[name='data_company_logo[]']").val('');
                var index = parseInt($("#place-add").val()) + 1;
                $("#place-add").val(index);
                var html =  '<div class="form-group company_logo">'
                                +'<label class="col-sm-2 control-label">'
                                    +''
                                +'</label>'
                                +'<div class="col-sm-9">'
                                    +'<input type="file" class="inputcompanylogo" name="company_logo[]" id="company_logo"> <br/>'
                                    +'<div class="col-sm-6" align="left" width="200" style="margin-left: -15px;">'
                                        +'<button type="button" id="add-logo" class="btn btn-xs plus">'
                                            +'<i class="fa fa-plus"></i>'
                                        +'</button> '
                                        +'<button type="button" id="clear" class="btn btn-xs image-preview-clear remove-logo">'
                                            +'<i class="fa fa-minus"></i>'
                                        +'</button>'
                                        +'<img class="previewcompanylogo img-responsive" width="150" height="100" src="" alt="Preview Company Logo" style="display:none;">'
                                    +'</div>'
                                +'</div>'
                            +'</div>';
                $(html).insertBefore($("#place-add"));
            }
        });


    });
    
    function readURL(input, index) {
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

                // VPcropremove.id = 'VPcropremove'+t;
                // input_image = document.createElement("input");
                // input_image.id = 'input-image-'+next;
                // input_image.className = input.className;
                // input_image.value = '';
                // input_image.name = input.name;
                // $('#image-group-'+index).append(input_image);
                
                remove_image = document.createElement('span');
                remove_image.className ='image-product-remove';
                remove_image.id = "image-product-remove-"+index;
                remove_image.innerHTML = 'x';
                remove_image.setAttribute('onclick','$("#image-group-'+index+'").remove()');
                // 
                $('#image-group-'+index).append(remove_image);                
                //
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
                // document.getElementById(x).remove();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewFileimg(input){
        var file = input.files[0];
        // var index = $(input).data('index');        
        if(file) {
            var reader  = new FileReader();

        console.log(reader);
        }
        // console.log(index);
        return false;
        reader.onload = function () {
            VPcropremove = document.getElementById(x).parentNode;
            groupcrop = VPcropremove.parentNode;
            //
            var t='t';
            VPcrimg = document.createElement('img');
            VPcrimg.className ='VPcimg';
            VPcrimg.src = "";
            VPcrimg.id ='VPcrimg'+t;
            VPcropremove.appendChild(VPcrimg);
            VPcrimg.src = reader.result;
            //
            VPcropremove.id = 'VPcropremove'+t;
            VPcropsw = document.createElement("input");
            VPcropsw.id= document.getElementById(x).id;
            VPcropsw.className = document.getElementById(x).className;
            VPcropsw.value = file.name;
            VPcropsw.name =document.getElementById(x).name;
            VPcropremove.appendChild(VPcropsw);
            //
            VPcropspan = document.createElement('span');
            VPcropspan.className ='VPcropspan';
            VPcropspan.id = "VPcropspan"+t;
            VPcropspan.innerHTML = 'x';
            VPcropspan.setAttribute('onclick',''+VPcropremove.id+'.remove()');
            VPcropremove.appendChild(VPcropspan);
            //
            VPcorpKt = document.createElement('div');
            VPcorpKt.className = 'image-preview';
            VPcorpKt.id = 'VPcorpKt'+t;
            groupcrop.appendChild(VPcorpKt);
            //
            VPcropint = document.createElement('input');
            VPcropint.className ='image-preview-int';
            VPcropint.name = '';
            VPcropint.type ='file';
            VPcropint.value='';
            VPcropint.id='image-preview-int'+t;
            VPcropint.accept =document.getElementById(x).accept;
            VPcropint.setAttribute('onchange','previewFileimg("'+VPcropint.id+'")');
            VPcorpKt.appendChild(VPcropint);
            document.getElementById(x).remove();
        }
        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
        } else {
            PoundNote('Thông Báo','Bạn chưa chọn hình ảnh',1);
        }
  }
</script>
@endpush