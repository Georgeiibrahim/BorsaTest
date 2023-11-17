@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Projects Information')}}</h5>
            </div>

            <form class="form-horizontal" action="{{ route('project_user.store') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">
                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Project Name')}}</label>
                        <div class="col-sm-9">
                            <select name="project_id" required class="form-control aiz-selectpicker">
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->p_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Username')}}</label>
                        <div class="col-sm-9">
                            <select name="user_id" required class="form-control aiz-selectpicker">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name . ' ' .$user->middle_name .' ' .$user->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

{{-- 
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="price">{{translate('price')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('price')}}" id="price" name="price" class="form-control" required>
                        </div>
                    </div> --}}
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
