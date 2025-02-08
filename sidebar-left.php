<?php

if (!is_active_sidebar('sidebar-left')) {
  return;
}
?>

<aside id="sidebar-left" class="widget-area">
    <div class="shadow-sm p-3 mb-5 bg-light rounded sidebar">
      <?php dynamic_sidebar('sidebar-left'); ?>
    </div>
</aside>