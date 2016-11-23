<div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="<?php echo base_url() . $value['image_path']?>" alt="" >
                <div class="caption bg2">
                  <div class="wrap">
                    <img src="<?php echo base_url()?>assets/images/icon/category_icon.png" alt="" class="gallery-item">
                    <p>
                      <?php echo $value['name']?>
                    </p>
                    <a href="<?php echo base_url() . 'home/index/' . $value['id'] ?>" class="btn-link fa-angle-right">60 photos</a>
                  </div>  
                </div>
              </div>              
            </div>