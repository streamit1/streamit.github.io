<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/masvideos/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion MasVideos will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package MasVideos/Templates
 * @version 1.1.6
 */

defined( 'ABSPATH' ) || exit;

do_action( 'masvideos_before_edit_account_form' ); ?>

<form class="masvideos-EditAccountForm edit-account" action="" method="post" <?php do_action( 'masvideos_edit_account_form_tag' ); ?> >

	<?php do_action( 'masvideos_edit_account_form_start' ); ?>

	<p class="masvideos-form-row masvideos-form-row--first fieldset-first-name">
		<label for="account_first_name"><?php esc_html__( 'First name', 'streamit' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="masvideos-Input masvideos-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="masvideos-form-row masvideos-form-row--last fieldset-last-name">
		<label for="account_last_name"><?php esc_html__( 'Last name', 'streamit' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="masvideos-Input masvideos-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>

	<p class="masvideos-form-row masvideos-form-row--wide fieldset-display-name">
		<label for="account_display_name"><?php esc_html__( 'Display name', 'streamit' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="masvideos-Input masvideos-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html__( 'This will be how your name will be displayed in the account section and in reviews', 'streamit' ); ?></em></span>
	</p>

	<p class="masvideos-form-row masvideos-form-row--wide fieldset-email">
		<label for="account_email"><?php esc_html__( 'Email address', 'streamit' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="email" class="masvideos-Input masvideos-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<h2 class="password-fields"><?php echo esc_html__( 'Password change', 'streamit' ); ?></h2><?php // @codingStandardsIgnoreLine ?>

	<p class="masvideos-form-row masvideos-form-row--wide fieldset-current-pass">
		<label for="password_current"><?php esc_html__( 'Current password (leave blank to leave unchanged)', 'streamit' ); ?></label>
		<input type="password" class="masvideos-Input masvideos-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
	</p>

	<p class="masvideos-form-row masvideos-form-row--wide fieldset-new-pass">
		<label for="password_1"><?php esc_html__( 'New password (leave blank to leave unchanged)', 'streamit' ); ?></label>
		<input type="password" class="masvideos-Input masvideos-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
	</p>

	<p class="masvideos-form-row masvideos-form-row--wide fieldset-confirm-pass">
		<label for="password_2"><?php esc_html__( 'Confirm new password', 'streamit' ); ?></label>
		<input type="password" class="masvideos-Input masvideos-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
	</p>

	<?php do_action( 'masvideos_edit_account_form' ); ?>

	<p class="masvideos-form-submit">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="masvideos-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'streamit' ); ?>"><?php esc_html__( 'Save changes', 'streamit' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'masvideos_edit_account_form_end' ); ?>
</form>

<?php do_action( 'masvideos_after_edit_account_form' ); ?>
