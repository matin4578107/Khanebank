<?php
// spl_autoload_register(function($class) {
//     // var_dump($class, sprintf("%s.php", $class));
//     require_once sprintf("%s.php", $class);
// });

spl_autoload_register(function ($class) {
    // var_dump($class);
    // project-specific namespace prefix
    $prefix = '';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';
    // var_dump($base_dir);

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    // var_dump(strncmp($prefix, $class, $len), $prefix, $class, $len);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);
    // var_dump($relative_class);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // var_dump($file);
    // if the file exists, require it
    if (file_exists($file)) {
        // var_dump($file);
        require $file;
    }
});


?>