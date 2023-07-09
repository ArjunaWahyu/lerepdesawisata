  <?php $this->load->view($header); ?>
    <div id="home-slider" class="home-slider">
      <div class="flexslider loading home-slider-gallery">
        <ul class="slides"> 
       <?php 
       $data = array();
        $CI = get_instance();
        $result = $CI->slider_model->get_by_all();
        foreach ($result as $key) {
          echo'<li><img src="'.$key->path.'" alt="Screenshoot 1" /></li>';
          $data[].='<h3>'.$key->name.'</h3><p>By '.$key->fullname.'</p>';
        }
       ?>
        </ul>
      </div> <!-- End Home-Slider-Gallery -->
  <div class="row-fluid">
   <div id="main" class="span8 single single-post image-preloader">
  
    <div class="row-fluid">
    
     <div class="breadcrumb clearfix">
      <span class="base">You are here</span>
      <p><a href="<?php echo base_url();?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?php echo $metatittle;?>" title="<?php echo $metatittle;?>"><?php echo $metatittle;?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?php echo $metatittle;?></p>
     </div> <!-- End Breadcrumb -->
     
 <!--     <figure class="head-section">
      <img src="<?php echo $path;?>" alt="Image" />
      <div class="head-section-content">
       <h5>By <?php echo $fullmetatittle;?></h5>
       <h1><?php echo $metatittle;?></h1>
       <p class="meta">Jan. 16, 2013&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $breadurl;?>" title="<?php echo $breadtitle;?>"><?php echo $metatittle;?></a></p>
      </div>
     </figure> -->
     
     <div class="content" align="justify">
     
      <?php echo $about;?>

     </div> <!-- End Content -->
     
     <div class="sep-border"></div> <!-- Separator -->
     
     <div class="related-posts">
 <!--      <h3>Related Posts</h3> -->
      
<!--       <?php
      $i=0;
      foreach ($contents as $key) {
        if($i==0){
        echo '<div class="item span3 no-margin-left">
               <a href="'.base_url('read/'.$key->url).'">
                <figure class="figure-hover">
                 <img src="'.$key->path2.'" alt="'.$key->metatittle.'"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>'.$key->metatittle.'</p>
              </div>';
              $i++;
        }else{
          echo '<div class="item span3">
               <a href="'.base_url('read/'.$key->url).'">
                <figure class="figure-hover">
                 <img src="'.$key->path2.'" alt="'.$key->metatittle.'"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>'.$key->metatittle.'</p>
              </div>';
        }
      }
      ?> -->

     </div> <!-- End Related-Posts -->
   
    </div> <!-- End Row-Fluid -->
   </div> <!-- End Main -->
  
   <?php $this->load->view($footer);?>