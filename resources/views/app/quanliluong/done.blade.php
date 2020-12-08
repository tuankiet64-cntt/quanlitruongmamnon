<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Chi tiết trả lương</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Số ngày làm việc</label>
                <br>
                <label type="number" class="form-control" id="ngay-done"></label>
            </div>
            <div class="form-group">
                <label class="sub-title">Số tiền hằng ngày</label>
                <br>
                <label type="text" class="form-control" id="luonghangngay-done"></label>
            </div>
            <div class="form-group">
                <label class="sub-title">Lương</label>
                <br>
                <label id="luong-done" class="form-control" type="text"></label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="CloseModalDone()">Đóng</button>
    {{--    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="update()"><i--}}
    {{--            class="fa"></i>Lưu lại--}}
    {{--    </button>--}}
</div>

