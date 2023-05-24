<!-- Create Event -->
<div class="modal fade" id="createModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/event" id="form-create-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="ip_create_event_title">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 1</label>
                        <input type="file" class="form-control h-auto" name="images" id="ip_create_event_images">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 2</label>
                        <input type="file" class="form-control h-auto" name="thumbnail" id="ip_create_event_thumbnail">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea rows="4" class="form-control tinymce _tmce-header-event-create" id="_tmce-header-event-create"></textarea>
                        <textarea name="header" id="ip_create_event_header" rows="4" class="form-control _getTmce-header-event-create" hidden></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-event-create" id="_tmce-content-event-create"></textarea>
                        <textarea name="content" id="ip_create_event_content" rows="4" class="form-control _getTmce-content-event-create" hidden></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <select name="category[]" id="ip_create_event_category" class="form-control select2bs4" multiple="multiple" style="width: 100%; height: auto;" aria-readonly="">
                            <?php 

                            foreach($listCategory as $_listCategory) {
                                ?>
                                    <option data-select-id="<?php echo $_listCategory["id"]; ?>" value="<?php echo $_listCategory["category"] ?>"><?php echo $_listCategory["category"] ?></option>                                
                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="ip_create_event_date" class="form-control input-datepicker" name="date" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="ip_create_event_submit" name="action" value="create_event" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Event -->
<div class="modal fade" id="updateModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/event" id="form-update-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" id="ip_update_event_id">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="ip_update_event_title">
                    </div>
                    <div class="field-modal">
                        <div class="d-flex align-items-end justify-content-between">
                            <label class="form-label">Hình Ảnh 1</label>
                            <img class="mt-2 mb-2" id="img_update_event_images" alt="" width="100" height="75">
                        </div>
                        <input type="file" class="form-control h-auto" name="images" id="ip_update_event_images">
                    </div>
                    <div class="field-modal">
                        <div class="d-flex align-items-end justify-content-between">
                            <label class="form-label">Hình Ảnh 2</label>
                            <img class="mt-2 mb-2" id="img_update_event_thumbnail" alt="" width="100" height="75">
                        </div>
                        <input type="file" class="form-control h-auto" name="thumbnail" id="ip_update_event_thumbnail">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea rows="4" class="form-control tinymce _tmce-header-event-update" id="_tmce-header-event-update"></textarea>
                        <textarea name="header" id="ip_update_update_header" rows="4" class="form-control _getTmce-header-event-update" hidden></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-event-update" id="_tmce-content-event-update"></textarea>
                        <textarea name="content" id="ip_update_event_content" rows="4" class="form-control _getTmce-content-event-update" hidden></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <select name="category[]" id="ip_update_event_category" class="form-control select2bs4" multiple="multiple" style="width: 100%; height: auto;" aria-readonly="">
                            <?php 

                            foreach($listCategory as $_listCategory) {
                                ?>
                                    <option data-select-id="<?php echo $_listCategory["id"]; ?>" value="<?php echo $_listCategory["category"] ?>"><?php echo $_listCategory["category"] ?></option>                                
                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="ip_update_event_date" class="form-control input-datepicker" name="date" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="ip_update_event_submit" name="action" value="update_event" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Event -->
<div class="modal fade" id="viewModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/event" id="form-view-event" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem Thông Tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" id="ip_view_event_id" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="ip_view_event_title" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-modal">
                                <label class="form-label d-block">Hình Ảnh 1</label>
                                <img class="" id="img_view_event_images" alt="" width="100" height="75">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-modal">
                                <label class="form-label d-block">Hình Ảnh 2</label>
                                <img class="" id="img_view_event_thumbnail" alt="" width="100" height="75">
                            </div>
                        </div>
                    </div>

                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Đầu</label>
                        <textarea rows="4" class="form-control tinymce _tmce-header-event-view" id="_tmce-header-event-view"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Phần Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-event-view" id="_tmce-content-event-view"></textarea>
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Thể Loại</label>
                        <textarea rows="4" id="ip_view_event_category" class="form-control" name="category" readonly></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="ip_view_event_date" class="form-control input-datepicker" name="date" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Tạo</label>
                        <input type="text" class="form-control" name="create_at" id="view_create_at_event" value="" readonly>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Cập Nhật</label>
                        <input type="text" class="form-control" name="update_at" id="view_update_at_event" value="" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>