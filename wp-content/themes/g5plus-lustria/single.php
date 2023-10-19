<?php
/**
 * The template for displaying single
 *
 */
$single_post_layout = G5Plus_Lustria()->options()->get_single_post_layout();
G5Plus_Lustria()->helper()->getTemplate("single/{$single_post_layout}/layout");


