<?php 
if ( ! function_exists( 'et_builder_get_custom_posts' ) ) :
function et_builder_get_custom_posts() {
	$args = array(
       'public'   => true,
       '_builtin' => false,
    );

    $output = 'objects'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types( $args, $output, $operator ); 

	$output = '<select name="et_pb_post_type" id="et_pb_post_type">';

	foreach ( $post_types as $post_type ) {
		$selected = sprintf(
			'<%%= typeof( et_pb_post_type ) !== "undefined" && "%1$s" === et_pb_post_type ?  " selected=\'selected\'" : "" %%>',
			esc_html( $post_type->slug )
		);
		$output .= sprintf(
			'<option value="%1$s"%2$s>%3$s</option>',
			esc_attr( $post_type->name ),
			$selected,
			esc_html( $post_type->label )
		);
	}

	$output .= '</select>';

	return $output;
}
endif;
//function et_pb_force_regenerate_templates() {
//	// add option to indicate that templates cache should be updated in case of term added/removed/updated
//	et_update_option( 'et_pb_clear_templates_cache', 'on' );
//}
//
//add_action( 'created_term', 'et_pb_force_regenerate_templates' );
//add_action( 'edited_term', 'et_pb_force_regenerate_templates' );
//add_action( 'delete_term', 'et_pb_force_regenerate_templates' );
