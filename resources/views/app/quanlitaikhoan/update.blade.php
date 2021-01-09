<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Chỉnh sửa thông tin của giáo viên</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="row">
                <input type="text" class="d-none" id="giaovien">
                <input type="text" class="d-none" id="mataikhoan">
                <div class="col-lg-12">
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Họ và tên</label>
                        <input class="col-lg-7 form-control " id="hovaten-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Giới tính</label>
                        <select class="col-lg-7 form-control " id="gioitinh-update">
                            <option class="text-center" value="1">Nam</option>
                            <option class="text-center" value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Ngày sinh</label>
                        <input class="datetimepicker-update col-lg-7 form-control" id="ngaysinh-update" type="text">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">CMND</label>
                        <input class="col-lg-7 form-control" id="cmnd-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Chỗ ở hiện tại</label>
                        <input class="col-lg-7 form-control" id="diachi-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Hộ khẩu thường trú</label>
                        <input class="col-lg-7 form-control" id="hokhau-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Bằng cấp</label>
                        <input class="col-lg-7 form-control" id="bangcap-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Dân tộc</label>
                        <input class="col-lg-7 form-control" id="dantoc-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tôn giáo</label>
                        <input class="col-lg-7 form-control" id="tongiao-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Số điện thoại</label>
                        <input class="col-lg-7 form-control" id="sdt-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Ngày vào trường</label>
                        <input class="datetimepicker-update  col-lg-7 form-control" id="ngayvaotruong-update" type="text">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Chức vụ</label>
                        <select class="col-lg-7 js-example-basic-single form-control" id="chucvu-update">
                            {{--                            <option value="0" class="text-center" disabled selected>Chọn chứ vụ</option>--}}
                        </select>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Email</label>
                        <input class="col-lg-7 form-control" id="email-update">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalUpdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="update()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/quanlitaikhoan/update.js"></script>
@endpush

