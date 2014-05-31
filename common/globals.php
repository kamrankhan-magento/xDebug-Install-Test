<?php
/**
 * @param $object
 * @param string $name
 * @param bool $attributesOnly
 */
function printr($object, $name = '', $attributesOnly = true)
{
    $console = false;
    if (in_array(php_sapi_name(), array('cli'))) {
        $console = true;
    }
    $classHint = '';
    if ($attributesOnly && (is_array($object) || is_object($object))) {
        if (is_object($object)) {
            $class = get_class($object);
            if (!$name)
                $name = $class;
            else
                $classHint = 'type: ' . $class;
        }
        if (function_exists('getAttributes')){
            $object = getAttributes($object);
        }
    }
    $bt = debug_backtrace();
    $bp = (class_exists('Yii') && !empty(Yii::app()->basePath) )? Yii::app()->basePath : false;
    $file = str_replace($bp, '', $bt[0]['file']);

    if ($console) {
        print  $file . ' on line ' . $bt[0]['line'] . " $name is: ";
    }
    else {
        print '<div style="background: #FFFBD6">';
        $nameLine = '';
        if ($name)
            $nameLine = '<b> <span style="font-size:18px;">' . $name . "</span></b> $classHint printr:<br/>";
        print '<span style="font-size:12px;">' . $nameLine . ' ' . $file . ' on line ' . $bt[0]['line'] . '</span>';
        print '<div style="border:1px solid #000;">';
        print '<pre>';
    }

    if (is_array($object))
        print_r($object);
    else
        var_dump($object);
    if (!$console) {
        print '</pre>';
        echo '</div></div><hr/>';
    }
}
