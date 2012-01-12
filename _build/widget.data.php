<?php
$widgets = array();
$widgets[1]= $modx->newObject('modDashboardWidget');
$widgets[1]->fromArray(array (
  'name' => 'mhdash.title',
  'description' => 'mhdash.description',
  'type' => 'file',
  'size' => 'half',
  'content' => '[[++core_path]]components/mhdash/widget.php',
  'namespace' => 'mhdash',
  'lexicon' => 'mhdash:default',
), '', true, true);

return $widgets;
