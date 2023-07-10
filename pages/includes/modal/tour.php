<!-- Create Tour -->
<div class="modal fade" id="AddModalTour" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../pages/main/ad_tour" id="form-create-tour" class="form form-modal-design" enctype="multipart/form-data">
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
                        <label class="form-label">Giá Tiền</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Người Lớn</label>
                        <input type="text" class="form-control" name="pr_persons">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Trẻ Em</label>
                        <input type="text" class="form-control" name="pr_childrens">
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
                        <label class="form-label">Nội Dung</label>
                        <textarea id="tinymce-content-tour-create" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="content" id="gettinymce-content-tour-create" hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Ngày</label>
                        <input type="text" class="form-control" name="days">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Chỗ</label>
                        <input type="text" class="form-control" name="num_of_seat">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <select name="location" id="select2-location-tour-create" class="form-control select2bs4">
                            <option value=""></option>
                            <?php 
                            
                                foreach($list_location as $_list_location) {
                                    ?>
                                        <option data-select-id="<?php echo $_list_location["id"] ?>" value="<?php echo $_list_location["area"] ?>">
                                            <?php echo $_list_location["area"] ?>
                                        </option>

                                    <?php
                                }
            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="action" value="submit-create-tour" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Tour -->