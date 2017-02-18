<?php
if(!function_exists('oseo_comment_reply_link')){
    function oseo_comment_reply_link($class){
        $class = str_replace("class='comment-reply-link", "class='reply btn btn-xs btn-warning", $class);
    return $class;
    }
    add_filter('comment_reply_link','oseo_comment_reply_link');
}
if(!function_exists('oseo_search_form')){
    function oseo_search_form($form){
        $form = str_replace(
            'search-submit',
            'search-submit btn btn-primary',
            $form
        );
        $form = str_replace(
        'search-field',
        'search-field form-control',
        $form
        );
    // return the modified string
    return $form;
}
// run the search form HTML output through the newly defined filter
add_filter( 'get_search_form', 'oseo_search_form' );
}

if (!function_exists('bootstrapBasicCategoriesList')) {
	/**
	 * Display categories list with bootstrap icon
	 *
	 * @param string $categories_list list of categories.
	 * @return string
	 */
	function bootstrapBasicCategoriesList($categories_list = '')
	{
		return sprintf('<span class="categories-icon glyphicon glyphicon-th-list" title="' . __('Posted in', 'oseo') . '"></span> %1$s', $categories_list);
	}// bootstrapBasicCategoriesList
}


if (!function_exists('bootstrapBasicComment')) {
	/**
	 * Displaying a comment
	 *
	 * @param object $comment
	 * @param array $args
	 * @param integer $depth
	 * @return string the content already echo.
	 */
	function bootstrapBasicComment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;

		if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) {
			echo '<li id="comment-';
				comment_ID();
				echo '" ';
				comment_class('comment-type-pt');
			echo '>';
			echo '<div class="comment-body media">';
				echo '<div class="media-body">';
					_e('Pingback:', 'oseo');
					comment_author_link();
					edit_comment_link(__('Edit', 'oseo'), '<span class="edit-link">', '</span>');
				echo '</div>';
			echo '</div>';
		} else {
			echo '<li id="comment-';
				comment_ID();
				echo '" ';
				comment_class(empty($args['has_children']) ? '' : 'parent media');
			echo '>';

			echo '<article id="div-comment-';
				comment_ID();
			echo '" class="comment-body media">';

				// footer
				echo '<footer class="comment-meta pull-right">';
					if (0 != $args['avatar_size']) {
						echo get_avatar($comment, $args['avatar_size']);
					}
				echo '</footer><!-- .comment-meta -->';
				// end footer

				// comment content
				echo '<div class="comment-content media-body">';
					echo '<div class="comment-author vcard">';
						echo '<div class="comment-metadata">';

						// date-time
						echo '<a href="';
							echo esc_url(get_comment_link($comment->comment_ID));
						echo '">';
						echo '<time datetime="';
							comment_time('c');
						echo '">';
						printf(__('%1$s at %2$s', 'oseo'), get_comment_date(), get_comment_time());
						echo '</time>';
						echo '</a>';
						// end date-time

						echo ' ';

						edit_comment_link('<span class="fa fa-pencil-square-o "></span>' . __('Edit', 'oseo'), '<span class="edit-link">', '</span>');

						echo '</div><!-- .comment-metadata -->';

						// if comment was not approved
						if ('0' == $comment->comment_approved) {
							echo '<div class="comment-awaiting-moderation text-warning"> <span class="glyphicon glyphicon-info-sign"></span> ';
								_e('Your comment is awaiting moderation.', 'oseo');
							echo '</div>';
						} //endif;

						// comment author says
						printf(__('%s <span class="says">says:</span>', 'oseo'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
					echo '</div><!-- .comment-author -->';

					// comment content body
					comment_text();
					// end comment content body

					// reply link
					comment_reply_link(array_merge($args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' => '<span class="fa fa-reply"></span> ' . __('Reply', 'oseo'),
						'login_text' => '<span class="fa fa-reply"></span> ' . __('Log in to Reply', 'oseo')
					)));
					// end reply link
				echo '</div><!-- .comment-content -->';
				// end comment content



			echo '</article><!-- .comment-body -->';
		} //endif;
	}// bootstrapBasicComment
}


if (!function_exists('bootstrapBasicCommentsPopupLink')) {
	/**
	 * Custom comment popup link
	 *
	 * @return string
	 */
	function bootstrapBasicCommentsPopupLink()
	{
		$comment_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%d</small></span>';
		$comments_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%s</small></span>';
		return comments_popup_link(sprintf($comment_icon, ''), sprintf($comment_icon, '1'), sprintf($comments_icon, '%'), 'btn btn-default btn-xs');
	}// bootstrapBasicCommentsPopupLink
}


if (!function_exists('bootstrapBasicEditPostLink')) {
	/**
	 * Display edit post link
	 */
	function bootstrapBasicEditPostLink()
	{
		$edit_post_link = get_edit_post_link();
		if ($edit_post_link != null) {
		    $edit_btn = '<a class="post-edit-link btn btn-default btn-xs" href="'.$edit_post_link.'" title="' . __('Edit', 'oseo') . '"><i class="edit-post-icon glyphicon glyphicon-pencil" title="' . __('Edit', 'oseo') . '"></i></a>';
		    unset($edit_post_link);
		    echo $edit_btn;
		}
	}// bootstrapBasicEditPostLink
}


if (!function_exists('bootstrapBasicFullPageSearchForm')) {
	/**
	 * Display full page search form
	 *
	 * @return string the search form element
	 */
	function bootstrapBasicFullPageSearchForm()
	{
		$output = '<form class="form-horizontal" method="get" action="' . esc_url(home_url('/')) . '" role="form">';
		$output .= '<div class="form-group">';
		$output .= '<div class="col-xs-10">';
		$output .= '<input type="text" name="s" value="' . esc_attr(get_search_query()) . '" placeholder="' . esc_attr_x('Search &hellip;', 'placeholder', 'oseo') . '" title="' . esc_attr_x('Search &hellip;', 'label', 'oseo') . '" class="form-control" />';
		$output .= '</div>';
		$output .= '<div class="col-xs-2">';
		$output .= '<button type="submit" class="btn btn-default">' . __('Search', 'oseo') . '</button>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</form>';

		return $output;
	}// bootstrapBasicFullPageSearchForm
}


if (!function_exists('bootstrapBasicGetLinkInContent')) {
	/**
	 * get the link in content
	 *
	 * @return string
	 */
	function bootstrapBasicGetLinkInContent()
	{
		$content = get_the_content();
		$has_url = get_url_in_content($content);

		if ($has_url) {
			return $has_url;
		} else {
			return apply_filters('the_permalink', get_permalink());
		}
	}// bootstrapBasicGetLinkInContent
}


if (!function_exists('bootstrapBasicMoreLinkText')) {
	/**
	 * Custom more link (continue reading) text
	 * @return string
	 */
	function bootstrapBasicMoreLinkText()
	{
		return __('Continue reading <span class="meta-nav">&rarr;</span>', 'oseo');
	}// bootstrapBasicMoreLinkText
}


if (!function_exists('bootstrapBasicPagination')) {
	/**
	 * display pagination (1 2 3 ...) instead of previous, next of wordpress style.
	 *
	 * @param string $pagination_align_class
	 * @return string the content already echo
	 */
	function bootstrapBasicPagination($pagination_align_class = 'pagination-center pagination-row')
	{
		global $wp_query;
			$big = 999999999;
			$pagination_array = paginate_links(array(
				'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				'format' => '/page/%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $wp_query->max_num_pages,
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
				'type' => 'array'
			));

			unset($big);

			if (is_array($pagination_array) && !empty($pagination_array)) {
				echo '<nav class="' . $pagination_align_class . '">';
				echo '<ul class="pagination">';
				foreach ($pagination_array as $page) {
					echo '<li';
					if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
						echo ' class="active"';
					}
					echo '>';
					if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
						echo '<span>' . $page . '</span>';
					} else {
						echo $page;
					}
					echo '</li>';
				}
				echo '</ul>';
				echo '</nav>';
			}

			unset($page, $pagination_array);
	}// bootstrapBasicPagination
}


if (!function_exists('oseoPostOn')) {
	/**
	 * display post date/time and author
	 *
	 * @return string
	 */
	function oseoPostOn()
	{

		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		}else{$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';}
		$time_string = sprintf($time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);

		printf(__('<span class="posted-on" title="%1$s">Posted on:  %2$s</span>', 'oseo'),
				esc_attr(get_the_time()),
				$time_string
		);
	}// bootstrapBasicPostOn
}

if (!function_exists('bootstrapBasicTagsList')) {
	/**
	 * display tags list
	 *
	 * @param string $tags_list
	 * @return string
	 */
	function bootstrapBasicTagsList($tags_list = '')
	{
		return sprintf('<span class="tags-icon glyphicon glyphicon-tags" title="' . __('Tagged', 'oseo') . '"></span>&nbsp; %1$s', $tags_list);
	}// bootstrapBasicTagsList
}


if (!function_exists('bootstrapBasicTheAttachedImage')) {
	/**
	 * Display attach image with link.
	 *
	 * @return string image element with link.
	 */
	function bootstrapBasicTheAttachedImage()
	{
		$post                = get_post();
		$attachment_size     = apply_filters('bootstrap_basic_attachment_size', array(1140, 1140));
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts(array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		));

		// If there is more than 1 attachment in a gallery...
		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = current($attachment_ids);
					break;
				}
			}


			if ($next_id) {
				// get the URL of the next image attachment...
				$next_attachment_url = get_attachment_link($next_id);
			} else {
				// or get the URL of the first image attachment.
				$next_attachment_url = get_attachment_link(array_shift($attachment_ids));
			}
		}

		printf('<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url($next_attachment_url),
			the_title_attribute(array('echo' => false)),
			wp_get_attachment_image($post->ID, $attachment_size, false, array('class' => 'img-responsive aligncenter'))
		);
	}// bootstrapBasicTheAttachedImage
}


//add extra fields to category edit form hook
add_action ( 'edit_category_form_fields', 'oseo_category_fields');

if(!function_exists('oseoEntryMeta')){
    function oseoEntryMeta(){
        echo '<div class="entry-meta">';
            oseoPostOn();
            $views = get_post_meta(get_the_ID(),'views', true);
            $likes = get_post_meta(get_the_ID(),'likes', true);
        if($views){
            echo ' | <span class="post-views">Post Views: '. $views .'</span>';
        }
        if($likes){
            echo ' | <span class="post-likes">Likes: <i class="fa fa-heart"></i> '. $likes .'</span> ';
        }
        echo '</div>';

                }
}

//add extra fields to category edit form callback function
function oseo_category_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>
<tr class="form-field">
<th scope="row" valign="top"><label for="view"><?php _e('Category Archive View','oseo'); ?></label></th>
<td>
    <table>
        <thead>
            <td><span class="description"><?php _e('Category Archive view','oseo');?></span></td>
            <td><span class="description"><?php _e('Show Thumbnail','oseo');?></span></td>
            <td><span class="description"><?php _e('Show Excerpt','oseo');?></span></td>
            <td><span class="description"><?php _e('Show Meta','oseo');?></span></td>
        </thead>
        <tr>
            <td>
                <select name="Cat_meta[view]">
                    <option value="" <?php if( $cat_meta['view'] == '' ) echo 'selected="selected"'; ?>><?php _e('&nbsp;','oseo'); ?></option>
                    <option value="cat_view_grid" <?php selected( $cat_meta['view'],'cat_view_grid', 'selected="selected"' ); ?>><?php _e('Grid View','oseo'); ?></option>
                    <option value="cat_view_list" <?php selected( $cat_meta['view'],'cat_view_list', 'selected="selected"' ); ?>><?php _e('List View','oseo'); ?></option>
                </select>
            </td>
            <td>
                <select name="Cat_meta[show_excerpt]">
                    <option value="yes" <?php selected( $cat_meta['show_thumbnail'],'yes', 'selected="selected"' ); ?>><?php _e('Yes','oseo'); ?></option>
                    <option value="no" <?php selected( $cat_meta['show_thumbnail'],'no', 'selected="selected"' ); ?>><?php _e('No','oseo'); ?></option>
                </select>
            </td>
            <td>
                <select name="Cat_meta[show_thumbnail]">
                    <option value="yes" <?php selected( $cat_meta['show_excerpt'],'yes', 'selected="selected"' ); ?>><?php _e('Yes','oseo'); ?></option>
                    <option value="no" <?php selected( $cat_meta['show_excerpt'],'no', 'selected="selected"' ); ?>><?php _e('No','oseo'); ?></option>
                </select>
            </td>
            <td>
                <select name="Cat_meta[show_meta]">
                    <option value="yes" <?php selected( $cat_meta['show_meta'],'yes', 'selected="selected"' ); ?>><?php _e('Yes','oseo'); ?></option>
                    <option value="no" <?php selected( $cat_meta['show_meta'],'no', 'selected="selected"' ); ?>><?php _e('No','oseo'); ?></option>
                </select>
            </td>
        </tr>
    </table>
</td>
</tr>
<?php
}
add_action ( 'edited_category', 'save_extra_category_fileds');

// save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}

if(is_active_sidebar('sticky_sidebar')){
    function sticky_sidebar_js(){
        return '    <script>
        $(function() {

    var offset = $("#sticky_sidebar").offset();
    var topPadding = 150;
    $(window).scroll(function() {
        if ($(window).scrollTop() > offset.top) {
            $("#sticky_sidebar").stop().animate({
                marginTop: $(window).scrollTop() - offset.top + topPadding
            });
        } else {
            $("#sticky_sidebar").stop().animate({
                marginTop: 0
            });
        }
    });

});
</script>
';
    }
    add_action('wp_footer_sticky','sticky_sidebar_js');
}