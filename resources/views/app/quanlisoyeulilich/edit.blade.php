<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Chỉnh sửa thông tin học sinh</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="row">

                <input type="text" class="d-none" id="idhocsinh">
                <div class="col-lg-12">
                    <h5 class="col-lg-12 p-b-20 text-center">Thông tin của bé(*)</h5>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Họ và tên</label>
                        <input class="col-lg-7 need form-control " id="tenhs-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Giới tính(*)</label>
                        <select class="col-lg-7 form-control " id="gioitinh-update">
                            <option class="text-center" value="1">Nam</option>
                            <option class="text-center" value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Lớp</label>
                        <select class="col-lg-7 js-example-basic-single form-control" id="lop-update">
                        </select>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tên thường gọi</label>
                        <input class="col-lg-7 form-control" id="tenthuonggoi-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Ngày sinh(*)</label>
                        <input class="datetimepicker-update need col-lg-7 form-control" id="ngaysinh-update" type="text" >
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Ngày vao trường(*)</label>
                        <input class="datetimepicker-update col-lg-7 need form-control" id="ngayvaotruong-update" type="text" >
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5" >Chỗ ở hiện tại(*)</label>
                        <input class="col-lg-7 need form-control" id="diachi-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5" >Hộ khẩu thường trú(*)</label>
                        <input class="col-lg-7 need form-control" id="hokhau-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Hộ khẩu tạm trú</label>
                        <input class="col-lg-7 form-control" id="hokhautamtru-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Dân tộc(*)</label>
                        <input class="col-lg-7 need form-control" id="dantoc-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tôn giáo</label>
                        <input class="col-lg-7 form-control" id="tongiao-update">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Sức khỏe hiện tại(*)</label>
                        <input class="col-lg-7 need form-control" id="suckhoehientai-update">
                    </div>
                </div>
            </div>
            <table  class="table table-border-style col-lg-12" id="phuhuynhTB">
                <thead>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Quan hệ</th>
                <th>Tên công ty/doanh nghiệp</th>
                <th>Chức năng</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalUpdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="update()"><i class="fa"></i>Lưu lại</button>
</div>

@push('script')
    <script src="../js/component/app/quanlisoyeulilich/update.js"></script>
@endpush

