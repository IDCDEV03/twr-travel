@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูล</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                @foreach ($admin_data as $item)
                    <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
<div class="card-body">
<div class="tabbed-card">
    <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess"
        role="tablist">
        <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                data-bs-toggle="pill" href="#pills-clrhomesuccess" role="tab"
                aria-controls="pills-clrhome" aria-selected="true"><i
                    class="icofont icofont-ui-settings"></i>ข้อมูลทั่วไป</a></li>
        <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                data-bs-toggle="pill" href="#pills-clrprofilesuccess" role="tab"
                aria-controls="pills-clrprofile" aria-selected="false"><i
                    class="icofont icofont-ui-password"></i>เปลี่ยนรหัสผ่าน</a></li>

    </ul>
    <div class="tab-content" id="pills-clrtabContentsuccess">
        <div class="tab-pane fade show active" id="pills-clrhomesuccess" role="tabpanel"
            aria-labelledby="pills-clrhome-tabsuccess">
      
            <p>
            <form class="form theme-form" method="POST" action="{{ route('admin.data_update', ['id' => request()->id]) }}">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input class="form-control" type="text" name="username"
                                value="{{ $item->username }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">ชื่อ-นามสกุล</label>
                            <input class="form-control" type="text" name="member_name"
                                value="{{ $item->member_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">อีเมล</label>
                            <input class="form-control" type="text" name="email"
                                value="{{ $item->email }}">
                        </div>
                    </div>
                </div>


                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                </div>
                @endforeach
                </form>

                </p>
            </div>
            <div class="tab-pane fade" id="pills-clrprofilesuccess" role="tabpanel"
                aria-labelledby="pills-clrprofile-tabsuccess">
                <p>
                    <form class="form theme-form" method="POST" action="{{route('admin.update_password')}}">
                        @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" >รหัสผ่านเก่า</label>
                                <input class="form-control" type="password" name="old_password" >
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">รหัสผ่านใหม่</label>
                                <input class="form-control" type="password" name="new_password" >
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">ยืนยันรหัสผ่านใหม่</label>
                                <input class="form-control" type="password" name="new_password_confirmation" >
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                    </form>

                </p>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection

@section('script')
@endsection
