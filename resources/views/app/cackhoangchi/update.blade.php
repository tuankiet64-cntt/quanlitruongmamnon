<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Sửa khoản chi</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên khoảng Chi</label>
                <input type="text" class="form-control" id="name-chi-update">
            </div>
            <div class="form-group">
                <label class="sub-title">Số tiền</label>
                <input type="text" class="form-control" id="total-chi-update">
            </div>
            <div class="form-group">
                <label class="sub-title">Ghi chú</label>
                <input type="text" class="form-control" id="note-chi-update">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="CloseModalUpdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="updatechi()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/cackhoangchi/update.js"></script>
@endpush

