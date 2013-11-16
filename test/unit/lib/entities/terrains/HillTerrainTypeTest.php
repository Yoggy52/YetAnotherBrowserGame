<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class HillTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('HillTerrainType::TERRAIN_NAME');
    $this->is('hill', HillTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('HillTerrainType::TERRAIN_CSS_CLASS');

    $this->is('hill', HillTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
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
