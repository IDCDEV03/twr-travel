@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')
 
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูลธนาคาร</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             @foreach ($data_bank as $row)
                    <div class="card-body"> 
                        <form action="{{ route('admin.update_bank', ['id' => request()->id]) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" >ชื่อธนาคาร</label>
                                    <input class="form-control" type="text" name="bank_name" value="{{$row->bank_name}}">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">ชื่อบัญชี</label>
                                    <input class="form-control" type="text" name="bank_account_name" value="{{$row->bank_account_name}}">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">เลขที่บัญชี</label>
                                    <input class="form-control" type="text" name="account_nummber" value="{{$row->account_number}}">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">สาขา</label>
                                    <input class="form-control" type="text" name="bank_branch" value="{{$row->bank_branch}}">
                                  </div>
                                </div>
                            </div>            
                         </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="submit">บันทึกข้อมูล</button>                  
                    </div>
                    </form>
  
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script') 
@endsection
