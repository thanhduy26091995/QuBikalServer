<script type="text/javascript">

    $(document).ready(function () {
        $('.detail-gallery-item-img-<?php echo $value['id'] ?>').click(function () {
            $(".image-view-<?php echo $value['id'] ?>").css('display', 'table');
        });
    });
</script>
<?php
$image_path = $configutil->getFirstImage($value['id']);
if (!file_exists($image_path))
    $image_path = base_url() . 'assets/images/icon/no_image.png';
else
    $image_path = base_url() . $image_path;
$data['image_path'] = $image_path;
?>
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img class="detail-gallery-item-img detail-gallery-item-img-<?php echo $value['id'] ?>" src="<?php echo $image_path ?>" alt="" >

    </div>              
</div>
<?php
$data['value'] = $value;
$this->load->view('templates/image_view', $data);
?>