<!-- Create Event -->
<div class="modal fade" id="AddModelEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_event" id="form-create-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 1</label>
                        <input type="file" class="form-control h-auto" name="thumbnail">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 2</label>
                        <input type="file" class="form-control h-auto" name="images">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea id="tinymce-header-event-create" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="header" id="gettinymce-header-event-create" hidden="true"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-event-create" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="content" id="gettinymce-content-event-create" hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <select name="category[]" id="select2-category-event-create" class="form-control select2bs4" multiple="multiple" aria-readonly="">
                            <?php 
                            
                                foreach($list_category as $_list_category) {
                                    ?>

                                        <option data-select-id="<?php echo $_list_category["id"] ?>" value="<?php echo $_list_category["category"] ?>">
                                            <?php echo $_list_category["category"] ?>
                                        </option>

                                    <?php
                                }
            
                            ?>
                        </select>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="datepicker-date-event-create" class="form-control datepicker1" name="date" readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-create-event" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Event -->

<!-- Edit Event -->
<div class="modal fade" id="EditModelEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_event" id="form-edit-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Mã</label>
                        <input type="text" class="form-control" name="id" id="single-edit-id-event">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="single-edit-title-event">
                    </div>
                    <div class="field-modal">
                        <div class="d-flex align-items-end justify-content-between">
                            <label class="form-label">Hình Ảnh 1</label>
                            <img class="mt-2 mb-2" id="upload-edit-thumbnail-event" src="" alt="" width="100" height="75">
                        </div>
                        <input type="file" class="form-control h-auto" name="thumbnail" id="single-edit-thumbnail-event">
                    </div>
                    <div class="field-modal">
                        <div class="d-flex align-items-end justify-content-between">
                            <label class="form-label">Hình Ảnh 2</label>
                            <img class="mt-2 mb-2" id="upload-edit-images-event" src="" alt="" width="100" height="75">
                        </div>
                        <input type="file" class="form-control h-auto" name="images" id="single-edit-images-event">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea id="tinymce-header-event-edit" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="header" id="gettinymce-header-event-edit" hidden="true"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-event-edit" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="content" id="gettinymce-content-event-edit" hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <select name="category[]" id="select2-category-event-edit" class="form-control select2bs4" multiple="multiple" aria-readonly="">
                            <?php 
                            
                                foreach($list_category as $_list_category) {
                                    ?>

                                        <option data-select-id="<?php echo $_list_category["id"] ?>" value="<?php echo $_list_category["category"] ?>">
                                            <?php echo $_list_category["category"] ?>
                                        </option>

                                    <?php
                                }
            
                            ?>
                        </select>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="datepicker-date-event-edit" class="form-control datepicker1" name="date" readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-edit-event" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Event -->

<!-- View Event -->
<div class="modal fade" id="DetailModelEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_event" id="form-detail-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem Thông Tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Mã</label>
                        <input type="text" class="form-control" name="id" id="single-detail-id-event" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="single-detail-title-event" readonly="true">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-modal">
                                <label class="form-label d-block">Hình Ảnh 1</label>
                                <img id="upload-detail-thumbnail-event" src="" alt="" width="100" height="75">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-modal">
                                <label class="form-label d-block">Hình Ảnh 2</label>
                                <img id="upload-detail-images-event" src="" alt="" width="100" height="75">
                            </div>
                        </div>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea id="tinymce-header-event-detail" rows="4" class="form-control tinymce"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-event-detail" rows="4" class="form-control tinymce"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Thể Loại</label>
                        <textarea rows="4" id="select2-category-event-detail" class="form-control" name="category" readonly="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="datepicker-date-event-detail" class="form-control datepicker1" name="date" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Tạo</label>
                        <input type="text" class="form-control" name="create_at" id="single-detail-create-at-event" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Cập Nhật</label>
                        <input type="text" class="form-control" name="update_at" id="single-detail-update-at-event" readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End View Event -->