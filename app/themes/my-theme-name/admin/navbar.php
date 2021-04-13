<nav class="navbar navbar-expand-sm bg-primary navbar-dark mb-5">
    <ul class="navbar-nav">

      <?php $menu_items = get_menu_items('admin');

          if( $menu_items ){
            foreach( $menu_items as $menu_item ){
      ?>
      <li class="nav-item<?php if( trim(current_url(), '/') == $menu_item['url'] ) echo ' active'; ?>">
        <a href="<?php echo $menu_item['url']; ?>" class="nav-link"><?php echo $menu_item['title']; ?></a>
      </li>
    <?php }} ?>

    </ul>
</nav>