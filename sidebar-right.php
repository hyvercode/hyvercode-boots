<?php

if (!is_active_sidebar('sidebar-right')) {
  return;
}
?>

<aside id="sidebar-right" class="widget-area">
    <div class="shadow-sm p-3 mb-5 bg-light rounded sidebar">
      <?php dynamic_sidebar('sidebar-right'); ?>
    </div>
</aside>