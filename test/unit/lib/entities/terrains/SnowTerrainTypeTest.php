<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class SnowTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('SnowTerrainType::getName()');
    $this->is('snow', SnowTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('SnowTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.snow", SnowTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
SnowTerrainTypeTest::run();
