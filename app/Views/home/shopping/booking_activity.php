<?= $this->extend('front/template_home') ?>

<?= $this->section('content') ?>

<section style="min-height: 80vh;">
    <div class="container">
        <div class="row bg-white border rounded-4 shadow-lg p-5 my-5">
            <div class="col-12 border-bottom border-dark pb-3 mb-4 text-center">
                <h2 class="fw-semibold"><?= lang('home.booking-activity') ?></h2>
            </div>

            <div class="col-12 mt-4">

                <?php
                if (!empty($bookings)):
                    foreach ($bookings as $booking):

                        $start_date = new DateTime($booking['start_datetime'], new DateTimeZone('UTC'));
                        $start_date->setTimezone(new DateTimeZone('Asia/Bangkok'));

                        $end_date = new DateTime($booking['end_datetime'], new DateTimeZone('UTC'));
                        $end_date->setTimezone(new DAteTimeZone('Asia/Bangkok'));

                        $priceText = !empty($booking['price']) ? number_format($booking['price']) . ' บาท' : '0 บาท';
                        ?>

                        <div class="d-flex justify-content-between border-bottom border-dark bg-green-white p-4">
                            <div>
                                <p class="fs-4"><span class="fs-4 text-green fs-500">ชื่อกิจกรรม :</span> <?= $booking['name_activity'] ?></p>
                                <p class="fs-5"><span class="fs-5 text-green fs-500">ประเภทกิจกรรม :</span> <?= $booking['name_category'] ?></p>
                                <p class="fs-5"><span class="fs-5 text-green fs-500">ราคา :</span> <?= $priceText ?></p>
                                <p class="fs-5 text-green fs-500">สถานะ :
                                    <?php
                                    if ($booking['status'] == 'approve') {
                                        echo lang('backend.approve');
                                    } else if ($booking['status'] == 'reject') {
                                        echo lang('backend.reject');
                                    } else {
                                        echo lang('backend.padding');
                                    }
                                    ?>
                                </p>
                            </div>
                            <div>
                                <span
                                    class="fs-5"><?= $start_date->format('H:i d/m/Y') . ' - ' . $end_date->format('H:i d/m/Y') ?></span>
                            </div>
                        </div>

                        <?php
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>