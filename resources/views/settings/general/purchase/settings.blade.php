
<div id="toolbar" style="padding: 4px; border: 1px solid #dfdfdf; border-radius: 3px"></div>
<style>
    .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .image-preview-input-title {
        margin-left: 2px;
    }

    .popover-content img {
        min-width: 200px;
        min-height: 150px;
        max-width: 250px;
        max-height: 250px;
    }

    .popover-title .close-preview {
        float: right;
        width: 25px;
        border: 0px;
        border-radius: 50%;
        height: 24px;
        line-height: normal;
        top: -4px;
        position: relative;
    }

    .purchase-form .com_info {
        display: flex;
        flex-wrap: wrap;
    }

    .purchase-form .com_info .col-sm-6 {
        display: flex;
    }

    .purchase-form .com_info .col-sm-6 .well {
        width: 100%;
    }

    .purchase-form .form-title {
        position: relative;
        font-size: 24px;
        line-height: 32px;
        font-weight: 400;
        color: #000;
        text-transform: uppercase;
        padding-bottom: 5px;
        padding-left: 10px;
        padding-right: 10px;
        margin-bottom: 15px;
        margin-left: 10px;
        margin-right: 10px;
        border-bottom: 1px solid rgb(204, 204, 204);

    }

    .purchase-form .form-title:after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0px;
        width: 80px;
        height: 1px;
        background: rgb(105, 88, 88);
    }

    .purchase-form .well {
        background: #f9f9f9;
        box-shadow: none;
        border: 0;
    }

    .timepicker, .ui-timepicker-list{text-transform: uppercase;letter-spacing: 1px;}

</style>
@if($purchase)
<form  method="post" id="purchase-form" class="purchase-form">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <h2 class="form-title">Purchase Information</h2>
        </div>
    </div>
    <div class="row com_info">
        <div class="col-sm-6">
            <!-- left side company information -->
            <div class="well form-horizontal">
                <div class="form-group">
                    <label class="col-md-4 control-label">Prefix Order</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            <input class="form-control" name="prefix_order" required="true" value="{{$purchase->prefix_order}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Sequence Number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" name="sequence_number" required="true" value="{{$purchase->sequence_number}}" type="email">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /left side company information ends -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2 class="form-title">Other Information</h2>
        </div>
        <div class="col-sm-12">
            <div class="well">
                <div class="form-group">
                    <label for="" class="control-label">Note</label>
                    <textarea class="form-control" name="remarks" id="editor">{{$purchase->remarks}}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Terms And Conditions </label>
                    <textarea class="form-control" name="terms_condition" id="editor2">{{$purchase->terms_condition}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="well">
                <div class="form-group">
                    <label for="" class="control-label">Header</label>
                    <textarea class="form-control" name="print_order_header" id="editor">{{$purchase->print_order_header}}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Footer</label>
                    <textarea class="form-control" name="print_order_footer" id="editor2">{{$purchase->print_order_footer}}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
<script type="text/javascript">
    $(function () {
        if(w2ui.hasOwnProperty('toolbar-purchase-settings')){
            w2ui['toolbar-purchase-settings'].destroy();
        }
        $('#toolbar').w2toolbar({
            name: 'toolbar-purchase-settings',
            items: [
                { type: 'button', id: 'save', text: 'Save', icon: 'fa fa-save' },
                { type: 'break' },
                { type: 'check', id: 'item3', text: 'Check 1', icon: 'fa-star' },
                { type: 'check', id: 'item4', text: 'Check 2', icon: 'fa-heart' },
                { type: 'break' },
                { type: 'radio', id: 'item5', group: '1', text: 'Radio 1', icon: 'fa-star', checked: true },
                { type: 'radio', id: 'item6', group: '1', text: 'Radio 2', icon: 'fa-heart' },
                { type: 'spacer' },
                { type: 'button', id: 'item7', text: 'Button', icon: 'fa-star' }
            ],
            onClick: function (event) {
                if(event.target === 'save'){
                    var data = new FormData($('#purchase-form')[0]);
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url:'/settings/general/purchase/update',
                        type:'post',
                        dataType:'json',
                        data:data,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            // setting a timeout
                            w2utils.lock($('#purchase-form'), 'Please Waite....', true);
                        },
                        success:function (data) {
                            if(data.status === 'success'){
                                w2utils.lock($('#purchase-form'), '<span class="fa fa-check "></span> Success.', false);
                                setTimeout(function () {
                                    w2utils.unlock($('#purchase-form'));
                                },1000);
                            }
                        },
                        error:function (xhr) {
                            if (xhr.status === 302){
                                var err = $.parseJSON(xhr.responseText);
                                console.log(err);
                            }
                            if (xhr.status === 422){
                                var err = $.parseJSON(xhr.responseText);
                                $.each(err.errors,function (k,v) {
                                    w2ui.layout.message({
                                        width   : 400,
                                        height  : 180,
                                        html    : '<div  style="padding: 60px; text-align: center">'+v[0]+'</div>'+
                                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.layout.message();">Close</button></div>'
                                    });
                                    return false;
                                });
                            }
                        }
                    });
                }
            }
        });
    });
    // company image and logo input
    $(document).on('click', '.close-preview', function () {
        var parent = $(this).parents('.image-preview');
        parent.find('.popover ').removeClass('in');
    });
    $(document).on('click', '.image-preview-filename', function () {
        // alert('asfd');
        var parent = $(this).parents('.image-preview');
        parent.find('.popover ').addClass('in');
    });
    $(function () {

        // Clear event
        $('.image-preview-clear').click(function () {
            var parent = $(this).parents('.image-preview');
            parent.find('.image-preview-filename').val("");
            parent.find('.image-preview-clear').hide();
            parent.find('.image-preview-input input:file').val("");
            parent.find(".image-preview-input-title").text("  Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var parent = $(this).parents('.image-preview');
            var img = parent.find('.popover-content img');
            // parent.find
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                parent.find(".image-preview-input-title").text("Change");
                parent.find(".image-preview-clear").show();
                parent.find(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                // $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>