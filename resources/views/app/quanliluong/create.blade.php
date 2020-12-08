<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Tạo  lương</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Số ngày làm việc</label>
                <input type="number" class="form-control" id="ngay" max="31">
            </div>
            <div class="form-group">
                <label class="sub-title">Lương</label>
                <input id="luong" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label class="sub-title">Số tiền hằng ngày</label>
                <input type="text" class="form-control" id="luonghangngay">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeCreate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="insert()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/quanliluong/create.js"></script>
@endpush

