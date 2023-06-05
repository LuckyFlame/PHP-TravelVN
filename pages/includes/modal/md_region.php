<!-- Create Region -->
<div class="modal fade" id="createModalRegion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/region" id="form-create-region" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="region" id="ip_create_region_region">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Phần Ký Tự</label>
                        <input type="text" class="form-control" name="acronym" id="ip_create_region_acronym">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tọa Độ</label>
                        <input type="text" class="form-control" name="coordinates" id="ip_create_region_coordinates">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-region-create" id="_tmce-content-region-create"></textarea>
                        <textarea name="content" id="ip_create_region_content" rows="4" class="form-control _getTmce-content-region-create" hidden></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="ip_create_region_submit" name="action" value="create_region" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Region -->
<div class="modal fade" id="updateModalRegion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/region" id="form-update-region" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" id="ip_update_region_id">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="region" id="ip_update_region_region">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Phần Ký Tự</label>
                        <input type="text" class="form-control" name="acronym" id="ip_update_region_acronym">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tọa Độ</label>
                        <input type="text" class="form-control" name="coordinates" id="ip_update_region_coordinates">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-region-update" id="_tmce-content-region-update"></textarea>
                        <textarea name="content" id="ip_update_region_content" rows="4" class="form-control _getTmce-content-region-update" hidden></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="ip_update_region_submit" name="action" value="update_region" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Region -->
<div class="modal fade" id="viewModalRegion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/region" id="form-view-region" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem Thông Tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" id="ip_view_region_id" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <input type="text" class="form-control" name="region" id="ip_view_region_region" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Phần Ký Tự</label>
                        <input type="text" class="form-control" name="acronym" id="ip_view_region_acronym" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tọa Độ</label>
                        <input type="text" class="form-control" name="coordinates" id="ip_view_region_coordinates" readonly>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea name="content" rows="4" class="form-control _tmce-content-region-view" id="ip_view_region_content"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Tạo</label>
                        <input type="text" class="form-control" name="create_at" id="ip_view_region_create_at" value="" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Cập Nhật</label>
                        <input type="text" class="form-control" name="update_at" id="ip_view_region_update_at" value="" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>