<!-- Create Category -->
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