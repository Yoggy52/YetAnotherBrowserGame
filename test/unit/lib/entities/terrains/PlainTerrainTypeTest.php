<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class PlainTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('PlainTerrainType::TERRAIN_NAME');
    $this->is('plain', PlainTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('PlainTerrainType::TERRAIN_CSS_CLASS');

    $this->is('plain', PlainTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
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
