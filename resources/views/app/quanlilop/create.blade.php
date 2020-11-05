<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Tạo lớp học</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên lớp</label>
                <input type="text" class="form-control" id="name-class">
            </div>
            <div class="form-group">
                <label class="sub-title">Loại lớp</label>
                <select type="text" class="form-control" id="type-class">
                </select>
            </div>
            <div class="form-group">
                <label class="sub-title">Số lượng</label>
                <input type="text" class="form-control" id="total-class">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalCreate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="createlophoc()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/quanlilop/create.js"></script>
@endpush

