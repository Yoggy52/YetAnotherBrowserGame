<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class ForestTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('ForestTerrainType::test_getName()');
    $this->is('forest', ForestTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('ForestTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} forest", ForestTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
ForestTerrainTypeTest::run();
