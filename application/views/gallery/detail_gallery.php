<section class="well well1 bg1">  
        <div class="container center991">
        <div class="wrap text-center">
            
            
            <a href="<?php echo base_url(). 'home/index/' . $category_id?>" class="btn btn-primary" style="width: 100%; border-radius: 0px;"><?php echo $detail->name?> </a>
        
          </div>
          <?php 
            $count = 0;
            $size = 0;
            $checkNum = 0;
            $isLarge = false;
           
            foreach ($listData as $value) {
              
              if($size == 0 && $count == 0)
                echo '<div class="row">';

              $data['value'] = $value;
              $randNum = rand(1,2);
              if($size + $randNum > 4){
                $this->load->view('gallery/detail_small_item', $data);
                $size = $size + 1;
              }else{
                if($randNum == 1) {
                  $this->load->view('gallery/detail_small_item', $data);
                  $size = $size +  $randNum;
              }
                else{
                  $this->load->view('gallery/detail_large_item', $data);
                  $isLarge = true;
                  $size = $size +  $randNum;
                }
              }

              if($isLarge)
                $checkNum = 3;
              else {
                if($checkNum == 0) $checkNum = 4;
              }
              if(($size == 4 && $count % $checkNum == 0) || $size == 4){
                $size = 0;
                $checkNum = 0;
                echo '</div><div class="row">';
              }
              if($count == count($listData))
                echo '</div>';
              $count++;
            }

            ?>
            
          </div>

        </div>    
      </section>