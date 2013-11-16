<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/../../../bootstrap/unit.php');

$t = new lime_test(4);

// tests for horizontal size
$scenario = new ScenarioBean();
$t->is(10, $scenario->getHorizontalSize(), 'tests if a horizontal size was 10 by default');
$scenario->setHorizontalSize(20);
$t->is(20, $scenario->getHorizontalSize(), 'tests if a horizontal size was correctly set');

// tests for vertical size
$t->is(10, $scenario->getVerticalSize(), 'tests if a vertical size was 10 by default');
$scenario->setVerticalSize(20);
$t->is(20, $scenario->getVerticalSize(), 'tests if a vertical size was correctly set');
