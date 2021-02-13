<?php
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/contacto', 'Front\ContactController@index')->name('contact');
Route::post('/contacto', 'Front\ContactController@store')->name('contact');
Route::get('/institucional/{slug}', 'Front\InfoController@showContent');
Route::get('/productos/instrumentos', 'Front\ProductsController@showEquipos')->name('productos.instrumentos');
Route::get('/productos/instrumentos/{slug}', 'Front\ProductsController@showEquipo')->name('productos.instrumentos.ficha');
Route::post('/productos/info-adicional', 'Front\InquiriesController@store')->name('productos.info-adicional');
Route::get('/productos/reactivos', 'Front\ProductsController@showReactivos')->name('productos.reactivos');
Route::get('/productos/reactivos/{linea}', 'Front\ProductsController@showLineaReactivos')->name('productos.reactivos.linea');
Route::get('/productos/reactivos/{linea}/{categoria}', 'Front\ProductsController@showCategoriaReactivos')->name('productos.reactivos.linea.categoria');
Route::get('/productos/reactivos/{linea}/{categoria}/{reactivo}', 'Front\ProductsController@showReactivo')->name('productos.reactivos.linea.categoria.reactivo');
Route::get('/informacion/{cat}', 'Front\NewsController@showCat')->name('novedades');
Route::get('/informacion/{cat}/{slug}', 'Front\NewsController@showNota')->name('novedad');
//Route::get('/servicios/encuesta', 'Front\EncuestasController@index')->name('encuesta');
//Route::post('/servicios/encuesta', 'Front\EncuestasController@store')->name('encuesta');
Route::get('/servicios/pedidos', 'Front\PedidosController@index')->name('pedidos');
Route::post('/servicios/pedidos', 'Front\PedidosController@store')->name('pedidos');
Route::get('/servicios/{slug}', 'Front\InfoController@showContent');
Route::post('/suscripcion', 'Front\SubscriptionController@store')->name('subscription');
Route::post('/info-adicional', 'Front\InquiriesController@store')->name('info-adicional');
Route::get('/biblioteca', 'Front\LibraryController@index')->name('pdf.list');
Route::get('/biblioteca/{uuid}/download', 'Front\LibraryController@download')->name('pdf.download');
Route::post('/buscar', 'Front\SearchController@search')->name('buscar');



// Authentication Routes...
Auth::routes();


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('home', 'Admin\HomeController@index')->name('home');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('content_categories', 'Admin\ContentCategoriesController');
    Route::post('content_categories_mass_destroy', ['uses' => 'Admin\ContentCategoriesController@massDestroy', 'as' => 'content_categories.mass_destroy']);
    Route::resource('content_tags', 'Admin\ContentTagsController');
    Route::post('content_tags_mass_destroy', ['uses' => 'Admin\ContentTagsController@massDestroy', 'as' => 'content_tags.mass_destroy']);
    Route::resource('content_pages', 'Admin\ContentPagesController');
    Route::post('content_pages_mass_destroy', ['uses' => 'Admin\ContentPagesController@massDestroy', 'as' => 'content_pages.mass_destroy']);
    Route::post('content_pages_restore/{id}', ['uses' => 'Admin\ContentPagesController@restore', 'as' => 'content_pages.restore']);
    Route::delete('content_pages_perma_del/{id}', ['uses' => 'Admin\ContentPagesController@perma_del', 'as' => 'content_pages.perma_del']);
    Route::resource('product_categories', 'Admin\ProductCategoriesController');
    Route::post('product_categories_mass_destroy', ['uses' => 'Admin\ProductCategoriesController@massDestroy', 'as' => 'product_categories.mass_destroy']);
    Route::resource('product_tags', 'Admin\ProductTagsController');
    Route::post('product_tags_mass_destroy', ['uses' => 'Admin\ProductTagsController@massDestroy', 'as' => 'product_tags.mass_destroy']);
    Route::resource('products', 'Admin\ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'Admin\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::get('internal_notifications/read', 'Admin\InternalNotificationsController@read');
    Route::resource('internal_notifications', 'Admin\InternalNotificationsController');
    Route::post('internal_notifications_mass_destroy', ['uses' => 'Admin\InternalNotificationsController@massDestroy', 'as' => 'internal_notifications.mass_destroy']);
    Route::resource('manufacturers', 'Admin\ManufacturersController');
    Route::post('manufacturers_mass_destroy', ['uses' => 'Admin\ManufacturersController@massDestroy', 'as' => 'manufacturers.mass_destroy']);
    Route::post('manufacturers_restore/{id}', ['uses' => 'Admin\ManufacturersController@restore', 'as' => 'manufacturers.restore']);
    Route::delete('manufacturers_perma_del/{id}', ['uses' => 'Admin\ManufacturersController@perma_del', 'as' => 'manufacturers.perma_del']);
    Route::resource('slideshows', 'Admin\SlideshowsController');
    Route::post('slideshows_mass_destroy', ['uses' => 'Admin\SlideshowsController@massDestroy', 'as' => 'slideshows.mass_destroy']);
    Route::post('slideshows_restore/{id}', ['uses' => 'Admin\SlideshowsController@restore', 'as' => 'slideshows.restore']);
    Route::delete('slideshows_perma_del/{id}', ['uses' => 'Admin\SlideshowsController@perma_del', 'as' => 'slideshows.perma_del']);
    Route::resource('eventos', 'Admin\EventosController');
    Route::post('eventos_mass_destroy', ['uses' => 'Admin\EventosController@massDestroy', 'as' => 'eventos.mass_destroy']);
    Route::post('eventos_restore/{id}', ['uses' => 'Admin\EventosController@restore', 'as' => 'eventos.restore']);
    Route::delete('eventos_perma_del/{id}', ['uses' => 'Admin\EventosController@perma_del', 'as' => 'eventos.perma_del']);
    Route::resource('settings', 'Admin\SettingsController');
    Route::post('settings_mass_destroy', ['uses' => 'Admin\SettingsController@massDestroy', 'as' => 'settings.mass_destroy']);
    Route::post('settings_restore/{id}', ['uses' => 'Admin\SettingsController@restore', 'as' => 'settings.restore']);
    Route::delete('settings_perma_del/{id}', ['uses' => 'Admin\SettingsController@perma_del', 'as' => 'settings.perma_del']);
    Route::resource('pedidos', 'Admin\PedidosController');
    Route::post('pedidos_mass_destroy', ['uses' => 'Admin\PedidosController@massDestroy', 'as' => 'pedidos.mass_destroy']);
    Route::post('pedidos_restore/{id}', ['uses' => 'Admin\PedidosController@restore', 'as' => 'pedidos.restore']);
    Route::delete('pedidos_perma_del/{id}', ['uses' => 'Admin\PedidosController@perma_del', 'as' => 'pedidos.perma_del']);
    Route::resource('encuestas', 'Admin\EncuestasController');
    Route::post('encuestas_mass_destroy', ['uses' => 'Admin\EncuestasController@massDestroy', 'as' => 'encuestas.mass_destroy']);
    Route::post('encuestas_restore/{id}', ['uses' => 'Admin\EncuestasController@restore', 'as' => 'encuestas.restore']);
    Route::delete('encuestas_perma_del/{id}', ['uses' => 'Admin\EncuestasController@perma_del', 'as' => 'encuestas.perma_del']);
    Route::resource('messages', 'Admin\MessagesController');
    Route::post('messages_mass_destroy', ['uses' => 'Admin\MessagesController@massDestroy', 'as' => 'messages.mass_destroy']);
    Route::post('messages_restore/{id}', ['uses' => 'Admin\MessagesController@restore', 'as' => 'messages.restore']);
    Route::delete('messages_perma_del/{id}', ['uses' => 'Admin\MessagesController@perma_del', 'as' => 'messages.perma_del']);
    Route::resource('inquiries', 'Admin\InquiriesController');
    Route::post('inquiries_mass_destroy', ['uses' => 'Admin\InquiriesController@massDestroy', 'as' => 'inquiries.mass_destroy']);
    Route::post('inquiries_restore/{id}', ['uses' => 'Admin\InquiriesController@restore', 'as' => 'inquiries.restore']);
    Route::delete('inquiries_perma_del/{id}', ['uses' => 'Admin\InquiriesController@perma_del', 'as' => 'inquiries.perma_del']);
    Route::resource('subscriptions', 'Admin\SubscriptionsController');
    Route::post('subscriptions_mass_destroy', ['uses' => 'Admin\SubscriptionsController@massDestroy', 'as' => 'subscriptions.mass_destroy']);
    Route::post('subscriptions_restore/{id}', ['uses' => 'Admin\SubscriptionsController@restore', 'as' => 'subscriptions.restore']);
    Route::delete('subscriptions_perma_del/{id}', ['uses' => 'Admin\SubscriptionsController@perma_del', 'as' => 'subscriptions.perma_del']);
    Route::resource('library_categories', 'Admin\LibraryCategoriesController');
    Route::post('library_categories_mass_destroy', ['uses' => 'Admin\LibraryCategoriesController@massDestroy', 'as' => 'library_categories.mass_destroy']);
    Route::post('library_categories_restore/{id}', ['uses' => 'Admin\LibraryCategoriesController@restore', 'as' => 'library_categories.restore']);
    Route::delete('library_categories_perma_del/{id}', ['uses' => 'Admin\LibraryCategoriesController@perma_del', 'as' => 'library_categories.perma_del']);
    Route::resource('library_items', 'Admin\LibraryItemsController');
    Route::post('library_items_mass_destroy', ['uses' => 'Admin\LibraryItemsController@massDestroy', 'as' => 'library_items.mass_destroy']);
    Route::post('library_items_restore/{id}', ['uses' => 'Admin\LibraryItemsController@restore', 'as' => 'library_items.restore']);
    Route::delete('library_items_perma_del/{id}', ['uses' => 'Admin\LibraryItemsController@perma_del', 'as' => 'library_items.perma_del']);


});
