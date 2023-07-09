<!-- Create Location -->
<div class="modal fade" id="AddModalLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_location" id="form-create-location" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <div id="leaflet-map-create-location" class="map"></div>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="area">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ký Tự</label>
                        <input type="text" class="form-control" name="acronym">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thành Phố</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-create-location" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Create Location -->

<!-- Edit Location -->
<div class="modal fade" id="EditModalLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_location" id="form-edit-location" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <div id="leaflet-map-edit-location" class="map"></div>
                    </div>
                    <div class="field-modal d-none">
                        <label class="form-label">Mã</label>
                        <input type="text" class="form-control" name="id" id="single-edit-id-location">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="area" id="single-edit-area-location">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ký Tự</label>
                        <input type="text" class="form-control" name="acronym" id="single-edit-acronym-location">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thành Phố</label>
                        <input type="text" class="form-control" name="city" id="single-edit-city-location">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-edit-location" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Location -->

<!-- View Location -->
<div class="modal fade" id="DetailModalLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_location" id="form-detail-location" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem Thông Tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Mã</label>
                        <input type="text" class="form-control" name="id" id="single-detail-id-location" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="area" id="single-detail-area-location" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ký Tự</label>
                        <input type="text" class="form-control" name="acronym" id="single-detail-acronym-location" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thành Phố</label>
                        <input type="text" class="form-control" name="city" id="single-detail-city-location" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Tạo</label>
                        <input type="text" class="form-control" name="city" id="single-detail-create-at-location" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Cập Nhật</label>
                        <input type="text" class="form-control" name="city" id="single-detail-update-at-location" readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End View Location -->