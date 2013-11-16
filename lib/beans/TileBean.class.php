<?php

class TileBean extends BaseBean
{
  protected $horizontal_position;
  
  protected $vertical_position;
  
  protected $parent_scenario;
  
  public function __construct($horizontal = 0, $vertical = 0)
  {
    $this
      ->setHorizontalPosition($horizontal)
      ->setVerticalPosition($vertical)
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
}
