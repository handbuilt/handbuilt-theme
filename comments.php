
<?php
if ( post_password_required() || ! have_comments() ) {
	return;
}
?>

<div class="page-comments">

	<h3>Comments</h3>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 0,
			) );
		?>
	</ol>
</div>
