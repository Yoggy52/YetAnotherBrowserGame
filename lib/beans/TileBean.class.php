<?php

class TileBean extends BaseBean
{
  protected $horizontal_position;
  
  protected $vertical_position;
  
  protected $parent_scenario;
  
  protected $terrain_type;
  
  protected static $terrain_types;
  
  public function __construct($horizontal = 0, $vertical = 0, $terrain_type = 'shallow water')
  {
    $this
      ->setHorizontalPosition($horizontal)
      ->setVerticalPosition($vertical)
      ->setTerrainType($terrain_type)
    ;
  }
  
  public function setParentScenario(ScenarioBean $scenario)
  {
    if ($this->parent_scenario !== $scenario) {
      $this->parent_scenario = $scenario;
      $scenario->addTile($this, $overwrite = true);
    }
    
    return $scenario;
  }
  
  public function getParentScenario()
  {
    return $this->parent_scenario;
  }
  
  /**
   * @param integer $position
   * @throws ScenarioException for negative values for position
   * @return TileBean self
   */
  public function setHorizontalPosition($position)
  {
    if (0 > (integer)$position) {
      throw new ScenarioException ("Tile horizontal position must be a positive value");
    }
    $this->horizontal_position = (integer)$position;
    
    return $this;
  }
  
  /**
   * @return integer
   */
  public function getHorizontalPosition()
  {
    return $this->horizontal_position;
  }
  
  /**
   * @param integer $position
   * @throws ScenarioException for negative values for position
   * @return TileBean self
   */
  public function setVerticalPosition($position)
  {
    if (0 > (integer)$position) {
      throw new ScenarioException ("Tile vertical position must be a positive value");
    }
    $this->vertical_position = (integer)$position;
    
    return $this;
  }
  
  /**
   * @return integer
   */
  public function getVerticalPosition()
  {
    return $this->vertical_position;
  }
  
  public function setTerrainType($terrain_type)
  {
    if (false == $terrain_type instanceof AbstractTerrainTypeEntity) {
      $terrain_types = static::getTerrainTypes();
      if (array_key_exists($terrain_type, $terrain_types)) {
        $terrain_type = $terrain_types[$terrain_type];
      } else {
        throw new ScenarioException('Invalid terrain type');
      }
    }
    
    $this->terrain_type = $terrain_type;
    
    return $this;
  }
  
  public function getTerrainType()
  {
    return $this->terrain_type;
  }
  
  protected static function getTerrainTypes()
  {
    if (null === static::$terrain_types) {
      static::$terrain_types = array(
        DeepWaterTerrainType::getName()     => DeepWaterTerrainType::getInstance(),
        DesertTerrainType::getName()        => DesertTerrainType::getInstance(),
        ForestTerrainType::getName()        => ForestTerrainType::getInstance(),
        GrasslandTerrainType::getName()     => GrasslandTerrainType::getInstance(),
        HillTerrainType::getName()          => HillTerrainType::getInstance(),
        JungleTerrainType::getName()        => JungleTerrainType::getInstance(),
        MountainTerrainType::getName()      => MountainTerrainType::getInstance(),
        PlainTerrainType::getName()         => PlainTerrainType::getInstance(),
        ShallowWaterTerrainType::getName()  => ShallowWaterTerrainType::getInstance(),
        SnowTerrainType::getName()          => SnowTerrainType::getInstance(),
        SwampTerrainType::getName()         => SwampTerrainType::getInstance(),
      );
    }
    return static::$terrain_types;    
  }
  
}
