<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class GrasslandTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('GrasslandTerrainType::TERRAIN_NAME');
    $this->is('grassland', GrasslandTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('GrasslandTerrainType::TERRAIN_CSS_CLASS');

    $this->is('grass', GrasslandTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('GrasslandTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.grass", GrasslandTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
GrasslandTerrainTypeTest::run();
