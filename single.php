<?php 

    get_header();

    if(have_posts(  )){
        while(have_posts(  )){
            the_post();
?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php the_content() ?>
            </div>
            <div class="col-12 col-md-6">
                <?php the_post_thumbnail( 'large' ) ?>
            </div>
        </div>
    </div>
            
<?php }} ?>

<?php get_footer(); ?>
