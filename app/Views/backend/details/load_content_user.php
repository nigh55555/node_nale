<div class="fs-4 mx-4 text-gray-800 "><?= lang('backend.users') ?></div>

<div class="row m-4">

    <div class="card shadow ">
        <!-- <p class="mb-0"><?= lang("profile.dont'have-an-account") ?><a href="<?= base_url('/register') ?>"
                class="fw-bold ms-1"><?= lang('profile.sign-up') ?></a>
        </p> -->

        <div class="card-body mt-4">
            <!-- <button type="button" class="btn btn-primary" onclick="btnCreateCategory()"
                style="float: inline-end;"><?= lang('backend.add-users') ?></button> -->
            <div class="table-responsive">
                <table class="table table-striped" id="my_users" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" width="10%">ลำดับ</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">เบอรโทรศัพท์</th>
                            <th class="text-center">วันเดือนปีเกิด</th>
                           
                            <!-- <th width="10%"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($members as $member) {
                            $timestamp = strtotime($member['birthdate']);
                            $member['birthdate'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);
                            echo '<tr>
                                    <td>' . $n . '</td>
                                    <td>' . $member['gender'] . $member['first_name'] . ' ' . $member['last_name'] . '</td>
                                    <td>' . $member['username'] . '</td>
                                    <td>' . $member['email'] . '</td>
                                    <td>' . $member['tel'] . '</td>
                                    <td>' . $member['birthdate'] . '</td>
                                </tr>';
                            $n++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<script>
    new DataTable('#my_users', {
        "language": {
            "sProcessing": "กำลังดำเนินการ...",
            "sLengthMenu": "แสดง _MENU_ รายการ",
            "sZeroRecords": "ไม่พบข้อมูล",
            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
            "sInfoPostFix": "",
            "sSearch": "ค้นหา:",
            "sUrl": "",
            // "oPaginate": {
            //     "sFirst":    "หน้าแรก",
            //     "sPrevious": "ก่อนหน้า",
            //     "sNext":     "ถัดไป",
            //     "sLast":     "หน้าสุดท้าย"
            // }
        }
    });

    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

</script>