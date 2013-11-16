<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class DesertTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('DesertTerrainType::TERRAIN_NAME');
    $this->is('desert', DesertTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('DesertTerrainType::TERRAIN_CSS_CLASS');

    $this->is('desert', DesertTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('DesertTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.desert", DesertTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
DesertTerrainTypeTest::run();
