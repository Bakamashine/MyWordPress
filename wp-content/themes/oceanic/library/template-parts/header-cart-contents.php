
<a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="header-cart-amount">
		<?php
		$singular_text = '%d item';
		$plural_text   = '%d items';
		
		echo esc_html( sprintf( oceanic_singular_or_plural( $singular_text, $plural_text, WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) ); ?> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() );
		?>
	</span>
	<span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? 'cart-has-items' : ''; ?>">
		<span><?php esc_html_e('Checkout', 'oceanic'); ?></span> <i class="fa fa-shopping-cart"></i>
	</span>
</a>
