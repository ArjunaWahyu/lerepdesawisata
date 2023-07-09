<?php $this->load->view($header); ?>
  
  <div class="row-fluid">
   <div id="main" class="span8 single single-photo image-preloader">
  
    <div class="row-fluid">
    
     <div class="breadcrumb clearfix">
      <span class="base">You are here</span>
      <p><a href="<?php base_url(); ?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?php echo $urls; ?>" title="View articles in Photo">Photo</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?php echo $name; ?></p>
     </div> <!-- End Breadcrumb -->
     
     <div class="flexslider loading slider-gallery">
      <ul class="slides">
      <?php 
      if($galery==null){
        echo '<li><a href="'.$path.'" data-rel="prettyPhoto[sliderGallery]"><img src="'.$path.'" alt="'.$name.'" /></a></li>';
      }else{
        foreach ($galery as $key) {
          echo '<li><a href="'.$key->path.'" data-rel="prettyPhoto[sliderGallery]"><img src="'.$key->path.'" alt="'.$key->name.'" /></a></li>';
        }
      }
      ?>
       </ul>
     </div>
     
     <div class="flexslider slider-carousel">
      <ul class="slides">

      <?php 
      if($galery==null){
          echo '<li><img src="'.$path.'" alt="'.$name.'" /></li>';
          echo '<li></li>';
      }else{
        $i=0;
        foreach ($galery as $key) {
          echo '<li><img src="'.$key->path.'" alt="'.$key->name.'" /></li>';
          $i++;
        }
        if($i==1){
          echo '<li></li>';
        }

      }
      ?>
      </ul>
     </div> <!-- End Slider -->
     
     <div class="content">
     
      <div class="head-section">
       <h5>By <?php echo $fullname; ?></h5>
       <h1><?php echo $name; ?></h1>
       <p class="meta"><?php echo strftime( "%A, %d %B %Y", $update_at); ?></p>
      </div> <!-- End Head-Section -->
     
     <div align="justify">
      <?php echo $dest; ?>
      </div>
     </div> <!-- End Content -->
     
     
     <div class="sep-border no-margin-top"></div> <!-- Separator -->
     
     <div class="related-posts">
      <h3>Related Posts</h3>
     
      <?php
      $i=0;
      foreach ($contents as $key) {
        if($i==0){
        echo '<div class="item span3 no-margin-left">
               <a href="'.base_url('photo/read/'.$key->url).'">
                <figure class="figure-hover">
                 <img src="'.$key->path.'" alt="'.$key->name.'"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>'.$key->name.'</p>
              </div>';
              $i++;
        }else{
          echo '<div class="item span3">
               <a href="'.base_url('photo/read/'.$key->url).'">
                <figure class="figure-hover">
                 <img src="'.$key->path.'" alt="'.$key->name.'"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>'.$key->name.'</p>
              </div>';
        }
      }
      ?>
     
     </div> <!-- End Related-Posts -->
   
    </div> <!-- End Row-Fluid -->
   </div> <!-- End Main -->
  
 <?php $this->load->view($footer);?>