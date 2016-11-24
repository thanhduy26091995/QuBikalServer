<script type="text/javascript">
    
    $(document).ready(function () {
        $('.add-category-img').click(function () {
            $(".add-category-outer").css('display','table');
        });
    });
</script>
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail thumb-shadow">
        <img class="add-category-img detail-gallery-item-img" src="<?php echo base_url() ?>assets/images/icon/add_category_background.png" alt="">

    </div>              
</div>
<?php 
$this->load->view('templates/add_category'); ?>