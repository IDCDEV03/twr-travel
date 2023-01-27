@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูลส่วนตัว</h3>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif

@foreach ($user_profile as $item)    
                <form class="form theme-form" method="POST" action="{{ route('user_profile_update', ['id' => Auth::user()->id]) }}">
                   @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">ชื่อ-นามสกุล</label>
                                <input class="form-control" type="text" name="member_name" value="{{$item->member_name}}">
                              </div>
                            </div>
                          </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Username</label>
                            <input class="form-control" type="text" name="username" value="{{$item->username}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputPassword2">Email</label>
                            <input class="form-control" type="email" name="email" value="{{$item->email}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect9">เบอร์โทรศัพท์</label>
                            <input class="form-control" type="text" name="user_phone" value="{{$item->user_phone}}">
                          </div>
                        </div>
                      </div>

                      
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                      <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                  </form>
                  @endforeach             
            </div>
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
