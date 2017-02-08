<?php

# Reference this template tag in your theme files (inside the loop) to print the form's embed code.
# To display a form outside the loop, simply provide the post's ID.
function the_olx_form ($post_id = null) {

	global $blackbaud;
	global $post;

	$html = "";

	if (! isset ($post_id)) {
		$post_id = $post->ID;
	}

    $plugin = $blackbaud->get_plugin("olx_forms");

	if (! $cpt = $plugin->forged("custom_post_type", true)) {
    	echo "<h4>Form not found.</h4>";
    	return false;
	}

	# Add the embed code.
	$html .= $cpt->meta($post_id, "embed_code");

	# Add the html-after.
	$html .= $cpt->meta($post_id, "html_after");

    # Social Sharing Lightbox.
	$data = $plugin->module("SocialSharing")->get_data($post_id);

	# Add data- attributes to the page, to be collected by BBI.
	if (isset($data["active"]) && $data["active"] == "true") {
		$html .= $plugin->get_template("app-data-attributes.blackbaud-olx.php", $data);
	}

    # Add the html to the page.
	echo $html;

}
