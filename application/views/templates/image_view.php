<style>
    .outer {
        display: table;
        position: fixed;
        height: 100%;
        display: none;
        width: 100%;
        text-align: center;
        z-index: 9999;
    }
    .image-view_outer{
        top:0px;
        left: 0px;
    }
    .middle {
        display: table-cell;
        vertical-align: middle;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
        float: none;
        background: #ffffff;
        border-radius: 10px;
    }
@media (max-width: 991px)
{
.pop-up{
height: 200px !important;
}
.inner{
width:27%;
}
.close-custom{
top:-4px !important;
height: 12px !important;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.close-<?php echo $id?>').click(function () {
            id = <?php echo $id?>;
            //alert(".image-view-" + id);
            $(".image-view-<?php echo $id?>").css('display', 'none');
        });
    });
</script>
<div class="outer image-view_outer image-view-<?php echo $id?>">
    <div class="middle">
        <div class="inner col-md-4 col-sm-12 col-xs-12" style="
             ">
            <form class="search-form" action="addCategory" method="post" accept-charset="utf-8" style="width: 100%;">
                <img class="close-custom detail-gallery-item-img close-<?php echo $id?>" src="<?php echo base_url() . 'assets/' ?>images/icon/close.png" style="
                     position: absolute;
                         top: -14px;
    width: 5%;
    height: 18px;
                     right: -4px;
                     ">
                <h4 style="color: #a6a6a6; margin-bottom: 20px;"><?php echo $value['imagekey'] ?></h4>
                <img class="pop-up" src="<?php echo $image_path ?>" style="width: 100%;">

                <p style="padding-top: 20px; padding-bottom: 20px;"><?php echo $value['imagekey'] ?></p>

            </form>

        </div>
    </div>
</div>