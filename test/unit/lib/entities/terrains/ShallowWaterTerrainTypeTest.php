<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class ShallowWaterTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('ShallowWaterTerrainType::getName()');
    $this->is('shallow water', ShallowWaterTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('ShallowWaterTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} shallow water", ShallowWaterTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
ShallowWaterTerrainTypeTest::run();
