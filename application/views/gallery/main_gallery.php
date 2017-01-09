<section class="well well1 bg1">  
        <div class="container center991">
        <div class="row" style="
    text-align: center;
    font-weight: bold;
    color: grey;
    font-size: 19px;
    
">  
            <?php if ($this->session->userdata('isLogin')) { 
                echo "<p>Hello Qubikal</p>";
            }else{
                echo '<a href="'. base_url().'index.php/home/login">Login</a>';
            }
?>            
        
             
        </div>
          <div class="row">
            <?php 
            $count = 0;
            $size = 1;
            $checkNum = 0;
            $isLarge = false;
           
            $this->load->view('gallery/add_category_item');
            if (array_key_exists('categories',$listData)) {
            foreach ($listData['categories'] as $key => $value)              
             {
              //var_dump($value);
              $data['value'] = $value;
              $data['categorykey'] = $key;
              $data['parentcategory'] = null;
              //var_dump($data);
              $randNum = rand(1,2);
              if($size + $randNum > 4){
                $this->load->view('gallery/small_item', $data);
                $size = $size + 1;
              }else{
                if($randNum == 1) {
                  $this->load->view('gallery/small_item', $data);
                  $size = $size +  1;
              }
                else{
                  $this->load->view('gallery/small_item', $data);
                  //$isLarge = true;
                  $size = $size +  1;
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
          }

            ?>

          

        </div>    
        </div>    
      </section>