<?php

Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'Api\SearchController@search'
]);
