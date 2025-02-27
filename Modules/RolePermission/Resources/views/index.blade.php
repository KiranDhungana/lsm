@extends('backend.master')
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(isset($role))
                                @if (permissionCheck('permission.roles.update'))
                                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => route('permission.roles.update',$role->id),'method' => 'PUT']) }}
                                @endif
                            @else
                                @if (permissionCheck('permission.roles.store'))
                                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'permission.roles.store', 'method' => 'POST']) }}
                                @endif
                            @endif
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-0">
                                        @if(isset($role))
                                            @lang('common.Edit')
                                        @else
                                            @lang('common.Add')
                                        @endif
                                        @lang('role.Role')
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row  mt-25">
                                        <div class="col-lg-12">
                                            @if(session()->has('message-success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message-success') }}
                                                </div>
                                            @elseif(session()->has('message-danger'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message-danger') }}
                                                </div>
                                            @endif
                                            <div class="input-effect">
                                                <label class="primary_input_label mt-1">@lang('common.Name') <span class="required_mark">*</span></label>
                                                <input
                                                    class="primary_input_field form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                    type="text" name="name" autocomplete="off"
                                                    value="{{isset($role)? @$role->name: ''}}" required="1">
                                                <input type="hidden" name="id" value="{{isset($role)? @$role->id: ''}}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $tooltip = "";
                                    @endphp
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            @if(permissionCheck('permission.roles.update') || permissionCheck('permission.roles.store'))
                                                <button class="primary-btn fix-gr-bg" data-bs-toggle="tooltip"
                                                        title="{{@$tooltip}}">
                                                    <i class="ti-check"></i>
                                                    {{!isset($role)? 'save' : 'update'}}

                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 g-0 ">
                                <div class="main-title">
                                    <h3 class="mb-20">{{__('role.Role')}} {{__('common.List')}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="QA_section QA_section_heading_custom check_box_table">
                                    <div class="QA_table ">
                                        <!-- table-responsive -->
                                        <div>
                                            <table id="lms_table" class="table Crm_table_active">
                                                <thead>
                                                @include('backend.partials.alertMessagePageLevelAll')
                                                <tr>
                                                    <th width="30%">{{__('role.Role')}}</th>
                                                    <th width="30%">{{__('common.Type')}}</th>
                                                    <th width="40%">{{__('common.Action')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($RoleList->where('id','<>',1) as $role)
                                                    @if($role->id == 5 && !isModuleActive('Organization'))
                                                    @else
                                                        <tr>
                                                            <td>{{@$role->name}}</td>
                                                            <td>{{trans('setting.'.$role->type)}}</td>
                                                            <td>
                                                                @if(@$role->type == 'User Defined')
                                                                    <div
                                                                        class="dropdown CRM_dropdown d-inline-block mb-3">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle mt-1"
                                                                            type="button" id="dropdownMenu2"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            {{ __('common.select') }}
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                             aria-labelledby="dropdownMenu2">
                                                                            @if(permissionCheck('permission.roles.update'))
                                                                                <a href="{{ route('permission.roles.edit',$role->id) }}"
                                                                                   class="dropdown-item"
                                                                                   type="button">@lang('common.edit')</a>
                                                                            @endif

                                                                            @if(permissionCheck('permission.roles.destroy'))
                                                                                <a onclick="confirm_modal('{{route('permission.roles.destroy', $role->id)}}');"
                                                                                   class="dropdown-item edit_brand">{{__('common.delete')}}</a>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <!-- shortby  -->
                                                                @if(@$role->id != 1)
                                                                    @if (permissionCheck('permission.permissions.store'))
                                                                        <a href="{{ route('permission.permissions.index', [ 'id' => @$role->id])}}"
                                                                           class="">
                                                                            <button type="button"
                                                                                    class="primary-btn small fix-gr-bg"
                                                                                    title="{{__('role.assign_permission')}} "> {{__('role.Permission')}} </button>
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.partials.delete_modal')
    </section>
@endsection
