@extends('layout.app')
@section('content')
@section('pageTitle','Edit Database')

<div class="container">

    <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
            </div>
            <div class="card-toolbar">
                <button type="reset" class="btn btn-success mr-2 btngreen" style="font-weight: 500;">Update</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form">
            <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                    <div class="col-md-6"><div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                    <div class="col-md-6"><div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                    <div class="col-md-6"><div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
                            </div>
                        </div></div>
                </div>
            </div>
            <!--end::Body-->
        </form>
        <!--end::Form-->
    </div>
</div>

@endsection
