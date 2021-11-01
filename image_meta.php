<?php
$exif = exif_read_data(__DIR__.'/images/'.$req_imgfname);
?>

<div class="item-image">
    <img src="/images/<?=$req_imgfname?>">
</div>

<ul>
<?php foreach ($exif as $k => $v): ?>
    <li><strong><?=$k?>:</strong> <?=$v?></li>
<?php endforeach ?>
</ul>
