<?php

class ScenarioBean extends BaseBean
{
  protected $horizontal_size = 10;
  
  protected $vertical_size = 10;
  
  public function setHorizontalSize($size)
  {
    $this->horizontal_size = $size;
    
    return $this;
  }
  
  public function getHorizontalSize()
  {
    return $this->horizontal_size;
  }
  
  public function setVerticalSize($size)
  {
    $this->vertical_size = $size;
    
    return $this;
  }
  
  public function getVerticalSize()
  {
    return $this->vertical_size;
  }
}
