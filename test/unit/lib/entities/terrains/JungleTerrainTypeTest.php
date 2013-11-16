<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class JungleTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('JungleTerrainType::TERRAIN_NAME');
    $this->is('jungle', JungleTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('JungleTerrainType::TERRAIN_CSS_CLASS');

    $this->is('jungle', JungleTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('JungleTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.jungle", JungleTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
JungleTerrainTypeTest::run();
