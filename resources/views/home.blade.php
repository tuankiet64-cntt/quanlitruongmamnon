@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body d-flex justify-content-center flex-column align-items-center" style="height: 151px">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Auth::check())
                            <div>
                                <input type="text" class="d-none" id="idgv" value="{{Auth::user()->id}}">
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
                    </div>
                </div>
            </div>
            @if($checkin==0)
                <div class="card text-center" style="width: 18rem;" id="off">
                    <h5 class="card-header">Chấm công</h5>
                    <div class="card-body">
                        <p class="card-text">Click vào nút checkin để Chấm công.</p>
                        <button class="btn btn-primary" id="checkin" onclick="checkin()">Checkin</button>
                    </div>
                </div>
            @else
                <div class="card text-center" style="width: 18rem;">
                    <h5 class="card-header">Chấm công</h5>
                    <div class="card-body">
                        <p class="card-text">Bạn đã check in vào lúc: {{$time}}.</p>
                        <p class="card-text">Số ngày công hiện tại là : {{$total}}.</p>
                        <button class="btn btn-danger" disabled>Checkin</button>
                    </div>
                </div>
            @endif
            <div class="card text-center d-none" style="width: 18rem;" id="on">
                <h5 class="card-header">Chấm công</h5>
                <div class="card-body">
                    <p class="card-text">Bạn đã check in vào lúc: {{$time}}.</p>
                    <p class="card-text">Số ngày công là : {{$total}}.</p>
                    <button class="btn btn-danger" disabled>Checkin</button>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="../js/component/app/checkin/index.js"></script>
    @endpush
@endsection
