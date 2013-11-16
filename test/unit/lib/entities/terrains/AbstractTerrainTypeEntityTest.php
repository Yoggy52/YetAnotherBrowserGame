<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class AbstractTerrainTypeEntityTest extends AbstractLimeTest
{
  public function test_getInstance()
  {
    $this->diag('AbstractTerrainTypeEntity::getInstance()');

    $foo = FooTerrainType::getInstance();
    $bar = BarTerrainType::getInstance();
    
    $this->is(false, $foo === $bar, 'getInstance() should not return the same object for two different terrain types');
    $this->isa_ok($foo, 'FooTerrainType', 'FooTerrainType::getInstance() returns an instance of FooTerrainType');
    $this->isa_ok($bar, 'BarTerrainType', 'BarTerrainType::getInstance() returns an instance of BarTerrainType');
  }
  
  public function test_getName()
  {
    $this->diag('AbstractTerrainTypeEntity::getName()');
    
    $this->is('foo_name', FooTerrainType::getName(), 
      'FooTerrainType::getName() static call returns the terrain type name');
    
    $foo = FooTerrainType::getInstance();
    $this->is('foo_name', $foo->getName(), 
      '$foo->getName() non static call returns the terrain type name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('AbstractTerrainTypeEntity::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    
    $this->is(".{$base_class}.foo_css", FooTerrainType::getCssClass(),
      'FooTerrainType::getCssClass() static call returns the right css class');

    $foo = FooTerrainType::getInstance();
    $this->is(".{$base_class}.foo_css", $foo->getCssClass(),
      '$foo->getCssClass() non static call returns the right css class');
  }
}

class FooTerrainType extends AbstractTerrainTypeEntity
{
  const TERRAIN_NAME = 'foo_name';
  const TERRAIN_CSS_CLASS = 'foo_css';
}

class BarTerrainType extends AbstractTerrainTypeEntity
{
  const TERRAIN_NAME = 'bar_name';
  const TERRAIN_CSS_CLASS = 'bar_css';
}

AbstractTerrainTypeEntityTest::run();
