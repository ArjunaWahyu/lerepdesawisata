
<?php
$main = $this->db->get_where('navigations', array('parent' => 0, 'published' => 'Y', 'type' => 'B', 'level' => 'User'));
foreach ($main->result() as $m) {
    // chek ada submenu atau tidak
    $sub = $this->db->get_where('navigations', array('parent' => $m->id));
    if ($sub->num_rows() > 0) {
        // buat menu + sub menu
        echo '<li class="">
							<a href="' . $m->link . '" class="dropdown-toggle">
								<i class="menu-icon fa ' . $m->icon . '"></i>
								<span class="menu-text">
									' . strtoupper($m->name) . '
								</span>
								<b class="arrow fa fa-angle-down"></b>
							</a><b class="arrow"></b>';
        echo "<ul class='submenu'>";
        foreach ($sub->result() as $s) {
            echo '<li class="">
							<a href="' . base_url($s->link) . '">
								<i class="menu-icon fa ' . $s->icon . '"></i>
								' . strtoupper($s->name) . '
							</a>
							<b class="arrow"></b>
						</li>';
        }
        echo "</ul>";
        echo "</li>";
    } else {
        echo '<li class="">
				<a href="' . base_url($m->link) . '">
					<i class="menu-icon fa ' . $m->icon . '"></i>
					<span class="menu-text"> ' . strtoupper($m->name) . ' </span>
				</a>
				<b class="arrow"></b>
			</li>';
    }
}
?>