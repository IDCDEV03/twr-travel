@extends('layouts.simple.master')
@section('title', 'รายการใบสั่งจอง')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>รายการใบสั่งจอง (ดำเนินการเรียบร้อย)</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             
                    <div class="card-body"> 
                        
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>รหัสทัวร์</th>
                                        <th>ชื่อแพ็คเกจ</th>
                                        <th>ผู้สั่งจอง</th>
                                        <th>วันที่ดำเนินการ</th>
                                        <th>สถานะ</th>
                                       
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                         $i = '1';   
                                        @endphp
                                        @foreach($list_invoice as $row)
                                    <tr>
                                        
                                        <td>{{ $i++; }}</td>      
                                        <td>{{$row->code_tour}}</td>    
                                        <td>{{$row->package_name}}</td>               
                                        <td>{{$row->member_name}}</td>
                                        <td>{{ Carbon\Carbon::parse($row->updated_at)->format('d/m/Y') }}</td>
                                        <td class="txt-success">ดำเนินการเรียบร้อย</td>
                                        <td><a href="{{ route('admin.invoice', ['id' => $row->booking_id]) }}" class="btn btn-info">ใบสั่งจอง</a></td>
                                    
                                    </tr>
                                    @endforeach
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
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
