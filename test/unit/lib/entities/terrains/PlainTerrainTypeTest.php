<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class PlainTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('PlainTerrainType::getName()');
    $this->is('plain', PlainTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('PlainTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.plain", PlainTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
PlainTerrainTypeTest::run();
