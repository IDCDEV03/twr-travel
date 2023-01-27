@extends('userLayouts.authentication.master')
@section('title', 'สมัครสมาชิกใหม่')

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
                        <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo/login.png') }}" alt="looginpage"><img
                                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage"></a></div>
                        <div class="login-main">

                            <form class="theme-form" action="{{ route('register.perform') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                {{ csrf_field() }}
                                
                                <h4>สมัครสมาชิกใหม่</h4>
                                <p>กรุณากรอกข้อมูลเพื่อสมัครสมาชิกเว็บไซต์ของเรา</p>                         

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Username</label>
                                    <input class="form-control" name="username" type="text" required
                                        placeholder="ระบุ username" value="{{ old('username') }}" autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">ชื่อ-นามสกุล</label>
                                    <input class="form-control" name="member_name" type="text" required
                                        placeholder="ระบุชื่อและนามสกุล">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Email </label>
                                    <input class="form-control" type="email" required
                                        placeholder="อีเมลสำหรับการเข้าสู่ระบบ" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">เบอร์โทรศัพท์</label>
                                    <input class="form-control" name="user_phone" type="text" required
                                        placeholder="ระบุเฉพาะตัวเลขเท่านั้น">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="รหัสผ่าน 6 ตัวอีกษรขึ้นไป" value="{{ old('password') }}">

                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span
                                            class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Agree with<a class="ms-2"
                                                href="#">Privacy Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">สมัครสมาชิก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
