<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class ShallowWaterTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('ShallowWaterTerrainType::TERRAIN_NAME');
    $this->is('shallow water', ShallowWaterTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('ShallowWaterTerrainType::TERRAIN_CSS_CLASS');

    $this->is('water.shallow', ShallowWaterTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('ShallowWaterTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.water.shallow", ShallowWaterTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
ShallowWaterTerrainTypeTest::run();
