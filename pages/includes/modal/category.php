<!-- Create Category -->
<div class="modal fade" id="AddModelCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_category" id="form-create-category" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-category-create" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="content" id="gettinymce-content-category-create" hidden="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-create-category" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Category -->

<!-- Edit Category -->
<div class="modal fade" id="EditModelCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_category" id="form-edit-category" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Hide Id -->
                    <div class="field-modal d-none">
                        <label class="form-label">Mã</label>
                        <input type="text" class="form-control" name="id" id="single-edit-id">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <input type="text" class="form-control" name="category" id="single-edit-category">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-category-edit" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="content" id="gettinymce-content-category-edit" hidden="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-edit-category" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Category -->