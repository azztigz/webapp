    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                </li>
                <?php 
                  foreach(menuActive() as $key => $menu){
                    if($menu['sub'] == 0){
                        ?>
                          <li class="<?php echo $menu['active']; ?>" >
                            <a href="<?php echo $menu['link']; ?>">
                                <?php echo $menu['icon'].' '.$menu['title']; ?>
                            </a>
                          </li>
                        <?php
                    }else{
                        ?>  
                            <li class="<?php echo $menu['active']; ?>">   
                                <a href="#"><?php echo $menu['icon'].' '.$menu['title']; ?> <span class="fa arrow"></span></a>
                                <?php 
                                if(isset($menu['submenu'])){
                                    foreach($menu['submenu'] as $key=>$sub){ 
                                ?>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?php echo $sub['link']; ?>">
                                                <?php echo $sub['icon'].' '.$sub['title']; ?>
                                            </a>
                                        </li>
                                    </ul>    
                                <?php 
                                    } 
                                }
                                ?>
                            </li>
                        <?php
                    }
                  }
                ?>
            </ul>
        </div>
    </div>
</nav>