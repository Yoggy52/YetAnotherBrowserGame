<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class DeepWaterTerrainTypeTest extends AbstractLimeTest
{
  public function test_terrainNameConst()
  {
    $this->diag('DeepWaterTerrainType::TERRAIN_NAME');
    $this->is('deep water', DeepWaterTerrainType::TERRAIN_NAME, 
      'const TERRAIN_NAME was properly defined');
  }
  
  public function test_terrainCssClass()
  {
    $this->diag('DeepWaterTerrainType::TERRAIN_CSS_CLASS');

    $this->is('water.deep', DeepWaterTerrainType::TERRAIN_CSS_CLASS, 
      'const TERRAIN_CSS_CLASS was properly defined');
  }
  
  public function test_getCssClass()
  {
    $this->diag('DeepWaterTerrainType::getCssClass()');

    $base_class = AbstractTerrainTypeEntity::BASE_TERRAIN_CSS_CLASS;
    $this->is(".{$base_class}.water.deep", DeepWaterTerrainType::getCssClass(),
      'getCssClass() returns the right css class');
  }
}
DeepWaterTerrainTypeTest::run();
