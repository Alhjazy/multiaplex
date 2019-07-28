
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

    .company-form .com_info {
        display: flex;
        flex-wrap: wrap;
    }

    .company-form .com_info .col-sm-6 {
        display: flex;
    }

    .company-form .com_info .col-sm-6 .well {
        width: 100%;
    }

    .company-form .form-title {
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

    .company-form .form-title:after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0px;
        width: 80px;
        height: 1px;
        background: rgb(105, 88, 88);
    }

    .company-form .well {
        background: #f9f9f9;
        box-shadow: none;
        border: 0;
    }

    .timepicker, .ui-timepicker-list{text-transform: uppercase;letter-spacing: 1px;}

</style>
@if($company)
<form  method="post" id="company-form" class="company-form">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <h2 class="form-title">Company Information</h2>
        </div>
    </div>
    <div class="row com_info">
        <div class="col-sm-6">
            <!-- left side company information -->
            <div class="well form-horizontal">
                <div class="form-group">
                    <label class="col-md-4 control-label">Company Name</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            <input class="form-control" name="name" required="true" value="{{$company->name}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Company Email</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" name="email" required="true" value="{{$company->email}}" type="email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Website</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input class="form-control" name="website" required="true" value="{{$company->website}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Phone Number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input class="form-control" name="phone" required="true" value="{{$company->phone}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Certification Number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-copy"></i></span>
                            <input class="form-control" name="certification_number" required="true" value="{{$company->certification_number}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">No. of Employee</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            <input class="form-control" name="employee_count" required="true" value="{{$company->employee_count}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Year of Establishment</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                            <input class="form-control" name="year_of_establishment" required="true" value="{{$company->year_of_establishment}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Office Timings</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group" style="margin-bottom:10px;">
                            <span class="input-group-addon" title="From" ><i class="fa fa-clock-o"></i></span>
                            <input class="timepicker form-control" name="office_timings_start" placeholder="From" required="true" value="{{$company->office_timings_start}}" type="text">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" title="To" ><i class="fa fa-clock-o"></i></span>
                            <input class="timepicker form-control"  name="office_timings_end" placeholder="To"  required="true" value="{{$company->office_timings_end}}" type="text">
                        </div>

                    </div>
                </div>
            </div>
            <!-- /left side company information ends -->
        </div>
        <div class="col-sm-6">
            <!-- right side company information -->
            <div class="well form-horizontal">
                <div class="form-group">
                    <label class="col-md-4 control-label">Product Categories</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list"></i></span>
                            <input class="form-control" name="product_categories" value="{{$company->product_categories}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Country</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input class="form-control" name="country" required="true" value="{{$company->country}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">City</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                            <input class="form-control" name="city" required="true" value="{{$company->city}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Address Line 1</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <textarea name="address_line1" class="form-control">{{$company->address_line1}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Address 2</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <textarea name="address_line2" class="form-control">{{$company->address_line2}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Currency</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input class="form-control" name="currency" required="true" value="{{$company->currency}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Fax</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input class="form-control" name="fax" required="true" value="{{$company->fax}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">TAX Registration Date</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                            <input class="form-control" name="tax_registration_date" required="true" value="{{$company->tax_registration_date}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Tax Registration Number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                            <input class="form-control" name="tax_registration_number" required="true" value="{{$company->tax_registration_number}}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Zip Code</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                            <input class="form-control" name="zip_code" required="true" value="{{$company->zip_code}}" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /right side company information ends -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2 class="form-title">Company Images</h2>
        </div>
        <div class="col-sm-12">
            <!-- left side company information -->
            <div class="well form-horizontal">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Logo</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->logo}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file"  accept="image/png, image/jpeg, image/gif" name="logo" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Trade License</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->image_trade_license}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image_trade_license" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Image 1</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->image_1}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image_1" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Image 2</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->image_2}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image_2" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Image 3</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->image_3}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image_3" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Image 4</label>
                            <div class="col-md-8 inputGroupContainer">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" value="{{$company->image_4}}" class="form-control image-preview-filename" readonly>
                                    <div class="popover fade bottom" style="top: 34.4px; left: 43.4px; display: block;">
                                        <div class="arrow" style="left: 50%;"></div>
                                        <h3 class="popover-title"><strong>Preview</strong><button type="button"
                                                                                                  class="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3>
                                        <div class="popover-content">
                                            <img src=""></div>
                                    </div>
                                    <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="fa fa-remove"></span>
                                                </button>
                                        <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">   Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image_4" />
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /left side company information ends -->
        </div>
        <div class="col-sm-12">
            <h2 class="form-title">Other Information</h2>
        </div>
        <div class="col-sm-12">
            <div class="well">
                <div class="form-group">
                    <label for="" class="control-label">Company Profile</label>
                    <textarea class="form-control" name="profile" id="editor">{{$company->profile}}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">About Us</label>
                    <textarea class="form-control" name="about" id="editor2">{{$company->about}}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
<script type="text/javascript">
    $(function () {
        if (!w2ui['toolbar-company-settings'])
        $('#toolbar').w2toolbar({
            name: 'toolbar-company-settings',
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
                    var data = new FormData($('#company-form')[0]);
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url:'/settings/general/company/update',
                        type:'post',
                        dataType:'json',
                        data:data,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            // setting a timeout
                            w2utils.lock($('#company-form'), 'Please Waite....', true);
                        },
                        success:function (data) {
                            if(data.status === 'success'){
                                w2popup.message({
                                    width   : 350,
                                    height  : 170,
                                    body    : '<div class="w2ui-centered">The Company Settings Has Been Updated Successfully .</div>',
                                    buttons : '<button class="w2ui-btn" onclick="w2popup.message()">Ok</button>'
                                });
                                w2utils.lock($('#company-form'), '<span class="fa fa-check "></span> Success.', false);
                                setTimeout(function () {
                                    w2utils.unlock($('#company-form'));
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