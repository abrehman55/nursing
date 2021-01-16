@extends('layout')

@section('content')

<div class="main d-flex flex-column flex-row-fluid">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6" id="kt_subheader">
        <div class="w-100 d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="col-lg-12 layout-spacing mt-3">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row ">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Update your profile
                                        </h3>
                                        <div class="card-toolbar">
                                            <div class="example-tools justify-content-center">
                                                <span class="example-toggle" data-toggle="tooltip"
                                                    title="View code"></span>
                                                <span class="example-copy" data-toggle="tooltip"
                                                    title="Copy code"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                    <form method="POST" action="{{route('admin.update')}}">
                                        {{-- @method('PUT') --}}
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="Enter receptionist name" required autofocus/>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter receptionist's email"/>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Password <small>(Leave blank to keep original)</small> </label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password"/>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Subheader-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Dashboard-->
        <!--begin::Row-->

        <!--end::Row-->
        <!--begin::Row-->

        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Content-->
</div>


@endsection
