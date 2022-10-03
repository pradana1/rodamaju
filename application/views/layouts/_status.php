<?php

if ($status == 'waiting') {
    $badge_status   = 'badge-primary';
    $status         = 'Belum Melakukan DP';
}

if ($status == 'paid') {
    $badge_status   = 'badge-secondary';
    $status         = 'Sudah DP / Dikerjakan Sebagian';
}

if ($status == 'done') {
    $badge_status   = 'badge-success';
    $status         = 'Selesai Dikerjakan';
}

if ($status == 'cancel') {
    $badge_status   = 'badge-danger';
    $status         = 'Dibatalkan';
}

?>

<?php if ($status) : ?>
    <span class="badge badge-pill <?= $badge_status ?>"><?= $status  ?></span>
<?php endif ?>