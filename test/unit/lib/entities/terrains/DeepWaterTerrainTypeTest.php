<?php

require_once(dirname(__FILE__).'/../../../../bootstrap/unit.php');

class DeepWaterTerrainTypeTest extends AbstractLimeTest
{
  public function test_getName()
  {
    $this->diag('DeepWaterTerrainType::getName()');
    $this->is('deep water', DeepWaterTerrainType::getName(), 
      'getName() returns the terrain name');
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
