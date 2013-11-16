<?php

class ScenarioBean extends BaseBean
{
  protected $horizontal_size;
  
  protected $vertical_size;
  
  protected $tiles;
  
  public function __construct($horizontal = 10, $vertical = 10)
  {
    $this
      ->setHorizontalSize($horizontal)
      ->setVerticalSize($vertical)
    ;
  }
  
  /**
   * @param integer $size
   * @throws ScenarioException If horizontal size is 0 or lower
   * @return ScenarioBean self
   */
  public function setHorizontalSize($size)
  {
    if (0 >= (integer)$size) {
      throw new ScenarioException ("Scenario horizontal size must be a positive value");
    }
    $this->horizontal_size = (integer)$size;
    
    return $this;
  }
  
  /**
   * @return integer
   */
  public function getHorizontalSize()
  {
    return $this->horizontal_size;
  }
 
  /**
   * @param integer $size
   * @throws ScenarioException If vertical size is 0 or lower
   * @return ScenarioBean self
   */
  public function setVerticalSize($size)
  {
    if (0 >= (integer)$size) {
      throw new ScenarioException ("Scenario vertical size must be a positive value");
    }
    $this->vertical_size = (integer)$size;
    
    return $this;
  }
  
  /**
   * @return integer
   */
  public function getVerticalSize()
  {
    return $this->vertical_size;
  }
  
  /**
   * @param array $tiles
   * @return ScenarioBean self
   */
  public function setTiles(array $tiles)
  {
    $this->tiles = array();
    
    array_walk_recursive($tiles, function(&$tile) {
      if ($tile instanceof TileBean) {
        $this->setTile($tile);
      } else {
        throw new ScenarioException('Invalid tile object');
      }
    });
    
    return $this;
  }
  
  /**
   * sets a Tile in the scenario, overwriting any previous Tile that belonged in the same location
   *
   * @param TileBean $tile
   * @return ScenarioBean self
   */
  public function setTile(TileBean $tile)
  {
    $this->addTile($tile, true);
    
    return $this;
  }
  
  /**
   * add a Tile in the scenario in the position provided by the tile itself
   *
   * @param TileBean $tile
   * @param boolean $overwrite [optional, default false] overwrites Tiles in the 
   *                           same position of the one added, if any
   * @throws ScenarioException If there is already a tile in that position and 
   *                           $overwrite is set to false
   * @return ScenarioBean self
   */
  public function addTile(TileBean $tile, $overwrite = false)
  {
    if ($this->hasTile($tile->getHorizontalPosition(), $tile->getVerticalPosition()) && false == $overwrite) {
      throw new ScenarioException(sprintf("Unable to add tile in the position %s,%s since another tile already exists in that location",
        $tile->getHorizontalPosition(), $tile->getVerticalPosition()));
    }
    
    $this->tiles[$tile->getHorizontalPosition()][$tile->getVerticalPosition()] = $tile;
    
    return $this;
  }
  
  /**
   * returns a specific Tile by its position in the scenario. 
   * 
   * If no actual Tile is present there, returns an empty TileBean
   *
   * @param integer $horizontal
   * @param integer $vertical
   * @return TileBean
   */
  public function getTile($horizontal, $vertical)
  {
    if (false == $this->hasTile($horizontal, $vertical)) {
      $tile = new TileBean($horizontal, $vertical);
      $this->setTile($tile);
    }
    
    return $this->tiles[$horizontal][$vertical];
  }
  
  public function removeTile($horizontal, $vertical = 0) 
  {
    if ($horizontal instanceof TileBean) {
      $vertical = $horizontal->getVerticalPosition();
      $horizontal = $horizontal->getHorizontalPosition();
    }
    if ($this->hasTile($horizontal, $vertical)) {
      unset($this->tiles[$horizontal][$vertical]);
    }
    
    return $this;
  }
  
  /**
   * @param integer $horizontal
   * @param integer $vertical 
   * @return boolean
   */
  public function hasTile($horizontal, $vertical)
  {
    return false == empty($this->tiles[(integer)$horizontal][(integer)$vertical]);
  }
  
  /**
   * Returns a two-level array matrix with all tiles grouped by horizontal vs vertical.
   * 
   * The returned matrix will return TileBeans for every position in the scenario grid, even
   * for positions that do not currently have a tile associated to them
   *
   * @return array:TileBean
   */
  public function getTiles()
  {
    $tiles = array();
    for($horizontal = 0; $horizontal < $this->getHorizontalSize(); $horizontal++) {
      for($vertical = 0; $vertical < $this->getVerticalSize(); $vertical++) {
        $tiles[$horizontal][$vertical] = $this->getTile($horizontal, $vertical);
      }
    }
    return $tiles;
  }
}
