<script type="text/javascript">

    $(document).ready(function () {
        $('.detail-gallery-item-img-<?php echo $value['id'] ?>').click(function () {
            $(".image-view-<?php echo $value['id'] ?>").css('display', 'table');
        });
    });
</script>
<?php
$image_path = $value['image_path'];
if (!@getimagesize($value['image_path']))
    $image_path = base_url() . 'assets/images/icon/no_image_large.png';
else
    $image_path = $value['image_path'];

$data['image_path'] = $image_path;
?>
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img class="detail-gallery-item-img detail-gallery-item-img-<?php echo $value['id'] ?>" src="<?php echo $image_path ?>" alt="<?php echo $value['id'] ?>">

    </div> 
</div>
<?php
$data['value'] = $value;
$this->load->view('templates/image_view', $data);
?>