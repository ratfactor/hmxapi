<?php
$exif = exif_read_data(__DIR__.'/static/'.$req_imgfname);
?>

<div class="item-image">
    <img src="/static/<?=$req_imgfname?>">
</div>

<ul>
<?php foreach ($exif as $k => $v): if(is_array($v)){continue;} ?>
    <li><strong><?=$k?>:</strong> <?=$v?></li>
<?php endforeach ?>
</ul>
