<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Sửa khoản phí</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên khoảng phí</label>
                <input type="text" class="form-control" id="name-fee-update">
            </div>
            <div class="form-group">
                <label class="sub-title">Tháng áp dụng</label>
                <input id="month-fee-update" class="form-control  text-center" type="text"
                       placeholder="{{date('m')}}" value="{{date('m')}}" >
            </div>
            <div class="form-group">
                <label class="sub-title">Số tiền</label>
                <input type="text" class="form-control" id="total-fee-update">
            </div>
            <div class="form-group">
                <label class="sub-title">Loại phí</label>
                <select class="form-control"  id="type-fee-update">
                    <option value="1" class="text-center">Phí ngày</option>
                    <option value="2" class="text-center">Phí tháng</option>
                </select>
            </div>
            <div class="form-group">
                <label class="sub-title">Ghi chú</label>
                <input type="text" class="form-control" id="note-fee-update">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalUpdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="Updatefee()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/cackhoangphi/update.js"></script>
@endpush

