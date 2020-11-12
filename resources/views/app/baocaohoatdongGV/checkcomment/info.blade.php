<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Nhận xét hoạt động</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <H4 class="d-flex flex-row">
                        <span class="sub-title">Báo cáo môn:</span>
                        <div class="m-l-2 d-flex flex-row" style="margin: -7px 14px;">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="check" data-id="" id="status" value="1">
                                        <i class="helper"></i>
                                        <span>Đã dạy</span>

                                    </label>
                                </div>
                            </div>
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="check" data-id="" id="status" value="0">
                                        <i class="helper"></i>
                                        <span>Chưa dạy</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </H4>
                    <h3 id="name-sb"><span>

                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <H4 class="sub-title">Nhận xét của giáo viên</H4>
                    <form>
            <textarea name="editor1" class="editor1" id="editorgv" rows="10" cols="80">

            </textarea>
                        <br>
                    </form>
                    <H4 class="sub-title">Nhận xét của ban giám hiệu</H4>
                    <form>
            <textarea name="editor1" class="editor1" id="editorbgh" rows="10" cols="80">

            </textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalInfo()">Đóng</button>
</div>

@push('script')
    <script src="../js/component/app/quanlihoatdongGV/checkcomment/info.js"></script>
@endpush


