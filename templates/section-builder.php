<?php
/**
 * Template Name: Section Builder
 */

get_header();


get_template_part('partials/common/hero');

while(have_rows('app_sections')) {
    the_row();

    $layout = get_row_layout();
    $section = get_row(true);

    set_query_var('section_data', $section);
    get_template_part('partials/sections/' . $layout);
}

get_footer();
