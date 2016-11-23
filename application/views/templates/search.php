<?php $this->load->view('templates/header');?>
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container top-sect">
        <div class="container" style="
    text-align: center;
    padding: 30px;
">
          
          
<div class="row"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>assets/images/icon/logo.png" alt="logo" style="
    width: 6%;
  "></a></div><div class="row">
<form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="s" autocomplete="off" placeholder="Enter's keyword">
            <span class="search-form_liveout"></span>
          </label>
          <input class="search-form_submit" type="submit" value="">
        </form>
</div>
<div class="row"><div class="wrap text-center">
            <a href="search.html" class="btn btn-primary" style="    min-width: 19%;">Search Accounts </span></a>
        <a href="search.html" class="btn btn-primary" style="    min-width: 19%;">Search Photos </span></a>
          </div></div>
        </div>
      </div>
    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        

      <section class="well well1 bg1">  
        <div class="container center991">
        <div class="wrap text-center text-center-2 row">
            
            
            <div class="pull-left col-md-8">
    <img src="<?php echo base_url()?>assets/images/icon/search_camera.png" class="pull-left" style="
    margin-right: 10px;
">
  <p class="pull-left" style="
    margin-top: 6px;
    color: #565656;
    font-weight: 600;
"> Accounts</p>
</div>
<div class="pull-right col-md-2" style="
    text-align: right;
">
  <p style="
    margin-top: 6px;
">View all 11,2345</p>
</div>
        
          </div>
          <div class="row" style="    margin-top: 10px;">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img1.jpg" alt="">
                
              </div>              
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img2.jpg" alt="">
                
              </div> 
            </div>
<div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img1.jpg" alt="">
                
              </div>              
            </div>
          </div>

          <div class="row wow fadeIn" data-wow-duration="2s">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img3.jpg" alt="">
               
              </div>              
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img4.jpg" alt="">
                
              </div>              
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img2.jpg" alt="">
                
              </div> 
            </div>
          </div>
          <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img2.jpg" alt="">
                
              </div> 
            </div>
            
<div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img1.jpg" alt="">
                
              </div>              
            </div><div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url()?>assets/images/page-1_img1.jpg" alt="">
                
              </div>              
            </div>
            
          </div>

        </div>   
      </section>
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
            <a href="<?php echo base_url().'home/search' ?>" class="btn btn-active">Search </a>
        <a href="<?php echo base_url() ?>" class="btn btn-primary">Home </a>
          </div>  
        </div>        
      </section>

      

    </main>
<?php $this->load->view('templates/footer');?>