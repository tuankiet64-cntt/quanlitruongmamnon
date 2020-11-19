<div class="modal-header">
    <div class="col-lg-12 d-flex justify-content-between">
        <h4 class="modal-title text-center" id="title_create">Chọn giáo viên giảng dạy</h4>
{{--        <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Delete()" data-toggle="modal" data-target="#area_update" title="Xóa lịch dạy"><span class="fa fa-trash"></span></button>--}}
    </div>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <input type="text" class="d-none" id="phuhuynh">
            <input type="text" class="d-none" id="idnknhaphoc">
            <div class="row">
                <div class="table table-border-style  col-lg-12" style="width: 100%">
                    <table class="table table-border-style " id="tablegvadd">
                        <thead>
                        <th>STT</th>
                        <th>Tên giáo viên</th>
                        <th>Tuổi</th>
                        <th>Giới tính</th>
                        <th>lịch dạy</th>
                        <th>Lớp</th>
                        {{--                                    <th>Giáo viên</th>--}}
                        {{--                                    <th>Lớp</th>--}}
                        <th>Chọn</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" id="bt-close" onclick="closeModaladd()">Đóng</button>
    <button type="button" class="btn btn-primary float-right" title="Lưu lại" id="add-new-area"
            onclick="updategv()"><i class="fa"></i>Lưu lại
    </button>
</div>

