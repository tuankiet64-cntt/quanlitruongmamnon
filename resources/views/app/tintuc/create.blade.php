<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Viết tin tức</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tiêu đề</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label class="sub-title">Hình Đại diện</label>
                <input type="file" class="form-control"  id="avatar" enctype="multipart/form-data">
            </div>
            <div class="form-group">
                <label class="sub-title">Miêu tả</label>
                <input type="text" class="form-control" id="description">
            </div>
            <div class="form-group">
                <label class="sub-title">Nội dung</label>
                <textarea id="content" class="editor1"></textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="CloseModalTintuc()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="create()">
        <i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/tintuc/create.js"></script>
@endpush

