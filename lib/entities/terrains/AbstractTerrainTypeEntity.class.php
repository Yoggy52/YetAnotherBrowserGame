<?php

class AbstractTerrainTypeEntity
{
  /**
   * this terrain`s name
   * @var string
   */
  const TERRAIN_NAME = 'abstract_terrain_type';
  
  /**
   * the css class applied to *ALL* terrain types
   * @var string
   */
  const BASE_TERRAIN_CSS_CLASS = 'terrain';
  
  /**
   * the css class applied only to this terrain
   * @var string
   */
  const TERRAIN_CSS_CLASS = 'abstract_terrain';
  
  /**
   * no need to construct these entities
   */
  final protected function __construct() {}
  
  /**
   * @return string The combined classed defined for the base terrain and the terrain itself
   */
  public static function getCssClass()
  {
    return sprintf('.%s.%s', static::BASE_TERRAIN_CSS_CLASS, static::TERRAIN_CSS_CLASS);
  } 
}
