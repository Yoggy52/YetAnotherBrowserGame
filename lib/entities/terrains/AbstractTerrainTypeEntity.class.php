<?php

abstract class AbstractTerrainTypeEntity
{
  protected static $_instances = array();
  
  protected static $terrain_types;
  
  /**
   * this terrain`s name
   * @var string
   */
  const TERRAIN_NAME = 'abstract_terrain_type';
  
  /**
   * the css class applied to *ALL* terrain types
   * @var string
   */
  const BASE_TERRAIN_CSS_CLASS = 'tile';
  
  /**
   * the css class applied only to this terrain
   * @var string
   */
  const TERRAIN_CSS_CLASS = 'abstract_terrain';
  
  /**
   * no need to construct these entities
   */
  protected final function __construct() {}
  
  protected final function __clone() {}

  public static final function getInstance()
  {
      $calledClass = get_called_class();

      if (!isset($instances[$calledClass]))
      {
          $instances[$calledClass] = new $calledClass();
      }

      return $instances[$calledClass];
  }
  
  public static function getName()
  {
    return static::TERRAIN_NAME;
  }
  
  /**
   * @return string The combined classed defined for the base terrain and the terrain itself
   */
  public static function getCssClass()
  {
    return sprintf('%s %s', static::BASE_TERRAIN_CSS_CLASS, static::TERRAIN_CSS_CLASS);
  }
  
  public static function getTerrainTypes()
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
