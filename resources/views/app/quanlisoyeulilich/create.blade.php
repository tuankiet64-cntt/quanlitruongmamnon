<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Bổ sung thông tin học sinh</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="row">
                <input type="text" class="d-none" id="phuhuynh">
                <input type="text" class="d-none" id="idnknhaphoc">
                <div class="col-lg-6">
                    <h5 class="col-lg-12 p-b-20 text-center">Thông tin của bé</h5>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5 ">Họ và tên(*)</label>
                        <input class="col-lg-7 need form-control " id="tenhs">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Giới tính(*)</label>
                        <select class="col-lg-7 form-control " id="gioitinh">
                            <option class="text-center" value="1">Nam</option>
                            <option class="text-center" value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tên thường gọi</label>
                        <input class="col-lg-7 form-control" id="tenthuonggoi">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5 ">Ngày sinh(*)</label>
                        <input class="datetimepicker need col-lg-7 form-control" id="ngaysinh" type="text" >
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5 ">Ngày vao trường(*)</label>
                        <input class="datetimepicker need col-lg-7 form-control" id="ngayvaotruong" type="text" >
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5" >Chỗ ở hiện tại(*)</label>
                        <input class="col-lg-7 need form-control" id="diachi">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5" >Hộ khẩu thường trú(*)</label>
                        <input class="col-lg-7 need form-control" id="hokhau">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Hộ khẩu tạm trú(*)</label>
                        <input class="col-lg-7 need form-control" id="hokhautamtru">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Dân tộc(*)</label>
                        <input class="col-lg-7 need form-control" id="dantoc">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tôn giáo</label>
                        <input class="col-lg-7  form-control" id="tongiao">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Sức khỏe hiện tại(*)</label>
                        <input class="col-lg-7 need form-control" id="suckhoehientai">
                        <span style="font-size: 34px;"><i class="error d-none text-danger fa fa-ban"></i></span>

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Họ và tên anh/chị/em ruột</label>
                        <input class="col-lg-7 form-control" id="hotenac">

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Số điện thoại(Nếu có)</label>
                        <input class="col-lg-7 form-control" id="sdtac">
                    </div>

                </div>
                <div class="col-lg-6  ph">
                    <h5 class="col-lg-12 p-b-20 text-center">Thông tin của phụ huynh 1(*)</h5>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Họ và tên(*) </label>
                        <input class="col-lg-7 need form-control" id="hotenph">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Ngày sinh (*)</label>
                        <input class="datetimepicker  need col-lg-7 form-control" id="ngaysinh_ph"  type="text" >

                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Số điện thoại(*) </label>
                        <input class="col-lg-7 need form-control" id="sdt_ph">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Email(*)</label>
                        <input class="col-lg-7 need form-control" id="email_ph">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Nghề nghiệp(*)</label>
                        <input class="col-lg-7 need form-control" id="nghenghiep_ph">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Tên đơn vị làm việc hiện này(*)</label>
                        <input class="col-lg-7 need form-control" id="tencongty_ph">
                    </div>
                    <div class="form-group d-flex flex-row justify-content-between">
                        <label class="col-lg-5">Quan hệ với bé(*)</label>
                        <select class="col-lg-7 form-control" id="quanhe_ph">
                            <option value="1">Cha</option>
                            <option value="2">Mẹ</option>
                            <option value="0">Người thân</option>
                        </select>
                    </div>
                    <div class=" ph-add d-none">
                        <h5 class="col-lg-12 p-b-20 text-center">Thông tin của phụ huynh 2</h5>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Họ và tên(*) </label>
                            <input class="col-lg-7 need form-control" id="hotenph-add">
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Ngày sinh (*)</label>
                            <input class="datetimepicker need col-lg-7 form-control" id="ngaysinh_ph-add"  type="text" >

                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Số điện thoại </label>
                            <input class="col-lg-7 form-control" id="sdt_ph-add">
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Email</label>
                            <input class="col-lg-7 form-control" id="email_ph-add">
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Nghề nghiệp</label>
                            <input class="col-lg-7 form-control" id="nghenghiep_ph-add">
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Tên đơn vị làm việc hiện này</label>
                            <input class="col-lg-7 form-control" id="tencongty_ph-add">
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between">
                            <label class="col-lg-5">Quan hệ với bé (*)</label>
                            <select class="col-lg-7 form-control" id="quanhe_ph_add">
                                <option value="1">Cha</option>
                                <option value="2">Mẹ</option>
                                <option value="0">Người thân</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" id="add_ph">Thêm người thân</button>
    <button type="button" class="btn btn-default" onclick="closemodal()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="createhs()"><i class="fa"></i>Lưu lại</button>
</div>

@push('script')
    <script src="../js/component/app/quanlisoyeulilich/create.js"></script>
@endpush

