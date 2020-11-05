@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (Auth::check())
                            <div>
                                Bạn đang đăng nhập với quyền
                                @if( Auth::user()->level == 0)
                                    {{ "SuperAdmin" }}
                                @elseif( Auth::user()->level == 1)
                                    {{ "Admin" }}
                                @elseif( Auth::user()->level == 2)
                                    {{ "giáo viên" }}
                                @elseif( Auth::user()->level == 3)
                                    {{ "bảo mẫu" }}
                                @endif
                            </div>
                        @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
