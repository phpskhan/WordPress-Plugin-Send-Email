<?php
/*
* Plugin Name: KSabih Send Mail Post Author
* Plugin URI: /
* Author: KSabih
* Author URI: /
* Description: Sends email to Author whenever a Post is published.
*/

function ksabih_send_email_post_publish(){

	global $post;
	$author = $post->post_author; /* Post author ID. */
	$name = get_the_author_meta( 'display_name', $author);
	$email = get_the_author_meta( 'user_email', $author);
	$title = $post->post_title;
	$permalink = get_permalink( $ID );
	$edit = get_edit_post_link( $ID, '' );
	$to[] = sprintf( '%s <%s>', $name, $email );
	$subject = sprintf( 'Published: %s', $title );
	$message = sprintf( 'Congratulations, %s! Your article "%s" has been published.' , "\n\n", $name, $title );
	$message .= sprintf( 'View: %s', $permalink);
	$headers[] = '';
	wp_mail( $to, $subject, $message, $headers );

}

add_action( 'publish_post', 'ksabih_send_email_post_publish' );

function ksabih_excerpt_filter_example( $words ) {

	return 20;
}

add_filter('excerpt_length', 'ksabih_excerpt_filter_example');

?>