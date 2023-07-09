<?php $this->load->view($header); ?>

<div class="row-fluid">
    <div id="main" class="span8 single single-post image-preloader">

        <div class="row-fluid">

            <div class="breadcrumb clearfix">
                <span class="base">You are here</span>
                <p><a href="<?php echo base_url(); ?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?php echo $breadurl; ?>" title="<?php echo $breadtitle; ?>"><?php echo $breadname; ?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?php echo $name; ?></p>
            </div> <!-- End Breadcrumb -->

            <figure class="head-section">
                <img src="<?php echo $path; ?>" alt="Image" />
                <div class="head-section-content">
                    <h5>By <?php echo $fullname; ?></h5>
                    <h1><?php echo $name; ?></h1>
                    <p class="meta">&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $breadurl; ?>" title="<?php echo $breadtitle; ?>"><?php echo $breadname; ?></a></p>
                </div>
            </figure>

            <div class="content" align="justify">

                <?php echo $dest; ?>

            </div> <!-- End Content -->

            <div class="sep-border"></div> <!-- Separator -->

            <div class="related-posts">
                <h3>Related Posts</h3>

                <?php
                $i = 0;
                foreach ($contents as $key) {
                    if ($i == 0) {
                        echo '<div class="item span3 no-margin-left">
               <a href="' . base_url('read/' . $key->url) . '">
                <figure class="figure-hover">
                 <img src="' . $key->path2 . '" alt="' . $key->name . '"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>' . $key->name . '</p>
              </div>';
                        $i++;
                    } else {
                        echo '<div class="item span3">
               <a href="' . base_url('read/' . $key->url) . '">
                <figure class="figure-hover">
                 <img src="' . $key->path2 . '" alt="' . $key->name . '"/>
                 <div class="figure-hover-masked">
                  <p class="icon-plus"></p>
                 </div>
                </figure>
               </a>
               <p>' . $key->name . '</p>
              </div>';
                    }
                }
                ?>

            </div> <!-- End Related-Posts -->

        </div> <!-- End Row-Fluid -->
    </div> <!-- End Main -->

    <?php $this->load->view($footer); ?>