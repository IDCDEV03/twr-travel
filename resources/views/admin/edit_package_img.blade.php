@extends('layouts.simple.master')
@section('title', 'แก้ไขภาพแพ็คเกจทัวร์')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขภาพแพ็คเกจทัวร์</h3>
@endsection

@section('content')
@php
    $pk_id = request()->id;
@endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">      

                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            <b>{{ session('delete') }}</b>
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success" role="alert">
                            <b>{{ session('success') }}</b>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-border-vertical">
                              <thead class="bg-primary">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">ภาพ</th>
                                  <th scope="col">ลบ</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                 $i = '1';   
                                @endphp
                                @foreach($pk_tour_img as $item)
                                <tr>
                                 
                                  <th scope="row">{{ $i++; }}</th>
                                  <td><img src="{{asset('/public/package_file/'.$item->package_img)}}" alt="" width="200px"></td>
                                  <td> <a class="btn btn-danger" onclick="return confirm('ต้องการลบใช่หรือไม่?')" 
                                    href="{{route('admin.package_img_delete', $item->id)}}"><i class="fa fa-trash"></i></a>
                                  
                                </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                               
                             </div>
                     <hr>
                     @if ($pk_img_count == '5')
<span class="alert alert-danger">มีภาพครบ 5 ภาพแล้ว กรุณาลบภาพเดิมออก หากต้องการเปลี่ยนรูปภาพ  </span>
                     @else
                             <form class="needs-validation" action="{{url('/admin/update_img/'.$pk_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf                          

                                <div class="row">
                                    <div class="col">
                                        <div class="col-md-12 mb-2">
                                            <img id="preview-image-before-upload" src="{{asset('/public/npa2.jpg')}}"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="package_cover"><strong>เพิ่มรูปใหม่</strong>
                                            </label>
                                            <input type="file" class="form-control"  name="package_img" id="img_cover"  accept="image/*" required>
                                        </div>
                                       
                                    </div>
                                </div>

<hr>

                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">บันทึก</button>
                            </div>
                        </form>      
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/ecommerce.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
            $('#img_cover').change(function(){
                        let reader = new FileReader();
             reader.onload = (e) => { 
               $('#preview-image-before-upload').attr('src', e.target.result); 
        }
             reader.readAsDataURL(this.files[0]); 
              });
    });

    </script>

@endsection
