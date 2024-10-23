<?php
$arUrlRewrite=array (
  4 => 
  array (
    'CONDITION' => '#^/articles/([0-9]+)#',
    'RULE' => 'ELEMENT_ID=$1',
    'ID' => '',
    'PATH' => '/articles/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/specialists/([a-zA-Z0-9-]+)#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/specialists/detail.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
