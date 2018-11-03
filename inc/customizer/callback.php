<?php

function breaking_product_callback( $control ) {
	if ( $control->manager->get_setting( 'magazil_breaking_news_type' )->value() == 'product' ) {
		return true;
	}
	return false;
}

function breaking_cat_callback( $control ) {
	if ( $control->manager->get_setting( 'magazil_breaking_news_type' )->value() == 'category' ) {
		return true;
	}
	return false;
}

function breaking_custom_callback( $control ) {
	if ( $control->manager->get_setting( 'magazil_breaking_news_type' )->value() == 'custom' ) {
		return true;
	}
	return false;
}

function breaking_page_callback( $control ) {
	if ( $control->manager->get_setting( 'magazil_breaking_news_type' )->value() == 'page' ) {
		return true;
	}
	return false;
}

function breaking_limit_callback( $control ) {
	$limit_val_cb = $control->manager->get_setting( 'magazil_breaking_news_type' )->value();
	if ( $limit_val_cb == 'page' || $limit_val_cb == 'custom' ) {
		return false;
	}
	return true;
}

?>