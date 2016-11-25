<?php
$image_path = $configutil->getFirstImage($value['id']);
if (!file_exists($image_path))
    $image_path = base_url() . 'assets/images/icon/no_image_large.png';
else
    $image_path = base_url() . $image_path;

$photo_count = $configutil->getTotalImage($value['id']);
?>
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img src="<?php echo $image_path ?>" alt="" class="detail-gallery-item-img">
        <div class="caption bg2">
            <div class="wrap">
                <img src="<?php echo base_url() ?>assets/images/icon/category_icon.png" alt="" class="gallery-item gallery-large">
                <p>
                    <?php echo $value['name'] ?>
                </p>
                <a href="<?php echo base_url() . 'index.php/home/index/' . $value['id'] ?>" class="btn-link fa-angle-right">
                    <?php echo $photo_count; ?> photos</a>
            </div> 
        </div>
    </div> 
</div>