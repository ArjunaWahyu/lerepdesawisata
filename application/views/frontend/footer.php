<div id="sidebar" class="span4">
	
    <div class="widget clearfix">
     <div class="enews-tab">
    
      <!-- Tab Menu -->
      <ul class="nav nav-tabs" id="enewsTabs">
       <li class="active"><a href="#tab-populars" data-toggle="tab">Populars</a></li>
       <li><a href="#tab-recents" data-toggle="tab">Budaya</a></li>
       <li><a href="#tab-comments" data-toggle="tab">Pariwisata</a></li>
      </ul>
 
      <div class="tab-content">
       <div class="tab-pane active" id="tab-populars">
       
        <?php 
        $CI = get_instance();
        $result = $CI->contents_model->get_by_list('Y',5,0);
        foreach ($result as $key) {
        	echo '<div class="item">
		         <figure class="pull-left"><img src="'.$key->path.'" alt="'.$key->name.'" /></figure>
		         <div class="pull-right content">
		          <h4>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h4>
		          <p class="meta">'.$key->hits.' views&nbsp;&nbsp;|&nbsp;&nbsp;'.$key->fullname.'</p>
		         </div>
		        </div>';
        }
        ?>
       </div> <!-- End Populars -->
      
       <div class="tab-pane" id="tab-recents">

        <?php 
        // $CI = get_instance();
        // $result = $CI->contents_model->get_by_list('Y',5,0,2);
        // foreach ($result as $key) {
        // 	echo '<div class="item">
		      //   <figure class="pull-left"><img src="'.$key->path.'" alt="'.$key->name.'" /></figure>
		      //   <div class="pull-right content">
		      //    <h4>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h4>
		      //    <p class="meta">'.$key->hits.' views&nbsp;&nbsp;|&nbsp;&nbsp;'.$key->fullname.'</p>
		      //   </div>
		      //  </div>';
       // }
        ?>
       
       </div> <!-- End Recents -->
      
       <div class="tab-pane" id="tab-comments">
       
        <?php 
        $CI = get_instance();
        $result = $CI->contents_model->get_by_list('Y',5,0,1);
        foreach ($result as $key) {
        	echo '<div class="item">
		         <figure class="pull-left"><img src="'.$key->path.'" alt="'.$key->name.'" /></figure>
		         <div class="pull-right content">
		          <h4>'.anchor('read/'.$key->url.'', ''.$key->name.'', 'title="'.$key->name.'"').'</h4>
		          <p class="meta">'.$key->hits.' views&nbsp;&nbsp;|&nbsp;&nbsp;'.$key->fullname.'</p>
		         </div>
		        </div>';
        }
        ?>
       
        </div> <!-- End Comments -->
      </div> <!-- End Tab-Content -->
     
     </div> <!-- End Enews-Tab --> 
    </div> <!-- End Widget -->
   
    <div class="widget clearfix">
     <div class="best-picture">
    
      <div class="header">
       <h4>Pengunjung Web</h4>
      </div>
     <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4487602,4,441,112,61,00011011']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4487602&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
<div class="header">
       <h4>Best Picture</h4>
      </div>
      <div class="content">
      <!-- Photo Galleries -->
       <figure class="figure-hover flexslider loading">
        <ul class="slides">
         <?php 
        $CI = get_instance();
        $result = $CI->Categorymedia_model->get_by_list('Y',5,0,1);
        foreach ($result as $key) {
          echo '<li> 

       <div class="meta">'.$key->name.'</div>
               <a href="'.base_url('photo/read/'.$key->url).'">
                 <img src="'.$key->path.'" alt="'.$key->name.'"/>
               </a>
             </li>';
        }
        ?>
        </ul>
       </figure>
      </div>
     
     </div>
    </div> <!-- End Widget -->
   
    <div class="widget clearfix">
     <div class="subscribe-form">
    
      <div class="header">
       <h4>Events Today</h4>
      </div>
    	
      <div class="content">
       <div class="calendar">
        <?php echo $notes?>
      </div>
      <div class="event_detail">
        <div class="s_date">Detail Event <?php echo "$day $month $year";?></div>
        <div class="detail_event">
          <?php 
            if(isset($events)){
              $i = 1;
              foreach($events as $e){
               if($i % 2 == 0){
                  echo '<div class="info1"><h4>'.$e['time'].'</h4><p>'.$e['event'].'</p></div>';
                }else{
                  echo '<div class="info2"><h4>'.$e['time'].'</h4><p>'.$e['event'].'</p></div>';
                } 
                $i++;
              }
            }else{
              echo '<div class="message"><h4>No Event</h4><p>There\'s no event in this date</p></div>';
            }
          ?>
        </div>
      </div>
      </div>
     
     </div>
    </div> <!-- End Widget -->
   
    <div class="widget clearfix">
     <div class="best-video">
    
      <div class="header">
       <h4>Video of The Week</h4>
      </div>
    
      <div class="content">
       <?php 
        $CI = get_instance();
        $result = $CI->Categorymedia_model->get_by_list('Y',1,0,2);
        foreach ($result as $key) {
          echo '<p><a href="'.base_url('photo/read/'.$key->url).'" title="'.$key->name.'">'.$key->name.'</a></p>
       <figure><iframe height="240" src="'.$key->path.'"></iframe></figure>';
        }
        ?>
       
      </div>
     
     </div>
    </div> <!-- End Widget -->
  
   </div> <!-- End Sidebar -->
  
  </div> <!-- End Row-Fluid -->
 </div> <!-- End Container -->
 
  
 <div id="footer">
  <div class="container">
   
   <p class="pull-left"><h4>Copyright 2020 Desa Pariwisata Lerep&nbsp;&nbsp;|&nbsp;&nbsp;All Rights Reserved&nbsp;&nbsp;</h4></p>
   
  </div> <!-- End Container -->
 </div> <!-- End Footer -->
 
 </div> <!-- End Theme-Layout -->
 
 <a href="#" class="scrollup" title="Back to Top!">Scroll</a>
 <script>
    $(".detail").live('click',function(){
      $(".s_date").html("Detail Event for "+$(this).attr('val')+" <?php echo "$month $year";?>");
      var day = $(this).attr('val');
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: "<?php echo site_url("evencal/detail_event");?>",
        data:{<?php echo "year: $year, mon: $mon";?>, day: day},
        success: function( data ) {
          var html = '';
          if(data.status){
            var i = 1;
            $.each(data.data, function(index, value) {
                if(i % 2 == 0){
                html = html+'<div class="info1"><h4>'+value.time+'</h4><p>'+value.event+'</p></div>';
              }else{
                html = html+'<div class="info2"><h4>'+value.time+'</h4><p>'+value.event+'</p></div>';
              } 
              i++;
            });
          }else{
            html = '<div class="message"><h4>'+data.title_msg+'</h4><p>'+data.msg+'</p></div>';
          }
          html = html;
          $( ".detail_event" ).fadeOut("slow").fadeIn("slow").html(html);
        } 
      });
    });
</script>
</body>
</html>