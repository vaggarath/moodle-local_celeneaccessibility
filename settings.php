<?php

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_celeneaccessibility', get_string('pluginname', 'local_celeneaccessibility'));
    $ADMIN->add('localplugins', $settings);

    if ($ADMIN->fulltree) {
        require_once($CFG->dirroot . '/local/celeneaccessibility/lib.php');

        $settings->add(new admin_setting_configcheckbox(
            'local_celeneaccessibility/showtts', //name wich we retrieve it on index.php (and anywhere we'd use it)
            get_string('showtts', 'local_celeneaccessibility'), //checkbox' displayed label
            get_string('showttsdesc', 'local_celeneaccessibility'), //description of the option
            '0',
        ));

        $settings->add(new admin_setting_configcheckbox(
            'local_celeneaccessibility/showguiding', //name wich we retrieve it on index.php (and anywhere we'd use it)
            get_string('showguiding', 'local_celeneaccessibility'), //checkbox' displayed label
            get_string('showguidingdesc', 'local_celeneaccessibility'), //description of the option
            '0',
        ));

        $settings->add(new admin_setting_confightmleditor('local_celeneaccessibility/adminMessage', get_string('adminmessage', 'local_celeneaccessibility'), '', ''));

        // nettoyer la base de données

    }
}
