<?php

namespace local_celeneaccessibility\privacy;

use core_privacy\local\metadata\collection;

class provider implements
        \core_privacy\local\metadata\provider {

    public static function get_metadata(collection $collection): collection {

        $collection->add_user_preference('theme_celene4boost_darkbtn', 'privacy:metadata:preference:theme_celene4boost_darkbtn');
        $collection->add_user_preference('theme_celene4boost_parkinson', 'privacy:metadata:preference:theme_celene4boost_parkinson');
        $collection->add_user_preference('theme_celene4boost_letter', 'privacy:metadata:preference:theme_celene4boost_letter');
        $collection->add_user_preference('theme_celene4boost_word', 'privacy:metadata:preference:theme_celene4boost_word');
        $collection->add_user_preference('theme_celene4boost_line', 'privacy:metadata:preference:theme_celene4boost_line');
        $collection->add_user_preference('theme_celene4boost_font', 'privacy:metadata:preference:theme_celene4boost_font');
        $collection->add_user_preference('theme_celene4boost_blue', 'privacy:metadata:preference:theme_celene4boost_blue');
        $collection->add_user_preference('theme_celene4boost_fontsize', 'privacy:metadata:preference:theme_celene4boost_fontsize');
        $collection->add_user_preference('theme_celene4boost_lowsat', 'privacy:metadata:preference:theme_celene4boost_lowsat');
        $collection->add_user_preference('theme_celene4boost_texttransform', 'privacy:metadata:preference:theme_celene4boost_texttransform');

        return $collection;
    }
}