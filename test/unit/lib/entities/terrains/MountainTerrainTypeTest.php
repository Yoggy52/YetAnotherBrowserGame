<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class MountainTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('MountainTerrainType::TERRAIN_NAME');
    $this->is('mountain', MountainTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('MountainTerrainType::TERRAIN_CSS_CLASS');

    $this->is('mountain', MountainTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('MountainTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.mountain", MountainTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
MountainTerrainTypeTest::run();
