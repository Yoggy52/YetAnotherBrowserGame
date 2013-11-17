<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class JungleTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('JungleTerrainType::getName()');
    $this->is('jungle', JungleTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('JungleTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} jungle", JungleTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
JungleTerrainTypeTest::run();
