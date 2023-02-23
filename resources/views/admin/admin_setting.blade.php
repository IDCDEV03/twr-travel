@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')
 
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ตั้งค่าข้อมูล</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             
                    <div class="card-body"> 
                        
                                                    
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <b>{{ session('success') }}</b>
            </div>
          @endif

                        <a href="{{ route('admin_setting_update', ['id' => Auth::user()->id]) }}" class="btn btn-pill btn-outline-primary-2x" type="button"> แก้ไขข้อมูลผู้ดูแลระบบ </a>

                        <a href="{{ route('admin.condition_setting', ['id' => 1]) }}" class="btn btn-pill btn-outline-secondary-2x" type="button"> แก้ไขข้อมูลเงื่อนไขการสั่งจองแพ็คเกจทัวร์ </a>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') 
@endsection
