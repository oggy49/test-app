<?php
/**
 * Header functions
 *
 */

 // add_action ( 'wp_head', 'register_service_worker' );
 add_action( 'icon_header_brand', 'icon_branding', 8 );
 add_action( 'icon_header_navigation', 'icon_main_navigation', 8 );
 add_action( 'icon_header_right_navigation', 'icon_right_navigation', 8 );
 add_action( 'icon_header_mobile_navigation', 'icon_mobile_navigation', 8 );


 function register_service_worker () {
   echo "<script>
   if ('serviceWorker' in navigator) {
       window.addEventListener('load', function() {
         navigator.serviceWorker.register('/sw.js');
      });
  }
  </script>";
 }

/**
 * Site branding
 */
function icon_branding() {
	?>
			<a href="<?= esc_url( home_url( '/' ) ); ?>" class="block brand w-24 md:w-32 lg:w-44" rel="home">
        logo
			</a>
	<?php
}

/**
 * Main navigation
 */
function icon_mobile_navigation() {
	?>
		<div class="p-8">
      <div class="space-y-2">
        <a href="#" class="font-headline block font-bold text-right text-2xl">
          BOOK A COURT
        </a>
        <a href="#" class="font-headline  block font-bold text-right text-2xl">
          JOIN
        </a>
      </div>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'mobile-menu',
					'menu_class'   => 'mobile-menu text-2xl uppercase font-bold text-right space-y-2',
					'container'=> false
				) );
			?>
		</div>
	<?php
}


/**
 * Main navigation
 */
function icon_main_navigation() {
	?>
	<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'menu_class'   => 'primary-menu space-x-4 xl:space-x-8 flex',
				'container'=> false
			) );
		?>
	<?php } ?>
	<?php
}
