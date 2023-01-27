@extends('layouts.simple.master')
@section('title', 'ข้อมูลการจองรถ')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลจองรถ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('add_car') }}" class="btn btn-secondary" type="button">
                            <i class="fa fa-plus-square"></i> เพิ่มคิวรถใหม่</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="cell-border hover" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>ชื่อรถ</th>
                                        <th>ทะเบียนรถ</th>
                                        <th>จำนวนรอบ</th>
                                        <th>วันที่สร้าง</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($list_car as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->car_name }}</td>
                                            <td>{{ $row->car_number }}</td>
                                            <td>{{ $row->car_book }}</td>
                                            <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s') }}</td>
                                            <td>
                                            
                                                    <a href="{{ url('/admin/edit_car/'.$row->id) }}" class="btn btn-primary" >
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
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
