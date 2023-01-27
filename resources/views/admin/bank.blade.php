@extends('layouts.simple.master')
@section('title', 'ข้อมูลธนาคาร')

@section('css')
 
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลธนาคาร</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">             
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-bordered display" >
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อธนาคาร</th>
                                        <th>เลขที่บัญชี</th>
                                        <th>สาขา</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                        <tr>
                                            <td class="align-middle"><img src="../assets/images/bank/gsb.jpg" width="64px" height="64px" alt=""></td>
                                            <td>ธนาคารออมสิน</td>
                                            <td>0202-8621-4901</td>
                                            <td>สาขาเทสโก้โลตัส นาดี อุดรธานี</td>
                                            <td>
                                            
                                                    <a href="#" class="btn btn-info" >
                                                        <i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') 
@endsection
