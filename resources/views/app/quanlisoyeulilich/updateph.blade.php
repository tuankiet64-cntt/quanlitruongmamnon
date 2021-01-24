<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Bổ sung thông tin học sinh</h4>
</div>
<div class="modal-body background-body-color">
    <div>
        <h5 class="col-lg-12 p-b-20 text-center">Thông tin của phụ huynh 1(*)</h5>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Họ và tên(*) </label>
            <input class="col-lg-7 need form-control" id="hotenph-update">
        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Ngày sinh (*)</label>
            <input class="datetimepicker-update-ph  need col-lg-7 form-control" id="ngaysinh_ph-update-ph"  type="text" >

        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Số điện thoại(*) </label>
            <input class="col-lg-7 need form-control" id="sdt_ph-update">
        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Email(*)</label>
            <input class="col-lg-7 need form-control" id="email_ph-update">
        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Nghề nghiệp(*)</label>
            <input class="col-lg-7  form-control" id="nghenghiep_ph-update">
        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Tên đơn vị làm việc hiện này(*)</label>
            <input class="col-lg-7  form-control" id="tencongty_ph-update">
        </div>
        <div class="form-group d-flex flex-row justify-content-between">
            <label class="col-lg-5">Quan hệ với bé(*)</label>
            <select class="col-lg-7 form-control" id="quanhe_ph-update">
                <option value="1">Cha</option>
                <option value="2">Mẹ</option>
                <option value="0">Người thân</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalph()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="save" onclick="saveph()"><i class="fa"></i>Lưu lại</button>
</div>

@push('script')
    <script src="../js/component/app/quanlisoyeulilich/create.js"></script>
@endpush

