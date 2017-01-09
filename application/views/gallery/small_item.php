<?php
//$image_path = $configutil->getFirstImage($value['id']);
$image_path = "";
$countImgs = 0;
if (array_key_exists('images',$value)) {
    $countImgs = count($value['images']);
    foreach ($value['images'] as $keyImg => $valueImg) {
        if ($keyImg != null && $valueImg != null) {
            if (array_key_exists('imagelink',$valueImg)) {
                $image_path = $valueImg['imagelink'];
                break;
            }
        }
    }
}

if (array_key_exists('subcategories',$value)) {
    foreach ($value['subcategories'] as $valueSub) {
        if (array_key_exists('images',$valueSub)) {
            $countImgs += count($valueSub['images']);
            if ($image_path == "") {
                if (count($valueSub['images']) > 0) {
                    foreach ($valueSub['images'] as $thumbnailImg) {
                        $image_path = $thumbnailImg['imagelink'];
                        break;
                    }                    
                }
            }
        }
    }
}

if ($image_path == "") {
    $image_path = "http://vignette3.wikia.nocookie.net/hunterxhunter/images/6/6d/No_image.png/revision/latest?cb=20120417110152";
}
//var_dump($value);
//if (!file_exists($image_path))
//    $image_path = base_url() . 'assets/images/icon/no_image.png';
//else
//    $image_path = base_url() . $image_path;

$photo_count = $countImgs;//$configutil->getTotalImage($value['id']);

?>
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img src="<?php echo $image_path ?>" alt="" class="detail-gallery-item-img">
        <div class="caption bg2">
            <div class="wrap">
                <img src="<?php echo base_url() ?>assets/images/icon/category_icon.png" alt="" class="gallery-item">
                <p>
                    <?php  if (array_key_exists('category',$value)) {
                        echo $value['category'];
                    }
                    else{
                        //var_dump($value['category']);
                        echo "None caption";
                    } ?>
                </p>
                <a href="<?php if (!$parentcategory) {
                   echo base_url() . 'index.php/home/index/' . $categorykey ?>"class="btn-link fa-angle-right">
                   <?php } ?>
                <?php
                if ($parentcategory){
                    echo base_url() . 'index.php/home/index/' .$parentcategory."/". $categorykey ?>" class="btn-link fa-angle-right">
                <?php } ?>
                    <?php echo $photo_count; ?> photos</a>
            </div>  
        </div>
    </div>              
</div>