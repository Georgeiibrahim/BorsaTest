@extends('layouts.master')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h1 class="mb-0 h6">{{ ('Edit Project') }}</h5>
</div>
<div class="">

    <form class="form form-horizontal mar-top" action="{{route('project.update', $projects->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                <input name="_method" type="hidden" value="POST">
                <input type="hidden" name="id" value="{{ $projects->id }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Project Name')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="p_name" placeholder="{{('Project Name')}}" value="{{ $projects->p_name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Project Description')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="p_description" placeholder="{{('Project Description')}}" value="{{ $projects->p_descriptin}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Project Price ')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="project_price" placeholder="{{('Project Price For One Share')}}" value="{{ $projects->project_price}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Project Price For One Share')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="market_share_price" placeholder="{{('Project Price For One Share')}}" value="{{ $projects->market_share_price}}" required>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Building Type')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="buliding_type" placeholder="{{('Building Type')}}" value="{{ $projects->buliding_type}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Country')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="country" placeholder="{{('Country')}}" value="{{ $projects->country}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Governement')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="government" placeholder="{{('Governement')}}" value="{{ $projects->government}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Area')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="area" placeholder="{{('Area')}}" value="{{ $projects->area}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('District')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="district" placeholder="{{('District')}}" value="{{ $projects->district}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Street Name')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="street" placeholder="{{('Street Name')}}" value="{{ $projects->street}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Building Number')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="building_no" placeholder="{{('Building Number')}}" value="{{ $projects->building_no}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Apartment Number')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="apartment_no" placeholder="{{('Apartment Number')}}" value="{{ $projects->apartment_no}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Floor Number')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="floor" placeholder="{{('Floor Number')}}" value="{{ $projects->floor}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Request Status')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="req_status" placeholder="{{('Request Status')}}" value="{{ $projects->req_status}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{('Number Of Shares For Project')}} <i class="las la-language text-danger" title="{{('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="no_of_shares" placeholder="{{('Add  Number of shares')}}" value="{{ $projects->no_of_shares}}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group row">
                        <label class="col-md-3 col-from-label">{{('Select Image')}} <span class="text-danger">*</span></label>
                        <input 
                            type="file" 
                            name="image" 
                            id="inputImage"
                            class="form-control @error('image') is-invalid @enderror">
                            
                    </div>
                </div>
                <div>      
                    <label class="aiz-checkbox">
                        <div class="ywgc-main-image" style="max-width: 20%; height: auto; margin: 0 auto; display: block;">
                            <img src="{{ asset($projects->image_link) }}" id="ywgc-main-image" class="ywgc-main-image" alt="Project Image" title="Gift card image" style="border: none; display: block; font-size: 14px; font-weight: bold; height: auto; line-height: 100%; outline: none; text-decoration: none; text-transform: capitalize; max-width: 100%; margin: 0 auto;">
                        </div>                                       
                    </label>
                </div>


            </div>
        </div>

            <div class="col-12">
                <div class="mb-3 text-right">
                    <button type="submit" name="button" class="btn btn-info">{{ ('Update Project') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function (){
        show_hide_shipping_div();
    });

    $("[name=shipping_type]").on("change", function (){
        show_hide_shipping_div();
    });

    function show_hide_shipping_div() {
        var shipping_val = $("[name=shipping_type]:checked").val();

        $(".flat_rate_shipping_div").hide();

        if(shipping_val == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }
    }

   


    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')){
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else{
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    
    AIZ.plugins.tagify();

    $(document).ready(function(){
        update_sku();

        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });
    });

    $('#choice_attributes').on('change', function() {
        $.each($("#choice_attributes option:selected"), function(j, attribute){
            flag = false;
            $('input[name="choice_no[]"]').each(function(i, choice_no) {
                if($(attribute).val() == $(choice_no).val()){
                    flag = true;
                }
            });
            if(!flag){
                add_more_customer_choice_option($(attribute).val(), $(attribute).text());
            }
        });


        $.each(str, function(index, value){
            flag = false;
            $.each($("#choice_attributes option:selected"), function(j, attribute){
                if(value == $(attribute).val()){
                    flag = true;
                }
            });
            if(!flag){
                $('input[name="choice_no[]"][value="'+value+'"]').parent().parent().remove();
            }
        });

        update_sku();
    });

</script>

@endsection
