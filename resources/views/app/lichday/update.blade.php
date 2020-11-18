<div class="modal-header">
    <div class="col-lg-12 d-flex justify-content-between">
        <h4 class="modal-title text-center" id="title_create">Cập nhật lịch dạy</h4>
        <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Delete()" data-toggle="modal" data-target="#area_update" title="Xóa lịch dạy"><span class="fa fa-trash"></span></button>
    </div>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <input type="text" class="d-none" id="phuhuynh">
            <input type="text" class="d-none" id="idnknhaphoc">
            <div class="d-flex justify-content-around">
                <h6 class="">Ngày dạy của giáo viên:<span id="tengv"></span>
                    <br><span class="text-primary" id="primary">Màu xanh: Đã có giáo viên dạy</span>
                </h6>
                <div class="d-flex flex-column">
                    <div class="col-auto  checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="1" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 2</span>
                        </label>
                    </div>
                    <div class="col-auto  checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="2" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 3</span>
                        </label>
                    </div>
                    <div class="col-auto  checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="3" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 4</span>
                        </label>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="col-auto checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="4" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 5</span>
                        </label>
                    </div>
                    <div class="col-auto checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="5" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 6</span>
                        </label>
                    </div>
                    <div class="col-auto checkbox-zoom zoom-primary">
                        <label>
                            <input type="checkbox" value="6" id="status-update">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                            <span>Thứ 7</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" id="bt-close" onclick="closeModalUpdateXL()">Đóng</button>
    <button type="button" class="btn btn-primary float-right" title="Lưu lại" id="add-new-area"
            onclick="updatexeplop()"><i class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/lichday/update.js"></script>
@endpush

