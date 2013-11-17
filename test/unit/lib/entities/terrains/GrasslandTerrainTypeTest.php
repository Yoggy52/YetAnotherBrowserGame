<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class GrasslandTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('GrasslandTerrainType::getName()');
    $this->is('grassland', GrasslandTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('GrasslandTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} grass", GrasslandTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
GrasslandTerrainTypeTest::run();
