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
      <div class="flexslider home-slider-carousel">
        <ul class="slides">
          <?php             
          foreach ($data as $key) {
            echo'<li> 
                  <div class="title">
                   '.$key.'
                  </div>
                 </li>';
          }
          ?>     
        </ul>
      </div> <!-- End Home-Slider-Carousel -->

   <div class="base-home-slider-shadow"></div>
     
  </div> <!-- End Home-Slider3 -->
  
  <div class="headlines clearfix">
   <span class="base">Headlines</span>
   <div class="text-rotator">
    <div><a href="" title="View permalink Small Market and St. Sebastian's Square in Opole">Small Market and St. Sebastian's Square in Opole</a></div>
    <div><a href="" title="View permalink Small Market and St. Sebastian's Square in Opole">Small Market and St. Sebastian's Square in Opole 2</a></div>
    </div>
  </div> <!-- End Headlines -->
  
  <div class="row-fluid">
   <div id="main" class="span8 image-preloader">
  
    <div class="row-fluid">
   
    <?php

      $m=array('1'=>'Pariwisata','2'=>'Budaya','3'=>'Blog' );
      $i=0;                
      foreach ($contents as $key) {

          foreach ($m as $j => $value) {

                  if($key->type==$j)
                  {
                    $d =$value;
                  }
                }
        if($i==0){
        echo '<div class="span6 post no-margin-left">
            <figure>
             <img src="'.$key->path.'" alt="'.$key->name.'" />
             <div class="cat-name">
              <span class="base">'.$d.'</span>
              <span class="arrow"></span>
             </div>
            </figure>
            <div class="text">
             <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
             <p>'.character_limiter($key->dest, 180).''.anchor('read/'.$key->url.'', 'read more', 'title="read more"').'</p>
             <div class="meta">By '.$key->fullname.' &nbsp;&nbsp;|&nbsp;&nbsp;</div>
            </div>
           </div>';
           $i++;
         }else{
          echo'<!-- Two -->
               <div class="span6 post">
                <figure>
                 <img src="'.$key->path.'" alt="'.$key->name.'" />
                 <div class="cat-name">
                  <span class="base">'.$d.'</span>
                  <span class="arrow"></span>
                 </div>
                </figure>
                <div class="text">
                 <h2>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h2>
                 <p>'.character_limiter($key->dest, 180).''.anchor('read/'.$key->url.'', 'read more', 'title="read more"').'</p>
                 <div class="meta">By '.$key->fullname.' &nbsp;&nbsp;|&nbsp;&nbsp;</div>
                </div>
               </div>   
               <div class="clearfix ie-sep"></div> <!-- Clearfix -->';
               $i=0;
         }
      }
    ?>
     
     <div class="clearfix ie-sep"></div> <!-- Clearfix -->
   
     <!-- Gallery Posts -->
     <div class="home-galleries no-margin-left">
    
      <!-- Header -->
      <div class="header">
       <div class="base">
        <h4>Galleries</h4>
        <div class="nav-control">
         <span class="previous"></span><span class="next"></span>
        </div>
       </div>
       <div class="arrow arrow-left"></div>
       <div class="arrow arrow-right"></div>
      </div>
      <?php 
        $main=$this->db->get_where('cmedia',array('published'=>'Y','type'=>'1'))->result();        
        foreach ($main as $key) {
          echo '<div class="item">
                 <figure class="figure-overlay figure-overlay-icon">
                  <a href="'.base_url('photo/read/'.$key->url).'">
                   <img src="'.$key->path.'" alt="'.$key->name.'" />
                   <div><p class="icon-plus"></p></div>
                  </a>
                 </figure>
                 <p>'.$key->name.'</p>
                </div>';
        }
       ?>
     </div> <!-- End Galleries -->
   
    </div> <!-- End Row-Fluid -->
   </div> <!-- End Main -->
  
   <?php $this->load->view($footer);?>