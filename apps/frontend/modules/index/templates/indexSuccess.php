<table>
  <thead>
    <tr>
      <th>&nbsp;</th>
<?php for($col = 0; $col < $scenario->getHorizontalSize(); $col++): ?>
      <th><?php echo str_pad($col, 2, '0', STR_PAD_LEFT) ?></th>
<?php endfor; ?>
    </tr>
  </thead>
  <tbody>
<?php for($col = 0; $col < $scenario->getHorizontalSize(); $col++): ?>
      <th><?php echo str_pad($col, 2, '0', STR_PAD_LEFT) ?></th>
<?php endfor; ?>
  </tbody>
</table>