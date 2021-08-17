<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <label for="input_customer_sex">เพศ</label>
                    <input type="text" class="form-control" id="input_customer_sex">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" onclick="update_customer()">บันทึก</button>
            </div>
        </div>
    </div>
</div>