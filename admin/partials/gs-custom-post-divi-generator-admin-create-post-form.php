<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.giorgiosaud.com/me
 * @since      1.0.0
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="container">

	<h1 class="header"><?php _e('Create a Custom Post','gs-custom-post-divi-generator')?></h1>
	<div class="row">
		<div class="col s12">
			<div class="card light-green lighten-4">
				<div class="card-content">
					<div class="row">
						<form class="col s12" method="post">
							<div class="row">
								<div class="input-field col s12">
									<input required type="text" name="name" placeholder="name" size="30" value="" id="title" spellcheck="true" autocomplete="off">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input required type="text" name="plural" placeholder="plural" size="30" value="" id="title" spellcheck="true" autocomplete="off">
								</div>
								<div class="input-field col s6">
									<input required type="text" name="singular" placeholder="singular" size="30" value="" id="title" spellcheck="true" autocomplete="off">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea required id="description" name="description" class="materialize-textarea"></textarea>
									<label for="textarea1"><?php _e('Description','gs-custom-post-divi-generator')?></label>
								</div>
							</div>
							<div class="row">
								<div class="col s6">
									<button type="submit" class="waves-effect waves-light btn"><?php _e('Save','gs-custom-post-divi-generator')?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
