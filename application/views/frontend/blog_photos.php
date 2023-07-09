<?php $this->load->view($header); ?>
  
  <div class="row-fluid">
   <div id="main" class="span8 blog-photos image-preloader">
  
    <div class="row-fluid">
    
     <div class="breadcrumb clearfix">
      <span class="base">You are here</span>
      <p><a href="index-2.html">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Archive Category: <a href="<?php echo $urls; ?>" title="View articles in Photo Posts">Photo Posts</a></p>
     </div> <!-- End Breadcrumb -->

     <?php 
     $i=0;
     foreach ($data as $key) {
      

           if($i==1){
            echo '<div class="span6 post">
            <figure class="figure-overlay">
             <a href="'.base_url('photo/read/'.$key->url).'">
              <img src="'.$key->path.'" alt="Thumbnail" />
              <div><p>'.$key->name.' <i>by '.$key->fullname.'</i></p></div>
             </a>
            </figure>
            <div class="text">
             <h2>'.anchor('photo/read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 200).'</p>
             <div class="meta">By '.$key->fullname.'&nbsp;&nbsp;|&nbsp;&nbsp;'.strftime( "%A, %d %B %Y", $key->update_at).'</div>
            </div>
           </div>';
            echo '<div class="clearfix ie-sep"></div> <!-- Clearfix -->';
            $i=0;
           }else{
            echo '<div class="span6 post no-margin-left">
            <figure class="figure-overlay">
             <a href="'.base_url('photo/read/'.$key->url).'">
              <img src="'.$key->path.'" alt="Thumbnail" />
              <div><p>'.$key->name.' <i>by '.$key->fullname.'</i></p></div>
             </a>
            </figure>
            <div class="text">
             <h2>'.anchor('photo/read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 200).'</p>
             <div class="meta">By '.$key->fullname.'&nbsp;&nbsp;|&nbsp;&nbsp;'.strftime( "%A, %d %B %Y", $key->update_at).'</div>
            </div>
           </div>';           
           $i++;
           }
           
     }?>
    
   
   <nav class="nav-pagination">
      <?php echo $halaman ?>
     </nav> <!-- End Nav-Pagination -->
   
    </div> <!-- End Row-Fluid -->
   </div> <!-- End Main -->
  
   <?php $this->load->view($footer);?>