<?php

require_once(dirname(__FILE__).'/../../../bootstrap/unit.php');

class TileBeanTest extends AbstractLimeTest
{
  public function test_emptyConstructor()
  {
    $this->diag('$tile = new TileBean()');
    
    $tile = new TileBean();
    
    $this->is(0, $tile->getHorizontalPosition(), 'getHorizontalPosition() returns the default position 0');
    $this->is(0, $tile->getVerticalPosition(), 'getVerticalPosition() returns the default position 0');
    $this->isa_ok($tile->getTerrainType(), 'ShallowWaterTerrainType', 'getTerrainType() returns a ShallowWaterTerrainType instance by default');
  }

  
  public function test_constructorWithHorizontalAndVerticalParameters()
  {
    $this->diag('$tile = new TileBean(20,30, \'plain\')');
    
    $tile = new TileBean(20, 30, 'plain');
    
    $this->is(20, $tile->getHorizontalPosition(), 'getHorizontalPosition() returns 20');
    $this->is(30, $tile->getVerticalPosition(), 'getVerticalPosition() returns 30');
    $this->isa_ok($tile->getTerrainType(), 'PlainTerrainType', 'getTerrainType() returns PlainTerrainType instance');
  }

  
  public function test_setHorizontalPosition()
  {
    $this->diag('$tile->setHorizontalPosition(10)');
    
    $tile = new TileBean();
    $tile->setHorizontalPosition(10);
    
    $this->is(10, $tile->getHorizontalPosition(), 'getHorizontalPosition() returns 10');
  }

  
  public function test_setHorizontalPositionThrowsExceptionForNegativeValues()
  {
    $this->diag('$tile->setHorizontalPosition(-1)');

    $tile = new TileBean();
    try {
      $tile->setHorizontalPosition(-1);
      $this->fail('setHorizontalPosition() failed to throw a ScenarioException for -1');
    } catch (ScenarioException $exception) {
      $this->pass('setHorizontalPosition() has successfully thrown a ScenarioException for -1');
    } catch (Exception $exception) {
      $this->fail('setHorizontalPosition() failed to throw the right type of exception for -1');
    }
    $this->is(0, $tile->getHorizontalPosition(), 'getHorizontalPosition() still returns 0');
  }


  public function test_setVerticalPosition()
  {
    $this->diag('$tile->setVerticalPosition(50)');
    
    $tile = new TileBean();
    $tile->setVerticalPosition(50);
    
    $this->is(50, $tile->getVerticalPosition(), 'getVerticalPosition() returns 50');
  }
  
  
  public function test_setVerticalPositionThrowsExceptionForNegativeValues()
  {
    $this->diag('$tile->setVerticalPosition(-1)');

    $tile = new TileBean();
    try {
      $tile->setVerticalPosition(-1);
      $this->fail('setVerticalPosition() failed to throw a ScenarioException for -1');
    } catch (ScenarioException $exception) {
      $this->pass('setVerticalPosition() has successfully thrown a ScenarioException for -1');
    } catch (Exception $exception) {
      $this->fail('setVerticalPosition() failed to throw the right type of exception for -1');
    }
    $this->is(0, $tile->getVerticalPosition(), 'getVerticalPosition() still returns 0');
  }
  
  public function test_addTileUpdatesTileParentScenario()
  {
    $this->diag('$tile->setParentScenario(new ScenarioBean())');
    
    $tile = new TileBean(5,5);
    $this->is(null, $tile->getParentScenario(), 'getParentScenario() returns null');
    
    $scenario = new ScenarioBean(10,10);
    $tile->setParentScenario($scenario);

    $this->is_deeply($scenario, $tile->getParentScenario(), 
        'setParentScenario() updates the tile\'s parent scenario');
    $this->is(true, $tile === $scenario->getTile(5,5), 
      'setParentScenario() has added the tile to the scenario');
  }
  
  public function test_setTerrainTypeWithAStringParameter()
  {
    $this->diag('$this->setTerrainType(\'forest\')');
    
    $tile = new TileBean();
    $tile->setTerrainType('forest');
    
    $this->isa_ok($tile->getTerrainType(), 'ForestTerrainType', 
      'getTerrainType() returns ForestTerrainType instance');
  }
  
  public function test_setTerrainTypeWithATerrainTypeObject()
  {
    $this->diag('$this->setTerrainType(MountainTerrainType::getInstance())');
    
    $tile = new TileBean();
    $tile->setTerrainType(MountainTerrainType::getInstance());
    
    $this->isa_ok($tile->getTerrainType(), 'MountainTerrainType', 
      'getTerrainType() returns MountainTerrainType instance');
  }

  public function test_setTerrainThrowsExceptionsForInvalidTerrainTypes()
  {
    $this->diag('$this->setTerrainType(\'invalid_terrain_type\')');
    
    $tile = new TileBean();
    try {
      $tile->setTerrainType('invalid_terrain_type');
      $this->fail('setTerrainType() failed to throw a ScenarioException for invalid terrain type');
    } catch(ScenarioException $exception) {
      $this->pass('setTerrainType() has successfully thrown a ScenarioException for invalid terrain type');
    }
    
    $this->isa_ok($tile->getTerrainType(), 'ShallowWaterTerrainType', 
      'getTerrainType() still returns the default ShallowWaterTerrainType instance');
  }
  
}
TileBeanTest::run();
