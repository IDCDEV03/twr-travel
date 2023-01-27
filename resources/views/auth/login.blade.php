@extends('userLayouts.authentication.master')
@section('title', 'เข้าสู่ระบบ')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">

                  @if (session('error'))
                  <div class="alert alert-error" role="alert">
                      <b>{{ session('error') }}</b>
                  </div>
                   @endif

                  <!--form_begin--->
                  <form class="theme-form" method="POST" action="{{ route('login.perform') }}">
                     {{ csrf_field() }}

                     <h4>เข้าสู่ระบบ</h4>
                     <p>ระบุอีเมลและรหัสผ่านของท่านเพื่อเข้าสู่ระบบ</p>

                     @include('userLayouts.messages')

                     <div class="form-group">
                        <label class="col-form-label">Email หรือ Username </label>
                        <input class="form-control" type="text" name="username"  required="required" placeholder="สามารถเข้าสู่ระบบผ่าน Username หรือ E-mail" autofocus >
                        @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" value="{{ old('password') }}"  required="required" >
                        @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox" name="remember">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <a class="link" href="#">ลืมรหัสผ่าน?</a>
                        <button class="btn btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
                     </div>
                     <p class="mt-4 mb-0">ยังไม่ได้เป็นสมาชิก?<a class="ms-2" href="{{ route('register.show') }}">สมัครสมาชิกใหม่</a></p>
                  </form>
                  <!-----------form_end------------>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection