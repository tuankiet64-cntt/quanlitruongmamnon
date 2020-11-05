<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Tạo khoản phí</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên khoảng phí</label>
                <input type="text" class="form-control" id="name-fee">
            </div>
            <div class="form-group">
                <label class="sub-title">Tháng áp dụng</label>
                <input id="month-fee" class="form-control  text-center" type="text"
                       placeholder="{{date('m')}}" value="{{date('m')}}" >
            </div>
            <div class="form-group">
                <label class="sub-title">Số tiền</label>
                <input type="text" class="form-control" id="total-fee">
            </div>
            <div class="form-group">
                <label class="sub-title">Loại phí</label>
                <select class="form-control"  id="type-fee">
                    <option value="1" class="text-center">Phí ngày</option>
                    <option value="2" class="text-center">Phí tháng</option>
                </select>
            </div>
            <div class="form-group">
                <label class="sub-title">Ghi chú</label>
                <input type="text" class="form-control" id="note-fee">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalCreate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="createfee()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/cackhoangphi/create.js"></script>
@endpush

