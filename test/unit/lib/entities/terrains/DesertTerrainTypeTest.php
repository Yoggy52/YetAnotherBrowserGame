<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class DesertTerrainTypeTest extends AbstractLimeTest
{
  public function test_getName()
  {
    $this->diag('DesertTerrainType::getName()');
    $this->is('desert', DesertTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('DesertTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} desert", DesertTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
DesertTerrainTypeTest::run();
