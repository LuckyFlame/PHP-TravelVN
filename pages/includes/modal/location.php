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

<!-- End Edit Location -->

<!-- View Location -->

<!-- End View Location -->