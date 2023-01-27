@extends('userLayouts.simple.master')

@section('title', 'รายการทัวร์')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>รายการทัวร์</h3>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="product-wrapper-grid">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <a href="{{route('private_package',['id' => Auth::user()->id])}}" class="btn btn-lg btn-secondary" type="button">จัดกรุ๊ปทัวร์ส่วนตัว</a>
                    </div>
                    </div>

        @foreach ($all_packages as $row)
        <!--------------tab1---------------->
        
            <div class="col-xl-3 col-sm-6 xl-4">
                <div class="card">

                    <div class="product-box">
                        <div class="product-img">
                            <img class="img-fluid" src="{{ asset($row->package_cover)}}" alt="">
                            <div class="product-hover">
                                <ul>                                   
                                    <li>
                                        <button class="btn" type="button" data-bs-toggle="modal"
                                      data-bs-target="#Modal_{{$row->package_id}}"><i class="icon-eye"></i></button>
                                    </li>                                 
                                </ul>
                            </div>
                        </div>
                        <div class="modal fade" id="Modal_{{$row->package_id}}" tabindex="-1" role="dialog"
                            aria-labelledby="Modal_{{$row->package_id}}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="product-box row">
                                            <div class="product-img col-lg-6"><img class="img-fluid"
                                                    src="{{ asset($row->package_cover)}}" alt=""></div>
                                            <div class="product-details col-lg-6 text-start">
                                                <h4>{{$row->package_name}}</h4>
                                                <div class="product-price">{{number_format($row->package_price)}}.-
                                                </div>
                                                <div class="product-view">
                                                    <h6 class="f-w-600">รายละเอียด</h6>
                                                
                                                     <p class="mb-0">
                                                        ไฮไลท์ทัวร์ : {{$row->highlight_tour}}    
                                                     </p>
                                                     <p class="mb-0">
                                                     ระยะเวลา :  {{$row->package_total_day}}    
                                                     </p>
                                            
                                                   <p class="mb-0">
                                                    ดาวน์โหลดรายละเอียดโปรแกรม : 
                                                    <a href="{{ asset($row->package_file)}}">คลิก</a>
                                                    </p>
                                                </div>
                                             <br>
                                                <div class="product-qnty">
                                                    <div class="addcart-btn">
                                                <a
                                                href="{{route('book_package',['id'=>Auth::user()->id,'pkid'=>$row->package_id]);}}" class="btn btn-primary" type="button">สั่งจองแพ็คเกจนี้</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-details">                         
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#Modal_{{$row->package_id}}">
                            <h4>
                                {{$row->package_name}}</h4>
                            </a>
                            <p>{{$row->package_total_day}} / {{$row->package_place}}</p>
                            <div class="product-price">{{number_format($row->package_price)}}.-
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>        
        <!--------------tab1---------------->
  
@endforeach
</div>
 </div>

    </div>
    </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
