<div class="modal-header">
    <h4 class="modal-title text-center" id="title_create">Chấm công bù</h4>
</div>
<div class="modal-body background-body-color">
    <div class="card card-block mb-0 form-row">
        <div class="container">
            <div class="form-group">
                <label class="sub-title">Tên giáo viên</label>
                <br>
                <span id="tengv"></span>
            </div>
            <div class="form-group">
                <label class="sub-title">Ngày chấm công</label>
                <input class="form-control" id="datetimepicker" type="text" value="{{date('d-m-Y')}}">
            </div>
            <div class="form-group">
                <label class="sub-title">Trạng thái</label>
                <div class="d-flex justify-content-around">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Có mặt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="0">
                        <label class="form-check-label" for="exampleRadios1">
                            Vắng mặt
                        </label>
                    </div>
            </div>
        </div>
        <div class="form-group">
            <label class="sub-title">Danh sách chấm công</label>
            <table class="table table-border-style col-lg-12" id="chamcongbyid">
                <thead>
                <th>STT</th>
                <th>Ngày</th>
                <th>Trạng thái </th>
                <th>Chức năng </th>
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="closeModalCreate()">Đóng</button>
    <button type="button" class="btn btn-primary buttonload" title="Lưu lại" id="add-new-area" onclick="createCheckin()"><i
            class="fa"></i>Lưu lại
    </button>
</div>

@push('script')
    <script src="../js/component/app/quanlichamcong/create.js"></script>
@endpush

