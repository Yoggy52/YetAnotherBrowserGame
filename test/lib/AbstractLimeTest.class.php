<?php

abstract class AbstractLimeTest extends lime_test
{
  public static function run()
  {
    $test = new static;
    $functions = get_class_methods($test);
    foreach ($functions as $function) {
      if (preg_match('/^test_/i', $function)) {
        $test->$function();
      }
    }
  }
}
