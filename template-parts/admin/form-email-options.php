<h1>Email Settings</h1>
<form  class="wsu-t-covid__email-form" method="post" action="<?php echo esc_url( $form_url ); ?>">
	<input type="hidden" value="email_options" name="page" />
	<input type="hidden" value="update" name="email_options_action" />
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Send From</label>
		<input type="text" value="<?php echo esc_attr( $options['send_from'] ); ?>" name="send_from" placeholder="Send From Email" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Send From Text Title</label>
		<input type="text" value="<?php echo esc_attr( $options['send_from_title'] ); ?>" name="send_from_title" placeholder="Send From Title" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Bcc To</label>
		<input type="text" value="<?php echo esc_attr( $options['bcc_to'] ); ?>" name="bcc_to" placeholder="Bcc To" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Bcc To</label>
		<input type="text" value="<?php echo esc_attr( $options['bcc_to_alt'] ); ?>" name="bcc_to_alt" placeholder="Bcc To" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Reply To</label>
		<input type="text" value="<?php echo esc_attr( $options['reply_to'] ); ?>" name="reply_to" placeholder="Reply To" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Email Subject Line</label>
		<input type="text" value="<?php echo esc_attr( $options['subject'] ); ?>" name="subject" placeholder="Email Subject" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<label>Empty Posts Text</label>
		<input type="text" value="<?php echo esc_attr( $options['empty_posts'] ); ?>" name="empty_posts" placeholder="Email Subject" />
	</div>
	<h3>Merge Tags</h3>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--html">
		<ul>
			<li><strong>[e_post_feed]</strong> ... <strong>[/e_post_feed]</strong> | Optional | Repeate inside content for each post.
				<ul>
					<li>Example [e_post_feed] ... [/e_post_feed] or [e_post_feed categories="643" by_time="24 hours ago"] ... [/e_post_feed]</strong> >/li>
					<li>categories="" | Optional | Category IDs to include. Example: categories="635,634"</li>
					<li>post_ids="" | Optional | Query by post ID. Example: post_ids="10,11"</li>
					<li>exclude_post_ids="" | Optional | Exclude by post ID. Example: exclude_post_ids="11"</li>
					<li>exclude_categories="" | Optional | Category IDs to include. Example: exclude_categories="635,634"</li>
					<li>orderby="date" | Optional | Change how posts are ordered. https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters</li>
					<li>order="DESC" | Optional | Designates ascending or descending order. (ASC)</li>
					<li>count="20" | Optional | Show number of posts.</li>
					<li>by_time="" | Optional | Limit posts by time query. Example: by_time="24 hours ago" or by_time="36 hours ago"</li>
					<li>empty_posts_text="" | Optional | Show Text if no posts are found</li> 
				</ul>
			</li>
			<li><strong>[e_has_posts]</strong> ... <strong>[/e_has_posts]</strong> | Optional | Show inside content if posts exist. NOTE: use same attributes as [e_post_feed].
				<ul>
					<li>[e_has_posts categories="643" by_time="24 hours ago"] ... [/e_has_posts]</strong> >/li>
				</ul>
			</li>
			<li><strong>[e_post_title]</strong> | Optional | Show inside content if posts exist.</li>
			<li><strong>[e_post_link]</strong> ... <strong>[/e_post_link]</strong> | Optional | Wrap content in link to post.
				<ul>
					<li>style="" | Optional | Inline Style to add.</li>
				</ul>
			</li>
			<li><strong>[e_post_content]</strong> | Optional | Show post content.</li>
			<li><strong>[e_post_excerpt]</strong> | Optional | Show post excerpt.</li>
			<li><strong>[e_date]</strong> | Optional | Show date with supplied PHP date format.</li>
			<li><strong>[e_date_month]</strong> | Optional | Show text of month (ie. March)</li>
			<li><strong>[e_date_day]</strong> | Optional | Show numerical day (ie. 15)</li>
			<li><strong>[e_date_day_name]</strong> | Optional | Show text day (ie. Monday)</li>
		</ul>
	</div>
	<h2>Email Template</h2>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--textarea">
		<textarea name="email_template"><?php echo stripslashes( $options['email_template'] ); ?></textarea>
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--submit">
		<input type="submit" value="Save" />
	</div>
</form>
<div class="wsu-t-covid__email-wrapper"> 
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--button">
		<a href="<?php echo esc_url( get_site_url() ); ?>?preview_wsu_email=true" target="_blank" >View Email</a>
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--button">
		<a href="<?php echo esc_url( get_site_url() ); ?>?preview_wsu_email=true&demo_content=true" target="_blank" >View Email (demo content)</a>
	</div>
</div>
<form  class="wsu-t-covid__email-form" method="post" action="<?php echo esc_url( $form_url ); ?>">
	<input type="hidden" value="send_test" name="send_test" />
	<h2>Send Test Email</h2>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--text">
		<input type="text" value="" name="send_to" placeholder="Test Email Addresses" />
	</div>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--submit">
		<input type="submit" value="Send Test Email" />
	</div>
</form>
<form  class="wsu-t-covid__email-form" method="post" action="<?php echo esc_url( $form_url ); ?>">
	<input type="hidden" value="send_manual" name="send_manual" />
	<h2>Send Manual Email</h2>
	<div class="wsu-t-covid__email-form-field wsu-t-covid__email-form-field--submit">
		<input type="submit" value="Send Email Manual" />
	</div>
</form>
<style>
	.wsu-t-covid__email-wrapper,
	.wsu-t-covid__email-form {
		padding-left: 1rem;
		padding-right: 1rem;
		box-sizing: border-box;
		border-bottom: 1px solid #777;
		margin-bottom: 2rem;
		margin-top: 2rem;
	}
	.wsu-t-covid__email-form-field {
		margin-bottom: 1.5rem;
	}
	.wsu-t-covid__email-form-field--text input {
		width: 400px;
		max-width: 100%;
	}
	.wsu-t-covid__email-form-field--textarea textarea {
		width: 100%;
		max-width: 700px;
		height: 800px;
	}
	.wsu-t-covid__email-form-field--html ul ul {
		margin-left: 2rem;
		list-style-type: disc;
	}

	.wsu-t-covid__email-form-field label {
		display: block;
	}
	.wsu-t-covid__email-form-field--submit input,
	.wsu-t-covid__email-form-field--button a {
		display: inline-table;
		margin: 0;
		padding: 15px 30px;
		-webkit-transition: background-color .3s cubic-bezier(0,0,.03,1);
		-o-transition: background-color .3s cubic-bezier(0,0,.03,1);
		transition: background-color .3s cubic-bezier(0,0,.03,1);
		text-decoration: none;
		color: #fff !important;
		border: none;
		border-radius: 5px;
		background-color: #ca1237;
		font-size: 12px;
		font-weight: 600;
		line-height: 1.5;
		cursor: pointer;
	}
</style>
