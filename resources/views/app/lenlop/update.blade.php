<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Lên lớp</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <table class="table table-border-style col-lg-12" id="nextclass">
                <thead>
                <th>STT</th>
                <th>Tên lớp tuổi</th>
                <th>Độ tuổi</th>
                {{--                        <th>Số tiền</th>--}}
                {{--                        <th>Loại phí</th>--}}
                {{--                        <th>Ghi chú</th>--}}
                {{--                        <th>Số lượng tối đa</th>--}}
                <th>Chọn</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalUpdate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="update()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/lenlop/update.js"></script>
@endpush

