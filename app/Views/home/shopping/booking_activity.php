<?= $this->extend('front/template_home') ?>

<?= $this->section('content') ?>

<section style="min-height: 80vh;">
    <div class="container">
        <div class="row bg-white border rounded-4 shadow-lg p-5 my-5">
            <div class="col-12 border-bottom border-dark pb-3 mb-4 text-center">
                <h2 class="fw-semibold"><?= lang('home.booking-activity') ?></h2>
            </div>

            <div class="col-12">

                <?php
                if (!empty($bookings)):

                    $grandTotal = 0;
                    foreach ($bookings as $booking):

                        $start_date = date('H:i d/m/Y', strtotime($booking['start_datetime']));
                        $end_date = date('H:i d/m/Y', strtotime($booking['end_datetime']));


                        $price = !empty($booking['price']) ? $booking['price'] : '0';
                        $total = $booking['count'] * $price;
                        $grandTotal += $total;
                        $priceText = number_format($total) . ' บาท';

                        ?>

                        <div class="d-flex justify-content-between border-bottom border-dark bg-green-white p-4">
                            <div>
                                <p class="fs-4"><span class="fs-4 text-green fs-500">ชื่อกิจกรรม :</span>
                                    <?= $booking['name_activity'] ?></p>
                                <p class="fs-5"><span class="fs-5 text-green fs-500">ประเภทกิจกรรม :</span>
                                    <?= $booking['name_category'] ?></p>
                                <p class="fs-5"><span class="fs-5 text-green fs-500">จำนวนคน :</span>
                                    <?= $booking['count'] ?>
                                </p>
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
                                    class="fs-5"><?= $start_date . ' - ' . $end_date ?></span>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <div class="text-green fs-4 mt-4">ราคารวมทั้งหมด : <?= number_format($grandTotal) . ' บาท' ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>