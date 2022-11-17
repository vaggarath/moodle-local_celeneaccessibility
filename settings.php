<?php

if ($hassiteconfig) {
    //recuperer toutes les options vides pour les compter et plus tard proposer une option pour les nettoyer
    $sql = "SELECT *
            FROM {user_preferences}
            WHERE name LIKE :name AND value=''";
    $records = $DB->get_records_sql($sql, array('name'=>"theme_celene4boost_%"));

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

        $settings->add(new admin_setting_heading('local_celeneaccessibility/count', '', get_string('countempty', 'local_celeneaccessibility').' : '.count($records)));
        // nettoyer la base de données

    }
}
