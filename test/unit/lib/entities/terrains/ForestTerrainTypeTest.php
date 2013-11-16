<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class ForestTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('ForestTerrainType::TERRAIN_NAME');
    $this->is('forest', ForestTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('ForestTerrainType::TERRAIN_CSS_CLASS');

    $this->is('forest', ForestTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('ForestTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.forest", ForestTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
ForestTerrainTypeTest::run();
