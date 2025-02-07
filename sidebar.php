<?php

if (!is_active_sidebar('sidebar-1')) {
  return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="shadow-sm p-3 mb-5 bg-light rounded sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside>