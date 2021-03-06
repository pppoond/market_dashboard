<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไข</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pb-3">
                    <img src="" id="image_from_customer_url" width="50%">
                </div>
                <div class="pb-3">
                    <label for="input_customer_id">ID</label>
                    <input type="text" class="form-control" id="input_customer_id" disabled>
                </div>
                <div class="pb-3">
                    <label for="input_customer_username">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" id="input_customer_username">
                </div>
                <div class="pb-3">
                    <label for="input_customer_password">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="input_customer_password">
                </div>
                <div class="pb-3">
                    <label for="input_customer_name">ชื่อ</label>
                    <input type="text" class="form-control" id="input_customer_name">
                </div>

                <div class="pb-3">
                    <label for="input_customer_phone">มือถือ</label>
                    <input type="number" class="form-control" id="input_customer_phone">
                </div>
                <div class="pb-3">
                    <label for="input_customer_phone">เพศ</label>
                    <select class="custom-select custom-select-sm" id="input_customer_sex">

                        <option value="1">ชาย</option>
                        <option value="2">หญิง</option>
                        <option value="3">อื่นๆ</option>
                    </select>
                </div>
                <div class="pb-3">
                    <label for="input_customer_profile_image">โปรไฟล์</label>
                    <input type="text" class="form-control" id="input_customer_profile_image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" onclick="confirmUpdateCustomer()">บันทึก</button>
            </div>
        </div>
    </div>
</div>