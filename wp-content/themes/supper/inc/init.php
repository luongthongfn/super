<?php
require('_CONSTANT.php');
// foreach (glob("include-file/*.php") as $filename)
// {
//     echo('glob__'.$filename);
// }

include('include-file/add-setting.php');
include('include-file/add-setting-class.php');

include('include-file/theme-support.php');
include('include-file/style-script-register.php');
include('include-file/template-function.php');

include('include-file/custom-post-type.php');
include('include-file/custom-post-type-add-meta-box.php');

include('include-file/custom-taxonomy.php');
include('include-file/custom-taxonomy-add-meta-box.php');

//plugin
include('include-file/plugin-owlcarousel2.php');



