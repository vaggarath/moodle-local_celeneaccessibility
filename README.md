
# celene / local_celeneaccessibility

A small plug-in to offer accessibility options to moodle's users

Works by adding / removing classes to the body element. No custom JS.

Needs some minor adjustment on theme's files: 
- drawers' renderer 
- SCSS 
*CF either celene4boost accessibility branch or master if merged.*

Sets user's preferences in DB on **mdl_user_preferences** (*set_user_preferences($name, $value, $userid)*)

Delete user's preferences on removal of options to optimize DB's data volume (*unset_user_preferences($name, $userid)*)




