<div id="sidebar-primary" class="sidebar ">
    <?php if (is_archive()){
        dynamic_sidebar( 'mytheme_archive_sidebar' );
    }else{
        dynamic_sidebar( 'mytheme_sidebar' );
    }
    ?>
</div>