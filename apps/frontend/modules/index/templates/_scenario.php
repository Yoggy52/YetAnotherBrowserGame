<table class='scenario'>
  <thead>
    <tr>
      <th>&nbsp;</th>
<?php for($col = 0; $col < $scenario->getHorizontalSize(); $col++): ?>
      <th><?php echo str_pad($col, 2, '0', STR_PAD_LEFT) ?></th>
<?php endfor; ?>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>&nbsp;</th>
<?php for($col = 0; $col < $scenario->getHorizontalSize(); $col++): ?>
      <th><?php echo str_pad($col, 2, '0', STR_PAD_LEFT) ?></th>
<?php endfor; ?>
      <th>&nbsp;</th>
    </tr>
  </tfoot>
  <tbody>
<?php foreach ($scenario->getTiles() as $row => $columns): ?>
    <tr>
      <th><?php echo str_pad($row, 2, '0', STR_PAD_LEFT) ?></th>
<?php foreach ($columns as $column => $tile): ?>
      <td class='<?php echo $tile->getTerrainType()->getCssClass() ?>'>
        <span class='coordinates'><?php echo sprintf('%02d,%02d', $row, $column) ?></span>
      </td>
<?php endforeach ?>
      <th><?php echo str_pad($row, 2, '0', STR_PAD_LEFT) ?></th>
    </tr>
<?php endforeach ?>
  </tbody>
</table>