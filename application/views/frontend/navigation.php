
<?php
    $main=$this->db->get_where('navigations',array('parent'=>0,'published'=>'Y','type'=>'F'));
    foreach ($main->result() as $m)
    {
        // chek ada submenu atau tidak
        $sub=$this->db->get_where('navigations',array('parent'=>$m->id));
        if($sub->num_rows() >0)
        {
            // buat menu + sub menu
            echo '<li>
							<a href="'.$m->link.'">'.strtoupper($m->name).'
                            <i class="arrow-main-nav"></i>
                            </a>';
            echo "<ul>";
            foreach ($sub->result() as $s)
            {
                 echo '<li>
							<a href="'.base_url($s->link).'">'.strtoupper($s->name).'</a>
					   </li>';
            }
            echo "</ul>";
            echo "</li>";
        }
        else
        {
             echo '<li>
				    <a href="'.base_url($m->link).'">'.strtoupper($m->name).'</a>
			       </li>';
        }
    }
   
?>
