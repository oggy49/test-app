<?php
 get_header(); ?>

 <section>
   <?php
   while ( have_posts() ) : the_post();
     the_content();
   endwhile; // End of the loop.
   ?>
 </section>
<?php
get_footer();
