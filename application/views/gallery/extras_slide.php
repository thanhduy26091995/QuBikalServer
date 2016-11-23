<div class="row wow fadeIn" data-wow-duration="2s" style="    padding-left: 10px; margin-bottom: 40px;">
           <?php
           $count = 1;
foreach ($listData as $value) {
  if($count > 4) break;
  $data['value'] = $value;
  $this->load->view('gallery/small_item', $data);
  $count++;
}
           ?>
          </div>