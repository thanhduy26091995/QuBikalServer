<section class="well well1 bg1">  
    <div class="container center991">
        <div class="wrap text-center text-center-2 row">


            <div class="pull-left col-md-8">
                <img src="<?php echo base_url() ?>assets/images/icon/search_camera.png" class="pull-left" style="
                     margin-right: 10px;
                     ">
                <p class="pull-left" style="
                   margin-top: 6px;
                   color: #565656;
                   font-weight: 600;
                   "> <?php
                       if ($search_mode == 'photo')
                           echo "Photos";
                       else
                           echo "Accounts";
                       ?></p>
            </div>
            <div class="pull-right col-md-2" style="
                 text-align: right;
                 ">
                <p style="
                   margin-top: 6px;
                   ">View all <?php echo count($listData) ?></p>
            </div>

        </div>
        <?php
        $count = 0;
        $size = 0;
        $checkNum = 0;
        $isLarge = false;

        foreach ($listData as $value) {

            if ($size == 0 && $count == 0)
                echo '<div class="row">';

            $data['value'] = $value;
            $randNum = rand(1, 2);
            if ($size + $randNum > 4) {
                $this->load->view('gallery/detail_small_item', $data);
                $size = $size + 1;
            } else {
                if ($randNum == 1) {
                    $this->load->view('gallery/detail_small_item', $data);
                    $size = $size + $randNum;
                } else {
                    $this->load->view('gallery/detail_large_item', $data);
                    $isLarge = true;
                    $size = $size + $randNum;
                }
            }

            if ($isLarge)
                $checkNum = 3;
            else {
                if ($checkNum == 0)
                    $checkNum = 4;
            }
            if (($size == 4 && $count % $checkNum == 0) || $size == 4) {
                $size = 0;
                $checkNum = 0;
                echo '</div><div class="row">';
            }
            if ($count == count($listData))
                echo '</div>';
            $count++;
        }
        ?>

    </div>

</div>    
</section>