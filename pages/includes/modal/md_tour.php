<!-- Create Tour -->
<div class="modal fade" id="createModalTour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../admin/tour" id="form-create-tour" class="form form-modal-design" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" class="form-control" name="title" id="ip_create_tour_title">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 1</label>
                        <input type="file" class="form-control h-auto" name="images" id="ip_create_tour_images">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 2</label>
                        <input type="file" class="form-control h-auto" name="thumbnail" id="ip_create_tour_thumbnail">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Tiền</label>
                        <input type="text" class="form-control h-auto" name="price" id="ip_create_tour_price">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Người Lớn</label>
                        <input type="text" class="form-control h-auto" name="price_persons" id="ip_create_tour_price_persons">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Trẻ Em</label>
                        <input type="text" class="form-control h-auto" name="price_childrens" id="ip_create_tour_price_childrens">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Chỗ Ngồi</label>
                        <input type="text" class="form-control h-auto" name="number_of_seat" id="ip_create_tour_number_of_seat">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Ngày</label>
                        <input type="text" class="form-control h-auto" name="days" id="ip_create_tour_days">
                    </div>
                    <div class="field-modal-textarea">
                        <label class="form-label">Nội Dung</label>
                        <textarea rows="4" class="form-control tinymce _tmce-content-tour-create" id="_tmce-content-tour-create"></textarea>
                        <textarea name="content" id="ip_create_tour_content" rows="4" class="form-control _getTmce-content-tour-create" hidden></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="ip_create_tour_submit" name="action" value="create_tour" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>