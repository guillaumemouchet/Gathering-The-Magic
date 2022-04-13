<?php

$router->define([
  // '' => 'controllers/index.php',  // by conventions all controllers are in 'controllers' folder
  '' => 'IndexController',
  'index' => 'IndexController',
  'advanced_research' => 'AdvancedResearchController',
  'collection' => 'CollectionController',
  'extensions' => 'ExtensionController',
  'decks' => 'DeckController',
  'parse_search_form' => 'AdvancedResearchController@parseSearchForm',
  'card' => 'AdvancedResearchController@show',
  'parse_add_card' => 'CollectionController@parseAddCard'
]);
