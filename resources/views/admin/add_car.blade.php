@extends('layouts.simple.master')
@section('title', 'เพิ่มคิวรถใหม่')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>เพิ่มคิวรถใหม่</h3>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">  
                    <div class="card-body">                        
                        <form class="needs-validation" 
                        action="{{ route('add_listcar') }}" method="POST">         
                            @csrf             
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_name">ชื่อรถ</label>
                                    <input class="form-control" id="car_name" type="text" name="car_name" required>
                                    @error('car_name')
                                    <span class="text-danger my-2">{{ $message }}</span>
                                @enderror 
                                  </div>                  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_number">ทะเบียนรถ</label>
                                    <input class="form-control" id="car_number" type="text" name="car_number" required>
                                    @error('car_number')
                                    <span class="text-danger my-2">{{ $message }}</span>
                                @enderror 
                                  </div>                          
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="car_book">จำนวนรอบ</label>
                                    <input class="form-control" id="car_book" type="text" name="car_book" required>
                                  </div>                                
                                </div>
                              </div>
                              <div class="card-footer">
                                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>                                
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
