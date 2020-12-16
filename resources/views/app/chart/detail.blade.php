<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Chi tiết thu chi</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <h4 class="sub-title">Bảng chi tiết khoản chi </h4>
            <table class="table table-border-style col-lg-12" id="chitb">
                <thead>
                <th>STT</th>
                <th>Tên khoản phí</th>
                <th>Số tiền</th>
                <th>Ngày</th>
{{--                <th>Loại phí</th>--}}
{{--                <th>Ghi chú</th>--}}
                {{--                        <th>Số lượng tối đa</th>--}}
{{--                <th>Chức năng</th>--}}
                </thead>
            </table>
            <br>
            <h4 class="sub-title">Bảng chi tiết lương giáo viên</h4>
            <table class="table table-border-style col-lg-12" id="luonggv">
                <thead>
                <th>STT</th>
                <th>Tên giáo viên</th>
                <th>Số ngày làm việc</th>
                <th>Tổng tiền</th>
                <th>Ngày phát lương</th>
{{--                <th>Ghi chú</th>--}}
                {{--                        <th>Số lượng tối đa</th>--}}
{{--                <th>Chức năng</th>--}}
                </thead>
            </table>
            <br>
            <h4 class="sub-title">Bảng chi tiết thu học phí</h4>
            <table class="table table-border-style col-lg-12" id="tbhp">
                <thead>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Lớp</th>
                <th>Tổng tiền</th>
                <th>Ngày đóng</th>
{{--                <th>Ghi chú</th>--}}
                {{--                        <th>Số lượng tối đa</th>--}}
{{--                <th>Chức năng</th>--}}
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="CloseModalDetail()">Đóng</button>
</div>

@push('script')
    <script src="../js/component/app/chart/detail.js"></script>
@endpush

