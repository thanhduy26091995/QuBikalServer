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
          
          <a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>assets/images/icon/logo.png" alt="logo" style="
    width: 6%;
"></a>
        </div>
      </div>
    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        


      <section class="well well1 bg1">  
        <div class="container center991">
        
          <div class="row" style="
    text-align: center;
"> <p style="
"><?php echo $message?></p>
            </div>    
      </div></section>
  
      <section class="well well3 parallax" data-url="images/parallax1.jpg" data-mobile="
      true" data-speed="0.9">
        <div class="container">

        
          <div class="wrap text-center">    
            <a href="<?php echo base_url().'home/search' ?>" class="btn btn-primary">Search </a>
        <a href="<?php echo base_url()?>" class="btn btn-active">Home </a>
          </div>  
        </div>        
      </section>
      <style type="text/css">
        .row{
          margin-left:32px;
          margin-right:32px;
        }
      </style>
      

    </main>
<?php $this->load->view('templates/footer');?>