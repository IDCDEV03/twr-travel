@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลสมาชิก</h3>
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
                        
                        <table class="cell-border hover" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ที่</th>
                                    <th>ชื่อสมาชิก</th>
                                    <th>Username</th>
                                    <th>อีเมล</th>
                                    <th>วันที่สมัคร</th>
                                    <th>ตั้งค่า</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($user_data as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->member_name }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                        
                                                <a href="{{ route('admin.user_data_booking', ['id' => $row->id]) }}" class="btn btn-primary" >
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
 
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
