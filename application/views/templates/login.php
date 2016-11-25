<?php
$this->load->view('templates/header');
?>
<main>        

    <section class="well well1 bg1">  
        <div class="container center991">
            <div class="container top-sect" style="
                 height: 100%;
                 ">

                <div class="container" style="
                     text-align: center;
                     padding: 30px;
                     ">


                    <div class="row" style="
                         margin-bottom: 100px;
                         "><img src="<?php echo base_url() ?>assets/images/icon/logo.png" alt="logo" style="
                           width: 6%;
                           "></div>
                    <div class="row">
                        <?php if ($this->session->userdata('instagram-token')) { ?>
                        <a href="<?php echo base_url();?>" class="btn btn-primary" style=" margin-right: 0px !important;">
                                You've logined
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo $this->instagram_api->instagram_login().'basic+likes'; ?>" class="btn btn-primary" style=" margin-right: 0px !important;">
                                Login with instagram 
                            </a>
                        <?php } ?>

                    </div>
                    <div class="row" style="
                         margin-top: 10px;
                         ">
                        <p style="
                           font-size: 14px;
                           ">By singing up, you agree to our</p>
                        <p style="
                           font-weight: bold;
                           color: black;
                           ">Terms &amp; Privacy Policy</p>
                    </div>
                    <div class="row text-center" style="
                         text-align: center;
                         ">
                        <img src="<?php echo base_url() ?>assets/images/icon/devide.png" style="
                             cursor: pointer;
                             border-top: 1px solid #e0e0e0;
                             ">
                        <p style="
                           font-size: 14px;
                           padding-bottom: 20px;
                           ">Get the app</p>
                        <img src="<?php echo base_url() ?>assets/images/icon/app_store.png" style="
                             width: 13.7%; cursor: pointer;
                             ">
                        <img src="<?php echo base_url() ?>assets/images/icon/goo_store.png" style="
                             width: 14%; cursor: pointer;
                             ">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$this->load->view('templates/footer');
?>