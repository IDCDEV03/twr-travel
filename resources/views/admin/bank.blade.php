@extends('layouts.simple.master')
@section('title', 'ข้อมูลธนาคาร')

@section('css')
 
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลธนาคาร</h3>
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
                            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">เพิ่มบัญชีธนาคาร</button>
                        </div> 

                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table align-middle table-bordered display" >
                                    <thead class="bg-primary">
                                        <tr>
                      
                                            <th>ชื่อธนาคาร</th>
                                            <th>ชื่อบัญชี</th>
                                            <th>เลขที่บัญชี</th>
                                            <th>สาขา</th>
                                            <th>ตั้งค่า</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                    @foreach ($data_bank as  $row)                             
                                            <tr>
                                            
                                                <td>{{$row->bank_name}}</td>
                                                <td>{{$row->bank_account_name}}</td>
                                                <td>{{$row->account_number}}</td>
                                                <td>{{$row->bank_branch}}</td>
                                                <td>
                                                
                                                    <a class="btn btn-info" href="{{route('admin.data_update_bank', ['id' => $row->id])}}"><i class="fa fa-edit"></i> แก้ไข</a>
      
                                                        <a href="{{ route('admin.delete_bank', ['id' => $row->id]) }}" class="btn btn-danger" onclick="return confirm('ต้องการลบ ใช่หรือไม่?');"><i class="fa fa-trash-o"></i> ลบ</a>
                                                    
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

<!---modal----->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีธนาคาร</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">.
            <form action="{{route('admin.insert_bank')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" >ชื่อธนาคาร</label>
                        <input class="form-control" type="text" name="bank_name">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">ชื่อบัญชี</label>
                        <input class="form-control" type="text" name="bank_account_name">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">เลขที่บัญชี</label>
                        <input class="form-control" type="text" name="account_number">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">สาขา</label>
                        <input class="form-control" type="text" name="bank_branch">
                      </div>
                    </div>
                </div>            
             </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit">บันทึกข้อมูล</button>
          <button class="btn btn-primary" type="button" data-bs-dismiss="modal">ปิด</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script') 
@endsection
