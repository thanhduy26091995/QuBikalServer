<?php $this->load->view('templates/header', $categoryTree);?>
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container top-sect">
        <div class="container" style="
    text-align: center;
    padding: 30px;
">
          
          <a href="<?php echo base_url().'index.php/home/index' ?>"><img src="<?php echo base_url()?>assets/images/icon/logo.png" alt="logo" style="
    width: 6%;
"></a>
        </div>
      </div>
    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        


      <?php $this->load->view('gallery/main_gallery');?>
  
      <section class="well well3 parallax" data-url="images/parallax1.jpg" data-mobile="
      true" data-speed="0.9">
        <div class="container">
        
        <?php 
        $this->load->view('gallery/extras_slide', $listData);?>
          <div class="wrap text-center">    
            <a href="<?php echo base_url().'index.php/home/search' ?>" class="btn btn-primary">Search </a>
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
<script src="https://www.gstatic.com/firebasejs/3.6.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBZ1tUNoPUWtddu47qTgN2stxowLF8agak",
    authDomain: "gcmdemo2-1313.firebaseapp.com",
    databaseURL: "https://gcmdemo2-1313.firebaseio.com",
    storageBucket: "gcmdemo2-1313.appspot.com",
    messagingSenderId: "191147092379"
  };
  firebase.initializeApp(config);
</script>