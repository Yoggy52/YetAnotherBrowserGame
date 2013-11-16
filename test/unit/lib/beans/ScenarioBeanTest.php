<?php

require_once(dirname(__FILE__).'/../../../bootstrap/unit.php');

class ScenarioBeanTest extends AbstractLimeTest
{
  public function test_emptyConstructor()
  {
    $this->diag('$scenario = new ScenarioBean()');
    
    $scenario = new ScenarioBean();
    
    $this->is(10, $scenario->getHorizontalSize(), 'getHorizontalSize() returns the default value 10');
    $this->is(10, $scenario->getVerticalSize(), 'getVerticalSize() returns the default value 10');
  }
  
  
  public function test_constructorWithHorizontalAndVerticalSize()
  {
    $this->diag('$scenario = new ScenarioBean(20, 30)');
    
    $scenario = new ScenarioBean(20, 30);
    
    $this->is(20, $scenario->getHorizontalSize(), 'getHorizontalSize() returns 20');
    $this->is(30, $scenario->getVerticalSize(), 'getVerticalSize() returns 30');
  }
  
  
  public function test_setHorizontalSize()
  {
    $this->diag('$scenario->setHorizontalSize(10);');
    
    $scenario = new ScenarioBean();
    $scenario->setHorizontalSize(20);
    
    $this->is(20, $scenario->getHorizontalSize(), 'getHorizontalSize() returns 20');
  }


  public function test_setHorizontalSizeThrowsExceptionForNegativeValues()
  {
    $invalidValues = array(0, -1, -20);
    
    foreach ($invalidValues as $value) {
      $this->diag(sprintf('$scenario->setHorizontalSize(%s)', $value));
  
      $scenario = new ScenarioBean();
      try {
        $scenario->setHorizontalSize($value);
        $this->fail('setHorizontalSize() failed to throw a ScenarioException for ' . $value);
      } catch (ScenarioException $exception) {
        $this->pass('setHorizontalSize() has successfully thrown a ScenarioException for ' . $value);
      } catch (Exception $exception) {
        $this->fail('setHorizontalSize() failed to throw the right type of exception for ' . $value);
      }
      
      $this->is(10, $scenario->getHorizontalSize(), 'getHorizontalSize() still returns 10');
    }
  }


  public function test_setVerticalSize()
  {
    $this->diag('$scenario->setVerticalSize(10);');
    
    $scenario = new ScenarioBean();
    $scenario->setVerticalSize(20);
    
    $this->is(20, $scenario->getVerticalSize(), 'getVerticalSize() returns 20');
  }

  public function test_setVerticalSizeThrowsExceptionForNegativeValues()
  {
    $invalidValues = array(0, -1, -20);
    
    foreach ($invalidValues as $value) {
      $this->diag(sprintf('$scenario->setVerticalSize(%s)', $value));
  
      $scenario = new ScenarioBean();
      try {
        $scenario->setVerticalSize($value);
        $this->fail('setVerticalSize() failed to throw a ScenarioException for ' . $value);
      } catch (ScenarioException $exception) {
        $this->pass('setVerticalSize() has successfully thrown a ScenarioException for ' . $value);
      } catch (Exception $exception) {
        $this->fail('setVerticalSize() failed to throw the right type of exception for ' . $value);
      }
      $this->is(10, $scenario->getVerticalSize(), 'getHorizontalSize() still returns 10');    
    }
  }


  public function test_getTiles()
  {
    $this->diag("getTiles() must return 9 TileBean objects for a 3x3 Scenario");
    
    $scenario = new ScenarioBean(3,3);
    $tiles = $scenario->getTiles();
    
    $total_tiles = 0;
    $are_all_tilebeans = true;
    foreach ((array)$tiles as $horizontal => $verticals) {
      foreach ((array)$verticals as $vertical => $tile) {
        $total_tiles++;
        $are_all_tilebeans = $are_all_tilebeans && $tile instanceof TileBean;
      }
    }
    $this->is(9, $total_tiles, 'getTiles() returned 9 objects');
    $this->is($are_all_tilebeans, true, 'getTile() return only TileBean objects');
  }
  
  public function test_addTileToValidPosition()
  {
    $this->diag('$scenario->addTile(new TileBean(5,5))');
    
    $scenario = new ScenarioBean(10,10);
    $tile = new TileBean(5,5);
    $scenario->addTile($tile);
    
    $this->is_deeply($tile, $scenario->getTile(5,5), 'getTile() returned the right tile');
  }

  public function test_addTileThrowsExceptionWhenPositionIfOccupied()
  {
    $this->diag('$scenario->addTile(new TileBean(5,5), $overwrite = false) // to already occupied location');
        
    $scenario = new ScenarioBean(10,10);
    $validTile = new TileBean(5,5);
    $scenario->addTile($validTile);
    
    try {
      $invalidTile = new TileBean(5,5);
      $scenario->addTile($invalidTile);
      $this->fail('addTile() failed to throw ScenarioException while trying to add a tile to an already occpied location');
    } catch(ScenarioException $exception) {
      $this->pass('addTile() has successfully thrown a ScenarioException while trying to add a tile to an already occpied location');
    }
    
    $this->is_deeply($validTile, $scenario->getTile(5,5), 'getTile() returns the valid tile');
    $this->is(false, $invalidTile === $scenario->getTile(5,5), 'getTile() does not returns the invalid tile');
  }
  
  public function test_addTileOverwritesPreviousTiles()
  {
    $this->diag('$scenario->addTile(new TileBean(5,5), $overwrite = true) // to already occupied location');
        
    $scenario = new ScenarioBean(10,10);
    $scenario->addTile(new TileBean(5,5));
    
    try {
      $validTile = new TileBean(5,5);
      $scenario->addTile($validTile, $overwrite = true);
      $this->pass('addTile() has orverwritten an occupied location');
    } catch(ScenarioException $exception) {
      $this->pass('addTile() failed to overwrite an occupied location');
    }
    
    $this->is_deeply($validTile, $scenario->getTile(5,5), 'getTile() returns the valid tile');
  }

  public function test_setTilesWithSimpleArray()
  {
    $this->diag('$scenario->setTiles(array(new TileBean(5,5))))');
    
    $tile = new TileBean(5,5);
    $scenario = new ScenarioBean(10,10);
    try {
      $scenario->setTiles(array($tile));
      $this->is_deeply($tile, $scenario->getTile(5,5), 'setTiles() succesfully set all tiles');
    } catch (ScenarioException $exception) {
      $this->fail('setTiles() failed to set all tiles');
    }
  }
  
  public function test_setTilesWithTwoLayeredMatrix()
  {
    $this->diag('$scenario->setTiles(array([..])) // matrix HxV with 3 elements');

    $tile34 = new TileBean(3,4);
    $tile52 = new TileBean(5,2);
    $tile55 = new TileBean(5,5);
    
    $tiles = array(
      3 => array(
        4 => $tile34,
      ),
      5 => array(
        2 => $tile52,
        5 => $tile55,
      ),
    );

    $scenario = new ScenarioBean(10,10);
    try {
      $scenario->setTiles($tiles);
      $this->is_deeply($tile34, $scenario->getTile(3,4), 'setTiles() succesfully set tile in position 3,4');
      $this->is_deeply($tile52, $scenario->getTile(5,2), 'setTiles() succesfully set tile in position 5,2');
      $this->is_deeply($tile55, $scenario->getTile(5,5), 'setTiles() succesfully set tile in position 5,5');
    } catch (ScenarioException $exception) {
      $this->fail('setTiles() failed to set all tiles');
    }
  }
  
  public function test_hasTileReturnsFalse()
  {
    $this->diag('$scenario->hasTile(5,5) // returns false when tile does not exists');
    
    $scenario = new ScenarioBean(10,10);
    $this->is(false, $scenario->hasTile(5,5), 'hasTile() returns false');
  }
  
  public function test_hasTileReturnsTrue()
  {
    $this->diag('$scenario->hasTile(5,5) // returns true when tile exists');
    
    $scenario = new ScenarioBean(10,10);
    $scenario->addTile(new TileBean(5,5));
    $this->is(true, $scenario->hasTile(5,5), 'hasTile() returns true');
  }
  
  public function test_removeTileProvidingHorizontalAndVerticalPosition()
  {
    $this->diag('$scenario->removeTile(5,5)');
    
    $scenario = new ScenarioBean(10,10);
    $scenario->addTile(new TileBean(5,5));
    
    $scenario->removeTile(5,5);
    $this->is(false, $scenario->hasTile(5,5), 'removeTile() has removed tile from location 5,5');
  }

  public function test_removeTileProvidingTheTileWeWantRemoved()
  {
    $this->diag('$scenario->removeTile($tile)');
    
    $tile = new TileBean(5,5);
    $scenario = new ScenarioBean(10,10);
    $scenario->addTile($tile);
    
    $scenario->removeTile($tile);
    $this->is(false, $scenario->hasTile(5,5), 'removeTile() has removed tile from location 5,5 using a TileBean');
  }
}
ScenarioBeanTest::run();