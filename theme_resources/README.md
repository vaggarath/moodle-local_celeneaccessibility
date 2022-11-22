# Celeneaccessibility
## Theme necessities to use the plugin
```Important : Tested only with Moodle 4.0.1 & higher```
#### Pre-requisites
 - You theme needs to be a child of the Boost theme.
 - The last moodle recommanded version of grunt needs to be installed.

#### List of the files
- **amd/src/guiding.js & amd/src/tts.js**  are both to enable the reading helper and the TTS option
- **layout/drawers.php** This is where the theme gets the user options from the database and sets the body classes
- **templates/drawers.mustache & head.mustache** 1st one is to dispatch body's classes, call the JS script and enable the reading helper

## What to do
You need to include these file into your child theme (or, if you're brave enough inside your boost theme. But it's more than VERY HIGHLY recommanded to use a child theme based on Boost).

Inside drawers.php don't forget to change the theme name !

Inside your theme you need to run the grunt command in order to compile the js files and be able to exploit them :
```shell
x$: cd path/to/your/moodle/theme/yourtheme
x$: grunt amd
```

### Potential error with Grunt
It's very unlikely if you use the last version of grunt & eshint but you may get an "err_func_loop" error from grunt when compiling.
This error is a false positive. You can either shut the error off by giving instruction to eshint or use the command --force
```
grunt amd --force
```


# Celeneaccessibility
## Theme necessities to use the plugin
```Important : Tested only with Moodle 4.0.1 & higher```
#### Pre-requisites
 - You theme needs to be a child of the Boost theme.
 - The last moodle recommanded version of grunt needs to be installed.

#### List of the files
- **amd/src/guiding.js & amd/src/tts.js**  are both to enable the reading helper and the TTS option
- **layout/drawers.php** This is where the theme gets the user options from the database and sets the body classes
- **templates/drawers.mustache & head.mustache** 1st one is to dispatch body's classes, call the JS script and enable the reading helper

## What to do
You need to include these file into your child theme (or, if you're brave enough inside your boost theme. But it's more than VERY HIGHLY recommanded to use a child theme based on Boost).

Inside drawers.php don't forget to change the theme name !

Inside your theme you need to run the grunt command in order to compile the js files and be able to exploit them :
```shell
x$: cd path/to/your/moodle/theme/yourtheme
x$: grunt amd
```

### Potential error with Grunt
It's very unlikely if you use the last version of grunt & eshint but you may get an "err_func_loop" error from grunt when compiling.
This error is a false positive. You can either shut the error off by giving instruction to eshint or use the command --force
```
grunt amd --force
```