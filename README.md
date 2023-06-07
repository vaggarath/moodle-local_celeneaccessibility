# Celeneaccessibility

## Important : This plugin is still in early beta! It works fine so far but no "in depth" test has been performed yet.
Another important thing to take in consideration is that this plugin doesn't have the purpose to bypass moodle in core accessibility functionnality but to propose other tools to enhance / provide better experience if possible.
Even more important: In no way does this plugin should be used as an excuse for content writers to not follow accessibility rules. Moodle has several guidelines for good practices to follow when creating content and they should be respected from start to end.

### Why this plugin?
This plugin respond to a need to add more options for user experience we got from our students and teachers.
While being called it an accessibility plugin, it's more of an user experience improver.
We needed a tool to add more to the moodle "in core" accessibility which relies essentially on the teachers way of writtings their course without offering enough tools to enhance the display.
Some examples:

- Someone with visual deficiency may need to enlarge the text or may need to make the images' colors more vivid.

- The Dys community has even more issues to be addressed and writting this plugin was quite a challenge because we realised along the way that being a dys is being unique. Every dys has it's own way to apprehend reading and, overall, learning. Some needs special fonts while other will struggle with words, letters or line spacing. On another side of the spectrum, some have concentration trouble which can also be helped thanks to a reading helper which enhance only a couple of lines of reading while "caching" whats around, up and down.https://moodle.org/plugins/local_celeneaccessibilitykhttps://moodle.org/plugins/local_celeneaccessibility

- We also added a text to speech option. As much as a gadget as it seems, it may provide a usefull tool for some that do not have financial means to get a more professional tool.

The plugin is not really complicated in itself, the code is quite forward and relies essentially on the css to modify the pages. The trickiest was how to simplify the most possible the integration and adjustements needed into the theme's files as it doesn't seem possible yet to modify the theme renderer / drawers from a local plugin, (or i'm just not smart enough to figure how to! Frankly speaking it's more than probable).https://vinorodrigues.github.io/bootstrap-dark-5/

### Available options :
1. Dark theme
2. Blue light filter
3. Text size
4. Fonts choice
5. Letters spacing
6. Words spacing
7. Interline
8. Text case
9. Images' color rendering
10. Clic and selection improvment for motor impaired user
11. Reading guide line (activation on ESC key)
12. Text To Speech option (on right click)
13. Statistic page for administrators to have visual stats about users usage

## Theme necessities to use the plugin
```Important : Tested only with Moodle 4.0.4 to 4.1.1```
#### Pre-requisites
 - Theme Boost (or boost child theme)

### How to install
#### The way the plugin works

When a user sets an option, it's recorded in the "user_preferences" table with the userid, the name of the option and the value of this one.

#### What's to be done on the theme side

On the boost theme or it's child it's easy and quick.
On the layout/drawers.php it's needed to catch the user recorded choices to add classes to the body (or to the html element for the dark mode).
Below is how i worked around it :

`//in layout/drawers.php`

`$templatecontext = [`
    `...`
    `'bodyattributes' => $OUTPUT->body_attributes``(\local_celeneaccessibility\extraclasses::get_extra_classes()),`
    `'theme_mode' => \local_celeneaccessibility\extraclasses::dark_mode() ? 'dark' : null,`
    `'bgnavbar' => \local_celeneaccessibility\extraclasses::dark_mode() ? 'bg-dark' : null,`
    `'language' => \local_celeneaccessibility\extraclasses::get_language(),`
`];`

While there isn't anything in particular to do for the TTS option, the reading helper will also need a bit of tweaking in the theme.
Be it the boost theme or a child of it, you'll have to add a bit of html into the `drawers.mustache` file in the templates folder of your theme.

Here is how i went :

`
``{{#guiding}}``

    {{! if guiding is true. CF layout/drawers.php }}

    {{#js}}

    require (['core/first'],function(){

            require(['local_celeneaccessibility/guiding','core/log'],function(fu,log){

        });

    });

    {{/js}}
    <div id="reading-line" class="d-none">

        <div id="readingLine" draggable="true"  class="d-none">
            <div class='resizers'>
                <div class='resizer top-left'></div>
                <div class='resizer top-right'></div>
                {{! <div class='resizer bottom-left'></div>
                <div class='resizer bottom-right'></div> }}
            </div>
        </div>
    </div>
    <span class="celeneguidingHelp">{{#str}}guidinghelp, local_celeneaccessibility{{/str}}</span>

``{{/guiding}}``

`

### The dark mode
It's the tricky part.
The way we worked around it is quite specific to our way of proposing the option before this plugin came to development.
We use the bootstrap plugin : https://vinorodrigues.github.io/bootstrap-dark-5/
The way it works :
We import the scss need file into the core.scss of our theme.
We trigger the night mode by adding a class to the HTML element.

The class is added through the drawers.php and the head.mustaches files.

If you use a method that use a class on body instead of the html element you'll need to change that into drawers.php and the template file head won't be necessary anymore.

** It should be noted that the bootstrap night mode isn't fully compatible with moodle and some adjustment (nothing too dramatic) may be needed into you css/scss file **

### How to activate
For user experience we made a custom link into the navbar (with fontawesome icon) but we, at first, made a custom link into the customusermenuitems.
If it's the chosen option, the way to do is pretty straight forward : Go to administration > presentation > theme settings and navigate down to the custom user menu items and inside it copy paste the following line : Accessibility|/local/celeneaccessibility/index.php

### Plugin settings
- The plugin has a setting page in the administration part of the site. It's nothing to tedious : It's to activate (or not) the TTS option, (we need it but it can be unnecessary).
- Same for the guiding line.
- Force the TTS default's language. This can be override by the user for him/herself. Only to language are proposed for the moment which are french and english.
- Administrator message : It's to write a text which'll be displayed on the user accessibility page.

![preview](./accessibilite-1-up.png "preview 1")
![preview](./accessibilite-2-down.png "preview 2")
![preview](./accessibilite-3-TTS.png "preview 3")
![preview](./stats.png "Admin stats")
![preview](./guiding.png "Admin stats")
![preview](./guiding2.png "Admin stats")
