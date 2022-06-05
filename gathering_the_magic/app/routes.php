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
  'CardCollection' => 'CollectionController@show',
  'parse_add_card' => 'CollectionController@parseAddCard',
  'parse_remove_card' => 'CollectionController@parseRemoveCard',
  'parse_update_card' => 'CollectionController@parseUpdateCard',
  'new_card' => 'CardController',
  'parse_new_card' => 'CardController@parseNewCard',
  'new_cards' => 'NewCardsController',
]);
