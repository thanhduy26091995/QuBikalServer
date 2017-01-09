<script type="text/javascript">

    $(document).ready(function () {
        $('.detail-gallery-item-img-<?php echo $$keysub ?>').click(function () {
            $(".image-view-<?php echo $keysub ?>").css('display', 'table');
        });
    });
</script>
<?php
$image_path = "http://vignette3.wikia.nocookie.net/hunterxhunter/images/6/6d/No_image.png/revision/latest?cb=20120417110152";
if(array_key_exists('imagelink',$value)){
    $image_path = $value['imagelink'];
}
/*
if(array_key_exists('images',$value)){
    foreach ($value['images'] as $keyimg => $valueimg) {
        $image_path = $valueimg['imagelink'];
        break;
    }
}
*/
/*if (!@getimagesize($value['image_path']))
    $image_path = base_url() . 'assets/images/icon/no_image.png';
else
    $image_path = base_url() . $image_path;*/
$data['image_path'] = $image_path;
?>
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img class="detail-gallery-item-img detail-gallery-item-img-3" src="<?php echo $image_path ?>" alt="" >

    </div>              
</div>
<?php
$data['value'] = $value;
$data['id'] = $keysub;
//var_dump($data);
$this->load->view('templates/image_view', $data);
?>