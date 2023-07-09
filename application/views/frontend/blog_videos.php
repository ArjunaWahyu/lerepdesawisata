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
</div>
  
  <div class="row-fluid">
   <div id="main" class="span8 blog-videos image-preloader">
  
    <div class="row-fluid">
    
     <div class="breadcrumb clearfix">
      <span class="base">You are here</span>
      <p><a href="index-2.html">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Archive Category: <a href="<?php echo $urls; ?>" title="View articles in Video Posts">Video Posts</a></p>
     </div> <!-- End Breadcrumb -->
     
     <?php 
     $i=0;
     foreach ($datax as $key) {
     

           if($i==1){
            echo '<div class="span6 post">
            <figure>
           
            <iframe height="240" src="'.$key->path.'"></iframe>
            </figure>
            <div class="text">
             <h2>'.anchor('video/read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 200).'</p>
             <div class="meta">By '.$key->fullname.'&nbsp;&nbsp;|&nbsp;&nbsp;'.strftime( "%A, %d %B %Y", $key->update_at).'</div>
            </div>
           </div>';
            echo '<div class="clearfix ie-sep"></div> <!-- Clearfix -->';
            $i=0;
           }else{
            echo '<div class="span6 post no-margin-left">
            <figure>
             <iframe height="240" src="'.$key->path.'"></iframe>
            </figure>
            <div class="text">
             <h2>'.anchor('video/read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 200).'</p>
             <div class="meta">By '.$key->fullname.'&nbsp;&nbsp;|&nbsp;&nbsp;'.strftime( "%A, %d %B %Y", $key->update_at).'</div>
            </div>
           </div>';           
           
           }
           $i++;
           
     }?>
     
     <nav class="nav-pagination">
      <?php echo $halaman ?>
     </nav> <!-- End Nav-Pagination -->
   
    </div> <!-- End Row-Fluid -->
   </div> <!-- End Main -->
  
   <?php $this->load->view($footer);?>