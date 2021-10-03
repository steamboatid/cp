<?php
/**
 * @group xmlrpc
 */
class Tests_XMLRPC_wp_setOptions extends WP_XMLRPC_UnitTestCase {

	/**
	 * @see https://core.trac.wordpress.org/ticket/22936
	 */
	function test_set_option_no_escape_strings() {
		$this->make_user_by_role( 'administrator' );
		$string_with_quote = "Mary's Lamb Shop";
		$escaped_string_with_quote = esc_html( $string_with_quote ); // title is passed through esc_html()

		update_option( 'default_comment_status', 'closed' );
<<<<<<< HEAD
		$this->assertEquals( 'closed', get_option( 'default_comment_status' ) );
		$result = $this->myxmlrpcserver->wp_setOptions( array( 1, 'administrator', 'administrator', array(
=======
		$this->assertSame( 'closed', get_option( 'default_comment_status' ) );
		$result = $this->myxmlrpcserver->wp_setOptions(
			array(
				1,
				'administrator',
				'administrator',
				array(
>>>>>>> 164b22cf6a (Tests: First pass at using `assertSame()` instead of `assertEquals()` in most of the unit tests.)
			'blog_title' => $string_with_quote,
			'default_comment_status' => 'open',
		) ) );

		$this->assertInternalType( 'array', $result );
		$this->assertSame( $escaped_string_with_quote, $result['blog_title']['value'] );
		$this->assertSame( 'open', $result['default_comment_status']['value'] );
	}
}
