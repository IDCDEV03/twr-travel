@extends('layouts.simple.master')
@section('title', 'แก้ไขข้อมูลรถ')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูลรถ</h3>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">  
                    <div class="card-body">                        
                        <form class="needs-validation" 
                        action="{{url('/admin/update_car/'.$list_car->id)}}" method="POST">         
                            @csrf             
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_name">ชื่อรถ</label>
                                    <input class="form-control" id="car_name" type="text" name="car_name" 
                                    value="{{$list_car->car_name}}" required>
                                  </div>
                                  @error('car_name')
                                  <span class="text-danger my-2">{{ $message }}</span>
                              @enderror                  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_number">ทะเบียนรถ</label>
                                    <input class="form-control" id="car_number" type="text" name="car_number"
                                    value="{{$list_car->car_number}}" required>
                                  </div>  
                                  @error('car_number')
                                  <span class="text-danger my-2">{{ $message }}</span>
                              @enderror                          
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_book">จำนวนรอบ</label>
                                    <input class="form-control" id="car_book" type="text" name="car_book"
                                    value="{{$list_car->car_book}}" required>
                                  </div>                                
                                </div>
                              </div>
                              <div class="card-footer">
                               <button class="btn btn-secondary" type="submit">บันทึกข้อมูล<button>              
                              </div>                            
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
