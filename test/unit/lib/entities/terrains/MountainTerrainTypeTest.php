<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class MountainTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('MountainTerrainType::getName()');
    $this->is('mountain', MountainTerrainType::getName(), 
      'getName() returns the terrain name');
  }
  
  public function test_getCssClass()
  {
    $this->diag('MountainTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is("{$base_class} mountain", MountainTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
MountainTerrainTypeTest::run();
