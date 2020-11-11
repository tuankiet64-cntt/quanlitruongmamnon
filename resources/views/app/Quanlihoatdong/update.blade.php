<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Tạo hoạt động</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên Hoạt động</label>
                <input type="text" class="form-control" id="name-active-update">
            </div>
            <div class="form-group">
                <label class="sub-title">Loại lớp</label>
                <select class="form-control"  id="type-active-update">
                </select>
            </div>
            <div class="form-group">
                <label class="sub-title">Ngày trong tuần</label>
                <div class="d-flex justify-content-around">
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
            <div class="form-group">
                <label class="sub-title">Ngày kết thúc</label>
                <input class="datetimepicker form-control" id="ngaykethuc-update" type="text" >
            </div>
            <div class="form-group">
                <label class="sub-title">Ghi chú</label>
                <input type="text" class="form-control" id="note-active-update">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="CloseModalupdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="update()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/quanlihoatdong/update.js"></script>
@endpush

