<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class SnowTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('SnowTerrainType::TERRAIN_NAME');
    $this->is('snow', SnowTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('SnowTerrainType::TERRAIN_CSS_CLASS');

    $this->is('snow', SnowTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
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
