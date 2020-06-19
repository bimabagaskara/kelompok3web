<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><i class="fas fa-store-alt"></i> Sumber Rezeki</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SbrRzk</a>
        </div>
        <!-- Query Menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `admin_menu`.`id`,`menu`
                                FROM  `admin_menu` JOIN `admin_access_menu` 
                                    ON `admin_menu`.`id` = `admin_access_menu`.`menu_id`
                                WHERE `admin_access_menu`.`role_id`= $role_id
                                ORDER BY `admin_access_menu`.`menu_id` ASC
                                ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>
        <a href="<?= base_url('admin') ?>">
            <div class="btn btn-lg btn-blocked btn-primary float-right"><i class="fa fa-home" aria-hidden="true"></i>
                Dashboard</div>
        </a>
        <ul class="sidebar-menu">


            <!-- MENU LOOPING -->
            <?php foreach ($menu as $m) : ?>
                <li class="menu-header"><?= $m['menu'] ?></li>

                <!-- SUB MENU -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = " SELECT * FROM `admin_sub_menu`
                                WHERE `menu_id` = $menuId
                                AND    `is_active` = 1
                                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();

                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item dropdown active">
                        <?php else : ?>
                        <li class="nav-item dropdown">
                        <?php endif; ?>
                        <a href="<?= base_url($sm['url']) ?>" class="nav-link has-dropdown"><i class="<?= $sm['icon'] ?>"></i><span><?= $sm['title'] ?></span></a>



                        <!-- SUB_SUBMENU -->
                        <?php
                        $submenuId = $sm['id'];
                        $querySubSubMenu = " SELECT `admin_sub_menu`.`id`, `admin_sub_submenu`.*
                                        FROM `admin_sub_submenu` JOIN `admin_sub_menu`
                                            ON `admin_sub_submenu`.`submenu_id` = `admin_sub_menu`.`id`
                                        WHERE `admin_sub_submenu`.`submenu_id` = $submenuId AND `admin_sub_submenu`.`is_active` = 1";
                        $subsubMenu = $this->db->query($querySubSubMenu)->result_array();

                        ?>
                        <?php foreach ($subsubMenu as $ssm) : ?>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?= base_url($ssm['url']) ?>"><i class="<?= $ssm['icon'] ?>"></i><?= $ssm['menu_title'] ?></a></li>
                            </ul>

                        <?php endforeach; ?>
                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>