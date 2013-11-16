<table class='scenario'>
  <thead>
    <tr>
      <th>&nbsp;</th>
<?php for($col = 0; $col < $scenario->getHorizontalSize(); $col++): ?>
      <th><?php echo str_pad($col, 2, '0', STR_PAD_LEFT) ?></th>
<?php endfor; ?>
    </tr>
  </thead>
  <tbody>
<?php foreach ($scenario->getTiles() as $row => $columns): ?>
    <tr>
      <th><?php echo str_pad($row, 2, '0', STR_PAD_LEFT) ?></th>
<?php foreach ($columns as $column => $tile): ?>
      <td class='tile'>
        <span class='coordinates'><?php echo sprintf('%02d,%02d', $row, $column) ?></span>
      </td>
<?php endforeach ?>
    </tr>
<?php endforeach ?>
  </tbody>
</table>