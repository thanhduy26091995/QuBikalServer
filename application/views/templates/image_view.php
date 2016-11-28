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
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.close-<?php echo $value['id']?>').click(function () {
            id = <?php echo $value['id']?>;
            //alert(".image-view-" + id);
            $(".image-view-<?php echo $value['id']?>").css('display', 'none');
        });
    });
</script>
<div class="outer image-view_outer image-view-<?php echo $value['id']?>">
    <div class="middle">
        <div class="inner col-md-8 col-sm-12 col-xs-12" style="
             ">
            <form class="search-form" action="addCategory" method="post" accept-charset="utf-8" >
                <img class=" close-<?php echo $value['id']?>" src="<?php echo base_url() . 'assets/' ?>images/icon/close.png" style="
                     position: absolute;
                     cursor: pointer;
                     top: -14px;
                     width: 5%;
                     height: 34px;
                     right: -4px;
                     ">
                <h4 style="color: #a6a6a6; margin-bottom: 20px;"><?php echo $value['name'] ?></h4>
                <img src="<?php echo $image_path ?>">

                <p style="padding-top: 20px; padding-bottom: 20px;"><?php echo $value['description'] ?></p>

            </form>

        </div>
    </div>
</div>