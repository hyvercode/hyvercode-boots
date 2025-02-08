<?php

if (!is_active_sidebar('sidebar-1')) {
  return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="p-3 rounded sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside>