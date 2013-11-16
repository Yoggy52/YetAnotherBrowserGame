<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class HillTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('HillTerrainType::getName()');
    $this->is('hill', HillTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('HillTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.hill", HillTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
HillTerrainTypeTest::run();
