<?php 
  $menu = array('settings'    => array('title' => 'Settings',
                                   'url'   => 'settings',
                                    ),
                'themes'  => array('title' => 'Themes',
                                     'url'   => 'settings/themes',
                                    )
               ); 
?>

<div class="bs-example">
    <ul class="nav nav-tabs" role="tablist">
      <?php 
      	foreach($menu as $key=>$men){
      			$ac = ($key == 'posts' && $this->uri->segment(1) == null) ? 'active': '';
      			$act = $key == $this->uri->segment(1) ? 'active': '';
      		?>
      			<li role="presentation" class="<?php echo $act; ?> <?php echo $ac; ?>">
		      		<a href="<?php echo base_url($men['url']); ?>"><?php echo $men['title']; ?></a>
		    	</li>
      		<?php
      	}
      ?>
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
          Dropdown <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
</div>