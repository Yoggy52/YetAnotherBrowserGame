<?php

/**
 * index actions.
 *
 * @package    alpha
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->scenario = new ScenarioBean(10,10);
    $this->scenario
      // first row
      ->addTile(new TileBean(0,0, 'grassland'))
      ->addTile(new TileBean(0,1, 'grassland'))
      ->addTile(new TileBean(0,2, 'grassland'))
      ->addTile(new TileBean(0,3, 'snow'))
      ->addTile(new TileBean(0,4, 'snow'))
      ->addTile(new TileBean(0,5, 'mountain'))
      ->addTile(new TileBean(0,6, 'mountain'))
      ->addTile(new TileBean(0,7, 'mountain'))
      ->addTile(new TileBean(0,8, 'mountain'))
      ->addTile(new TileBean(0,9, 'mountain'))
      // second row
      ->addTile(new TileBean(1,0, 'grassland'))
      ->addTile(new TileBean(1,1, 'grassland'))
      ->addTile(new TileBean(1,2, 'grassland'))
      ->addTile(new TileBean(1,3, 'grassland'))
      ->addTile(new TileBean(1,4, 'mountain'))
      ->addTile(new TileBean(1,5, 'mountain'))
      ->addTile(new TileBean(1,6, 'hill'))
      ->addTile(new TileBean(1,7, 'mountain'))
      ->addTile(new TileBean(1,8, 'hill'))
      ->addTile(new TileBean(1,9, 'mountain'))
      // third row
      ->addTile(new TileBean(2,0, 'grassland'))
      ->addTile(new TileBean(2,1, 'grassland'))
      ->addTile(new TileBean(2,2, 'grassland'))
      ->addTile(new TileBean(2,3, 'grassland'))
      ->addTile(new TileBean(2,4, 'grassland'))
      ->addTile(new TileBean(2,5, 'hill'))
      ->addTile(new TileBean(2,6, 'hill'))
      ->addTile(new TileBean(2,7, 'hill'))
      ->addTile(new TileBean(2,8, 'hill'))
      ->addTile(new TileBean(2,9, 'mountain'))
      // fourth row
      ->addTile(new TileBean(3,0, 'shallow water'))
      ->addTile(new TileBean(3,1, 'grassland'))
      ->addTile(new TileBean(3,2, 'grassland'))
      ->addTile(new TileBean(3,3, 'grassland'))
      ->addTile(new TileBean(3,4, 'grassland'))
      ->addTile(new TileBean(3,5, 'swamp'))
      ->addTile(new TileBean(3,6, 'forest'))
      ->addTile(new TileBean(3,7, 'forest'))
      ->addTile(new TileBean(3,8, 'hill'))
      ->addTile(new TileBean(3,9, 'forest'))
      // fifth row
      ->addTile(new TileBean(4,0, 'shallow water'))
      ->addTile(new TileBean(4,1, 'shallow water'))
      ->addTile(new TileBean(4,2, 'grassland'))
      ->addTile(new TileBean(4,3, 'grassland'))
      ->addTile(new TileBean(4,4, 'swamp'))
      ->addTile(new TileBean(4,5, 'swamp'))
      ->addTile(new TileBean(4,6, 'forest'))
      ->addTile(new TileBean(4,7, 'forest'))
      ->addTile(new TileBean(4,8, 'forest'))
      ->addTile(new TileBean(4,9, 'forest'))
      // sixth row
      ->addTile(new TileBean(5,0, 'deep water'))
      ->addTile(new TileBean(5,1, 'shallow water'))
      ->addTile(new TileBean(5,2, 'shallow water'))
      ->addTile(new TileBean(5,3, 'grassland'))
      ->addTile(new TileBean(5,4, 'swamp'))
      ->addTile(new TileBean(5,5, 'swamp'))
      ->addTile(new TileBean(5,6, 'swamp'))
      ->addTile(new TileBean(5,7, 'plain'))
      ->addTile(new TileBean(5,8, 'forest'))
      ->addTile(new TileBean(5,9, 'plain'))
      // seventh row
      ->addTile(new TileBean(6,0, 'deep water'))
      ->addTile(new TileBean(6,1, 'shallow water'))
      ->addTile(new TileBean(6,2, 'shallow water'))
      ->addTile(new TileBean(6,3, 'swamp'))
      ->addTile(new TileBean(6,4, 'swamp'))
      ->addTile(new TileBean(6,5, 'plain'))
      ->addTile(new TileBean(6,6, 'plain'))
      ->addTile(new TileBean(6,7, 'plain'))
      ->addTile(new TileBean(6,8, 'plain'))
      ->addTile(new TileBean(6,9, 'plain'))
      // eight row
      ->addTile(new TileBean(7,0, 'deep water'))
      ->addTile(new TileBean(7,1, 'shallow water'))
      ->addTile(new TileBean(7,2, 'swamp'))
      ->addTile(new TileBean(7,3, 'swamp'))
      ->addTile(new TileBean(7,4, 'shallow water'))
      ->addTile(new TileBean(7,5, 'shallow water'))
      ->addTile(new TileBean(7,6, 'plain'))
      ->addTile(new TileBean(7,7, 'plain'))
      ->addTile(new TileBean(7,8, 'plain'))
      ->addTile(new TileBean(7,9, 'desert'))
      // ninth row
      ->addTile(new TileBean(8,0, 'deep water'))
      ->addTile(new TileBean(8,1, 'shallow water'))
      ->addTile(new TileBean(8,2, 'shallow water'))
      ->addTile(new TileBean(8,3, 'shallow water'))
      ->addTile(new TileBean(8,4, 'shallow water'))
      ->addTile(new TileBean(8,5, 'shallow water'))
      ->addTile(new TileBean(8,6, 'shallow water'))
      ->addTile(new TileBean(8,7, 'desert'))
      ->addTile(new TileBean(8,8, 'desert'))
      ->addTile(new TileBean(8,9, 'desert'))
      // tenth row
      ->addTile(new TileBean(9,0, 'deep water'))
      ->addTile(new TileBean(9,1, 'deep water'))
      ->addTile(new TileBean(9,2, 'deep water'))
      ->addTile(new TileBean(9,3, 'deep water'))
      ->addTile(new TileBean(9,4, 'deep water'))
      ->addTile(new TileBean(9,5, 'deep water'))
      ->addTile(new TileBean(9,6, 'shallow water'))
      ->addTile(new TileBean(9,7, 'shallow water'))
      ->addTile(new TileBean(9,8, 'desert'))
      ->addTile(new TileBean(9,9, 'desert'))
    ;
  }
}
