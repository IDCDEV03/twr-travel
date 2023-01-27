@extends('layouts.simple.master')
@section('title', 'ข้อมูลแพ็คเกจ')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลแพ็คเกจ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($package_detail as $item)      

                <div class="card">                    
                    <div class="card-body">
                        <div class="m-t-15">
                            <a class="btn btn-secondary m-r-10" type="button" 
                            href="{{url('/admin/edit_pk/'.$item->id)}}"> <i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูล</a>

                            <a href="{{url('/admin/edit_pk_img/'.$item->package_id)}}" class="btn btn-primary m-r-10" type="button" > <i class="fa fa-picture-o"></i> แก้ไขภาพ</a>
                        </div>
                        <hr>
                   

                        <div class="product-page-details">
                            
                                <h3><strong>ชื่อแพ็คเกจ : {{ $item->package_name }}</strong></h3>
                                 
                        </div>
                        <div class="product-price">
                            @php
                            $pk_type1 = 'ทัวร์ในประเทศ';
                            $pk_type2 = 'ทัวร์ต่างประเทศ'; 
                            @endphp
                            ประเภท :  @if($item->package_type == 1)
                            {{$pk_type1}}     
                            @elseif($item->package_type == 2)
                            {{$pk_type2}}
                            @endif
                        </div>
                        <p class="h6 txt-secondary"><strong>รหัสทัวร์ : {{ $item->code_tour }}</strong></p>
                        <hr>
                        <p class="h6 txt-primary">
                            <strong>สถานะ : </strong>
                            @php
                            $pk_status1 = 'เปิดรับจอง';
                            $pk_status2 = 'ปิดรับจอง'; 
                            @endphp
                            @if($item->package_status == 1)
                            <span class="badge bg-success"> {{$pk_status1}} 
                        </span>                       
                            @elseif($item->package_status == 2)
                            <span class="badge bg-danger">
                            {{$pk_status2}}
                            </span>                           
                            @endif                        
                        </p>
                        <hr>
                        <p><strong>ภาพปก :</strong> 
                            <img src="{{asset( $item->package_cover)}}" width="150px">
                        </p>
                        <hr>
                        <div>
                            <table class="product-page-width">
                                <tbody>
                                    <tr>
                                        <td> <b>สถานที่ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td>{{ $item->package_place }} </td>
                                    </tr>
                                    <tr>
                                        <td> <b>พาหนะ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td>{{ $item->package_veh }} </td>
                                    </tr>
                                    <tr>
                                        <td> <b>จำนวนที่ลูกค้าขั้นต่ำ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td>{{ $item->package_min_customer }} คน </td>
                                    </tr>
                                    <tr>
                                        <td> <b>ราคา (ต่อคน) &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td>
                                            @php
                                            $price = number_format($item->package_price);    
                                            @endphp    
                                            {{ $price }} บาท
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>การวางมัดจำ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td>{{ $item->package_deposit }} % ของราคารวม</td>
                                    </tr>
                                    <tr>
                                        <td> <b>ระยะเวลา &nbsp;&nbsp;&nbsp;:
                                            </b></td>
                                        <td>
                                            {{ $item->package_total_day }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>วันที่เปิดจอง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-success">
                                            {{ Carbon\Carbon::parse($item->package_period_start)->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td> <b>วันที่ปิดจอง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-danger">
                                            {{ Carbon\Carbon::parse($item->package_period_end)->format('d/m/Y') }} </td>
                                    </tr>
                                 
                                  
                                </tbody>
                            </table>
                        </div>
                        <hr>
                       <p><i class="fa fa-caret-right"></i> <strong>ไฟล์เอกสารแพ็คเกจทัวร์ :</strong> <a href="{{asset( $item->package_file)}}">คลิก</a></p>
                        <hr>
                        <p class="alert alert-info txt-light h6"><strong>ไฮไลท์ทัวร์ :  {{ $item->highlight_tour }}</strong></p>
                        <hr>
                        <p class="h6 txt-info">รายละเอียดและเงื่อนไข : {!! $item->package_detail !!}</p>
                     </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')

@endsection
