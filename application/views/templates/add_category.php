<style>
    .outer {
        display: table;
        position: fixed;
        height: 100%;
        width: 100%;
        display: none;
        text-align: center;
        z-index: 9999;
    }
    .add-category-outer{
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
        padding: 26px;
        float: none;
        background: #ffffff;
        border-radius: 10px;
    }


    .optionGroup {
        font-weight: bold;
    }

    .optionChild {
        padding-left: 15px;
        margin-left: 15px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.close-btn').click(function () {
            //alert(".image-view-" + id);
            $(".add-category-outer").css('display', 'none');
        });
        $('#parent_id').change(function(){ 
            id = $( "#parent_id option:selected" ).val();
            $( "#in_parent_category" ).val(id);
        });
    });
</script>
<div class="outer add-category-outer">
    <div class="middle">
        <div class="inner col-md-4 col-sm-12 col-xs-12" style="
             ">
            <form class="search-form" action="index.php/home/addCategory" method="post" accept-charset="utf-8" style="width: 100%;">
                <img class="detail-gallery-item-img close-btn" src="<?php echo base_url()?>/assets/images/icon/close.png" style="
                     position: absolute;
    top: -16px;
    width: 30px;
    height: 30px;
    right: -14px;
                     ">
                <h4 style="color: #a6a6a6;">New Category</h4>


                <p>Name</p>

                <input type="text" style="
                       float: left;
                       width: 100%;
                       " placeholder="Category name" name="name">
                <p>Parent category</p>
                <input type="hidden" placeholder="Category name" name="in_parent_category" id="in_parent_category">
                <select id="parent_id" style="
                        width: 100%;
                        height: 30px;
                        " name="parent_id">
                    <option value="0" class="optionGroup">Root</option>
                    <?php echo $categoryCom?>
                </select>
                <div class="wrap text-center" style="
                     margin-top: 20px;
                     ">
                    <input class="btn btn-primary" style="
                           width: 60%;
                           " value="Save" type="submit"/>
                </div>  
            </form>

        </div>
    </div>
</div>