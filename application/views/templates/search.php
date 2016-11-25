<?php $this->load->view('templates/header'); ?>
<!--========================================================
                          HEADER
=========================================================-->
<header>  
    <div class="container top-sect">
        <div class="container" style="
             text-align: center;
             padding: 30px;
             "> 
            <div class="row"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/icon/logo.png" alt="logo" style="
                                                                     width: 6%;
                                                                     "></a></div><div class="row">
                <form class="search-form" action="search" method="post" accept-charset="utf-8" style="width: 60%;">
                    <label class="search-form_label">
                        <input id="keyword" class="search-form_input" type="text" name="keyword" autocomplete="off" placeholder="Enter's keyword">
                        <span class="search-form_liveout"></span>
                    </label>
                    <input class="search-form_submit" type="submit" value="">
                </form>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('a[href="#search-account"]').click(function () {
                        var bla = $('#keyword').val();
                        if (bla == '')
                            bla = '-';
                        //alert('<?php echo base_url() . 'index.php/home/search/' ?>' + bla + '/account');
                        window.location.href = '<?php echo base_url() . 'index.php/home/search/' ?>' + bla + '/account';
                    });
                });
                $(document).ready(function () {
                    $('a[href="#search-photo"]').click(function () {
                        var bla = $('#keyword').val();
                        if (bla == '')
                            bla = '-';
                        //alert('<?php echo base_url() . 'index.php/home/search/' ?>' + bla + '/account');
                        window.location.href = '<?php echo base_url() . 'index.php/home/search/' ?>' + bla + '/photo';
                    });
                });
            </script>
            <div class="row"><div class="wrap text-center">
                    <a href="#search-account" class="search-photo btn <?php
                    if ($search_mode == 'account')
                        echo 'btn-active';
                    else
                        echo 'btn-primary';
                    ?>" style="min-width: 19%;">Search Accounts </span></a>
                    <a href="#search-photo" class="btn <?php
                    if ($search_mode == 'photo')
                        echo 'btn-active';
                    else
                        echo 'btn-primary';
                    ?>" style="    min-width: 19%;">Search Photos </span></a>
                </div></div>
        </div>
    </div>
</header>

<!--========================================================
                          CONTENT
=========================================================-->

<main>        

    <?php $this->load->view('gallery/search_gallery'); ?>
    <style type="text/css">
        .text-center-2{
            margin-left:34px;
            margin-right: 48px !important;
        }
        .row{
            margin-left:32px;
            margin-right:32px;
        }
    </style>
    <section class="well well3 parallax" data-url="images/parallax1.jpg" data-mobile="
             true" data-speed="0.9">
        <div class="container">
            <div class="wrap text-center">
                <a href="<?php echo base_url() . 'index.php/home/search' ?>" class="btn btn-active">Search </a>
                <a href="<?php echo base_url() ?>" class="btn btn-primary">Home </a>
            </div>  
        </div>        
    </section>



</main>
<?php $this->load->view('templates/footer'); ?>