@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(isset($group) && permissionCheck('question-group.edit'))
                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('question-group-update',@$group->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                            @else
                                @if (permissionCheck('question-group.store'))

                                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'question-group.store',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                @endif
                            @endif
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-20">@if(isset($group))
                                            {{__('common.Edit')}}
                                        @else
                                            {{__('common.Add')}}
                                        @endif
                                        {{__('quiz.Question Group')}}
                                    </h3>
                                </div>
                                <div class="add-visitor">

                                    <div class="row">
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
                                                <label class="primary_input_label mt-1">{{__('coupons.Title')}} <span
                                                        class="text-danger">*</span></label>
                                                <input
                                                    class="primary_input_field{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                    type="text" name="title" autocomplete="off"
                                                    value="{{isset($group)? $group->title:''}}">
                                                <input type="hidden" name="id"
                                                       value="{{isset($group)? $group->id: ''}}">
                                                <span class="focus-border"></span>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    @php
                                        $tooltip = "";
                                          if (permissionCheck('question-group.store') || permissionCheck('question-group.edit')){
                                              $tooltip = "";
                                          }else{
                                              $tooltip = "You have no permission to add";
                                            $tooltip = _trans('courses.You have no permission');
                                          }
                                    @endphp

                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="primary-btn fix-gr-bg" data-bs-toggle="tooltip"
                                                    title="{{$tooltip}}">
                                                <i class="ti-check"></i>
                                                @if(isset($group))
                                                    {{__('common.Update')}}
                                                @else
                                                    {{__('common.Save')}}
                                                @endif

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mt-5 mt-lg-0">
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-20">{{__('quiz.Question Group List')}}</h3>
                        </div>

                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table ">
                                <div class="">
                                    <table id="lms_table" class="table Crm_table_active3">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('coupons.Title') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($groups as $key => $group)
                                            <tr>
                                                <th>{{ $key+1 }}</th>

                                                <td>{{@$group->title }}</td>
                                                <td>
                                                    @if((auth()->user()->role_id==2 && $group->user_id == auth()->id()) || auth()->user()->role_id!=2)

                                                        <div class="dropdown CRM_dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                    type="button"
                                                                    id="dropdownMenu2" data-bs-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                {{ __('common.Select') }}
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                 aria-labelledby="dropdownMenu2">
                                                                @if (permissionCheck('question-group.edit'))
                                                                    <a class="dropdown-item edit_brand"
                                                                       href="{{route('question-group.edit',$group->id)}}">{{__('common.Edit')}}</a>
                                                                @endif
                                                                @if (permissionCheck('question-group.delete'))
                                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                                       data-bs-target="#deleteQuestionGroupModal{{$group->id}}"
                                                                       href="#">{{__('common.Delete')}}</a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>


                                            <div class="modal fade admin-query"
                                                 id="deleteQuestionGroupModal{{$group->id}}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">{{__('common.Delete')}} {{__('quiz.Question Group')}}</h4>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                <i
                                                                    class="ti-close "></i></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <h4> {{__('common.Are you sure to delete ?')}}</h4>
                                                            </div>

                                                            <div class="mt-40 d-flex justify-content-between">
                                                                <button type="button" class="primary-btn tr-bg"
                                                                        data-bs-dismiss="modal">{{__('common.Cancel')}}</button>
                                                                {{ Form::open(['route' => array('question-group-delete',$group->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit">{{__('common.Delete')}}</button>
                                                                {{ Form::close() }}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
    </section>
    <div id="edit_form">

    </div>
    <div id="view_details">

    </div>
    <input type="hidden" name="status_route" class="status_route" value="{{ route('coupons.status_update') }}">

    {{-- @include('coupons::create') --}}
    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script src="{{asset('public/backend/js/category.js')}}"></script>
@endpush
