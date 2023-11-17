@extends('layouts.master')

@section('content')



<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{('Add New Project')}}</h5>
</div>
<div class="">
    <!-- Error Meassages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form form-horizontal mar-top" action="{{route('project.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{('Project Information')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Project Name')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="p_name" placeholder="{{ ('Project Name') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Project Description')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="p_description" placeholder="{{ ('Project Description') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Building Type')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="buliding_type" placeholder="{{ ('Building Type') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Country')}} <span class="text-danger">*</span></label>
                            {{-- <div class="col-md-8">
                                <input type="text" class="form-control" name="country" placeholder="{{ ('Country') }}"  required>
                            </div> --}}

                            <select class="col-md-8" data-live-search="true" data-placeholder="{{ ('Select Country') }}" name="country" required>
                                <option value="">{{ ('Select Country') }}</option>
                                @foreach (\App\Models\Country::where('status', 1)->get() as $key => $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Government')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{-- <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="government" required>

                                </select> --}}
                                <input type="text" class="form-control" name="government" placeholder="{{ ('Government') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Area')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="area" placeholder="{{ ('Area') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('District')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="district" placeholder="{{ ('District') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Street')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="street" placeholder="{{ ('Street') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Building Number')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="building_no" placeholder="{{ ('Building Number') }}"  required>
                            </div>
                        </div>
                    </div>
                     <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Apartment Number')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="apartment_no" placeholder="{{ ('Apartment Number') }}"  required>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Floor')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="floor" placeholder="{{ ('Floor') }}"  required>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Price')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="project_price" placeholder="{{ ('Price') }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{('Number Of Share')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="no_of_shares" placeholder="{{ ('Number Of Share') }}"  required>
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
          
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" value="submit" class="btn btn-primary action-btn">{{ ('Save') }}</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection



<script>

$(document).on('change', '[name=country]', function() {
            var country = $(this).val();
            getStates(country);
        });
 function getStates(country) {
            $('[name="state"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-model')}}",
                type: 'POST',
                data: {
                    country  : country
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="government"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }
</script>

