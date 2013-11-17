<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class SwampTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('SwampTerrainType::getName()');
    $this->is('swamp', SwampTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('SwampTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} swamp", SwampTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
SwampTerrainTypeTest::run();
