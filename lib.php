<?php

defined('MOODLE_INTERNAL') || die();

function local_celeneaccessibility_myprofile_navigation(core_user\output\myprofile\tree $tree, $user, $iscurrentuser, $course) {
    if (!isloggedin() || isguestuser()) {
        return '';
    }

    $category = new core_user\output\myprofile\category('local_celeneaccessibility/management', "Accessibilité", null);
    $tree->add_category($category);

    $name = get_string('menuname', 'local_celeneaccessibility');
    $url = new moodle_url('/local/celeneaccessibility/index.php');

    $localnode =  new core_user\output\myprofile\node('local_celeneaccessibility/management', 'celeneaccessibility',
            $name, null, $url, null, null,'local-celeneaccessibility');
    $tree->add_node($localnode);
}