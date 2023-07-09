<?php $this->load->view($header); ?>
  
  <div class="row-fluid">
   <div id="main" class="span8 blog-posts image-preloader">
  
    <div class="row-fluid">
    
     <div class="breadcrumb clearfix">
      <span class="base">You are here</span>
      <p><a href="index-2.html">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Archive Category: <a href="<?php echo $urls; ?>" title="View articles in <?php echo $type; ?>"><?php echo $type; ?></a></p>
     </div> <!-- End Breadcrumb -->
     
     <?php 
     $i=1;
     foreach ($data as $key) {
      if($i==1){
        echo'<div class="span7 post headline-post-main no-margin-left">
              <figure>
               <img src="'.$key->path.'" alt="'.$key->name.'" />
               <div class="cat-name">
               </div>
              </figure>
              <div class="meta">By '.$key->fullname.' - '.strftime( "%A, %d %B %Y", $key->update_at).'</div>
              <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
              <p>'.character_limiter($key->dest, 180).'</p>
             </div>';
      }elseif ($i==2 ) {
        echo'<div class="span5 post headline-post">
              <figure>
               <img src="'.$key->path.'" alt="Post 11" />
               <div class="cat-name">
               </div>
              </figure>
              <div class="meta">By '.$key->fullname.' - '.strftime( "%A, %d %B %Y", $key->update_at).'</div>
              <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             </div>';
      }elseif ($i==3) {
        echo'<div class="span5 post headline-post">
              <figure>
               <img src="'.$key->path.'" alt="'.$key->name.'" />
               <div class="cat-name">
               </div>
              </figure>
              <div class="meta">By '.$key->fullname.' - '.strftime( "%A, %d %B %Y", $key->update_at).'</div>
              <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             </div>
             <div class="sep-border margin-bottom30"></div>';
      }else{
        echo'<div class="post clearfix">
            <figure>
             <img src="'.$key->path2.'" alt="'.$key->name.'" />
             <div class="cat-name">
             </div>
            </figure>
            <div class="content">
             <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 400).'</p>
            </div>
            <div class="meta">
             <span class="pull-left">By '.$key->fullname.' - '.strftime( "%A, %d %B %Y", $key->update_at).' </span>
             <span class="pull-right">'.anchor('read/'.$key->url.'', 'read more', 'title="read more"').'</span>
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