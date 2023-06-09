<?php
/**
 * The template for displaying episode content within loops
 *
 * This template can be overridden by copying it to yourtheme/masvideos/content-episode-title_list.php.
 *
 * HOWEVER, on occasion MasVideos will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package MasVideos/Templates
 * @version 1.0.0
 */


defined( 'ABSPATH' ) || exit;

global $episode;

// Ensure visibility.
if ( empty( $episode ) || ! $episode->is_visible() ) {
    return;
}

?>
<div <?php masvideos_episode_class(); ?>>
    <?php
        masvideos_template_loop_episode_link_open();
        masvideos_template_loop_episode_title();
        masvideos_template_loop_episode_link_close();
    ?>
</div>
