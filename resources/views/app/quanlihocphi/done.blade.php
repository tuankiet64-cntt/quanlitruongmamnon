<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Thông tin </h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            {{--            Phần thông tin--}}
{{--            <input type="text" class="d-none" value="{{auth()->id()}}" id="idcanbo">--}}
            <h4 class="sub-title">Thông tin học sinh</h4>
            <div class="row" style="padding-bottom: 10px">
                <div class="col-lg-6 ">
                    <div class="d-flex justify-content-between">
                        <b>Tên học sinh:</b>
                        <span id="name-done"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Lớp:</b>
                        <span id="class-done"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Ngày bắt đầu:</b>
                        <span id="datestart-done"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Ngày kết thúc:</b>
                        <span id="dateend-done"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Số ngày học:</b>
                        <span id="dateon-done"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Số ngày nghỉ:</b>
                        <span id="dateoff-done"></span>
                    </div>
                </div>
                <div class="col-lg-6" id="hide">
                    <table class="table table-border-style col-lg-12" id="tableph-done">
                        <thead>
                        <th>STT</th>
                        <th>Tên Phụ huynh</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Quan hệ</th>
                        <th>Email</th>
                        </thead>
                    </table>
                </div>
            </div>
            {{--            Phần Khoảng phí--}}
            <h4 class="sub-title">Các khoảng phí</h4>
            <table class="table table-border-style col-lg-12" id="tablephi-done">
                <thead>
                <th>
                    <div class="checkbox-fade fade-in-primary">
                        <label>
                            <input id='checkall-done' checked type="checkbox" disabled value="">
                            <span class="cr">
                                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                        </span>

                        </label>
                    </div>
                </th>
                <th>Tên khoảng phí</th>
                <th>Tháng áp dụng</th>
                <th>Số tiền</th>
                <th>Loại phí</th>
                <th>Ghi chú</th>
                </thead>
            </table>
            {{--            Tổng tiền--}}
            <br>
            <div class="float-right h4">Tổng tiền: <span id="total-fee-done"></span><span>VND</span></div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closemodaldone()">Đóng</button>
    <button type="button" class="btn btn-warning" onclick="bill()">In biên lai</button>
</div>

@push('script')
    <script src="../js/component/app/quanlihocphi/done.js"></script>
@endpush

