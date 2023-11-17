@extends('layouts.master')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{('All Abouts')}}</h1>
        </div>

    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ ('All Abouts') }}</h5>
            </div>



            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ ('Type & Enter') }}">
                </div>
            </div>
        </div>
        
    
        
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>{{('Project Name')}}</th>
                        <th >{{('Description')}}</th>

                        <th>{{('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $key => $about)
                    <tr>
                            {{-- <td>
                                <div class="form-group d-inline-block">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-one" name="id[]" value="{{$project->id}}">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>

                            </td> --}}

                            <td>
                                <div class="form-group d-inline-block">
                                    <label class="aiz-checkbox">
                                        <div class="col">
                                            <span class="text-muted text-truncate-2">{{$about->question }}</span>
                                        </div>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group d-inline-block">
                                    <label class="aiz-checkbox">
                                        <div class="col">
                                            <span class="text-muted text-truncate-2">{{$about->answer }}</span>
                                        </div>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input onchange="update_status(this)" value="{{ $about->id }}" type="checkbox" <?php if ($about->status == 1) echo "checked"; ?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                           
                            <td class="text-right">
                                <a class="pull-left" href="{{route('about.edit', ['id'=>$about->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ ('Edit') }}">
                                    <i class="ti-pencil-alt"></i>
                                </a>
{{-- 
                                @can('brand_edit')
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('cars.brand_edit', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                @endcan --}}
                                {{-- @can('product_duplicate')
                                    <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{route('products.duplicate', ['id'=>$product->id, 'type'=>$type]  )}}" title="{{ translate('Duplicate') }}">
                                        <i class="las la-copy"></i>
                                    </a>
                                @endcan
                                @can('product_delete')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('products.destroy', $product->id)}}" title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i>
                                    </a>
                                @endcan --}}
                                
                                {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('cars.brand_delete', $brand->id)}}" title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i>
                                    </a> --}}
                            </td>
                     </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </form>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


<script>
    function update_status(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post('{{ route('about.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
            if(data == 1){
                alert('Status Done Successfully' );
            }
            else{
                alert('Something went wrong');
            }
        });
    }


    $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        

       

        function sort_products(el){
            $('#sort_products').submit();
        }

       

    </script>