<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class SwampTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('SwampTerrainType::TERRAIN_NAME');
    $this->is('swamp', SwampTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('SwampTerrainType::TERRAIN_CSS_CLASS');

    $this->is('swamp', SwampTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('SwampTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.swamp", SwampTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
SwampTerrainTypeTest::run();
