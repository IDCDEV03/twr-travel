@extends('layouts.simple.master')
@section('title', 'Sample Page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลแพ็คเกจทัวร์</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('add_package') }}" class="btn btn-primary" type="button">
                            <i class="fa fa-plus-square"></i> เพิ่มแพ็คเกจใหม่</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-info" role="alert">
                            <b>{{ session('success') }}</b>
                        </div>
                        @elseif (session('update'))
                        <div class="alert alert-secondary" role="alert">
                            <b>{{ session('update') }}</b>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>รหัสทัวร์</th>
                                        <th>ชื่อแพ็คเกจ</th>
                                        <th>ประเภท</th>
                                        <th>ราคา</th>
                                        <th>วันที่สร้าง</th>
                                        <th>สถานะ</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $i = 1;
                                    $pk_type1 = 'ทัวร์ในประเทศ';
                                    $pk_type2 = 'ทัวร์ต่างประเทศ'; 
                                    @endphp
                                    @foreach ($package_tour as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$row->code_tour}}</td>
                                            <td>{{ $row->package_name }}</td>
                                            <td>
                                                @if($row->package_type == 1)
                                                {{$pk_type1}}     
                                                @elseif($row->package_type == 2)
                                                {{$pk_type2}}
                                                @endif
                                            </td>
                                            <td>
                                            @php
                                            $price = number_format($row->package_price);    
                                            @endphp
                                             {{ $price }}
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @if ($row->package_status == 1)
                                                <span class="badge bg-success">เปิด</span>
                                                @elseif($row->package_status == 2)
                                                <span class="badge bg-danger">ปิด</span>
                                                @endif
                                               </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{url('/admin/package_detail/'.$row->package_id)}}" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                                </div>
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
