<?php
use App\Models\Bulletin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $status= "true";
    $bulletins = Bulletin::where('published', $status)->orderBy('created_at','desc')->take(2)->get();
    return view('Principal.inicio', [ 'bulletins' => $bulletins ]);
});
Route::get('/publications', [
    'as' => 'publications',
    'uses' => 'Admin\BulletinController@showList',
]);
Route::get('/message', [
    'as' => 'message',
    'uses' => 'Admin\MessageController@message',
]);
Route::get('/release/{bulletin}/show', [
    'as' => 'release',
    'uses' => 'Admin\BulletinController@showRelease',
]);

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'HomeController@index'
    ]);
    //------------ USERS --------------//
    Route::get('users', [
        'as' => 'users.index',
        'uses' => 'UserController@index',
    ])->middleware('permission:list users');
    Route::get('users/create', [
        'as' => 'users.create',
        'uses' => 'UserController@create',
    ])->middleware('permission:create users');
    Route::post('users/store', [
        'as' => 'users.store',
        'uses' => 'UserController@store',
    ])->middleware('permission:create users');
    Route::get('users/{user}/edit', [
        'as' => 'users.edit',
        'uses' => 'UserController@edit',
    ])->middleware('permission:edit users');
    Route::put('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::patch('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::delete('users/{user}', [
        'as' => 'users.destroy',
        'uses' => 'UserController@destroy',
    ])->middleware('permission:delete users');

    //----------- WRITERS ------------//
    Route::get('writers', [
        'as' => 'writers.index',
        'uses' => 'WriterController@index',
    ])->middleware('permission:list writers');
    Route::get('writers/create', [
        'as' => 'writers.create',
        'uses' => 'WriterController@create',
    ])->middleware('permission:create writers');
    Route::post('writers/store', [
        'as' => 'writers.store',
        'uses' => 'WriterController@store',
    ])->middleware('permission:create writers');
    Route::get('writers/{user}/edit', [
        'as' => 'writers.edit',
        'uses' => 'WriterController@edit',
    ])->middleware('permission:edit writers');
    Route::put('writers/{user}', [
        'as' => 'writers.update',
        'uses' => 'WriterController@update',
    ])->middleware('permission:edit writers');
    Route::patch('writers/{user}', [
        'as' => 'writers.update',
        'uses' => 'WriterController@update',
    ])->middleware('permission:edit writers');
    Route::delete('writers/{user}', [
        'as' => 'writers.destroy',
        'uses' => 'WriterController@destroy',
    ])->middleware('permission:delete users');

    //-------------Redactores ----------//
    Route::get('redactors', [
        'as' => 'redactors.index',
        'uses' => 'RedactorController@index',
    ])->middleware('permission:list redactors');
    Route::get('redactors/create', [
        'as' => 'redactors.create',
        'uses' => 'RedactorController@create',
    ])->middleware('permission:create redactors');
    Route::post('redactors/store', [
        'as' => 'redactors.store',
        'uses' => 'RedactorController@store',
    ])->middleware('permission:create redactors');
    Route::get('redactors/{user}/edit', [
        'as' => 'redactors.edit',
        'uses' => 'RedactorController@edit',
    ])->middleware('permission:edit redactors');
    Route::put('redactors/{user}', [
        'as' => 'redactors.update',
        'uses' => 'RedactorController@update',
    ])->middleware('permission:edit redactors');
    Route::patch('redactors/{user}', [
        'as' => 'redactors.update',
        'uses' => 'RedactorController@update',
    ])->middleware('permission:edit redactors');
    Route::delete('redactors/{user}', [
        'as' => 'redactors.destroy',
        'uses' => 'RedactorController@destroy',
    ])->middleware('permission:delete redactors');

    //----------------SUSCRIPTORES -----------------//
    Route::get('suscriptors', [
		'as' => 'suscriptors.index',
		'uses' => 'SuscriptorController@index'
	])->middleware('permission:list suscriptors');
	Route::get('suscriptors/create', [
        'as' => 'suscriptors.create',
        'uses' => 'SuscriptorController@create',
    ])->middleware('permission:create suscriptors');
    Route::post('suscriptors/store', [
        'as' => 'suscriptors.store',
        'uses' => 'SuscriptorController@store',
    ])->middleware('permission:create suscriptors');
    Route::get('suscriptors/{user}/edit', [
        'as' => 'suscriptors.edit',
        'uses' => 'SuscriptorController@edit',
    ])->middleware('permission:edit suscriptors');
    Route::put('suscriptors/{user}', [
        'as' => 'suscriptors.update',
        'uses' => 'SuscriptorController@update',
    ])->middleware('permission:edit suscriptors');
    Route::patch('suscriptors/{user}', [
        'as' => 'suscriptors.update',
        'uses' => 'SuscriptorController@update',
    ])->middleware('permission:edit suscriptors');
    Route::delete('suscriptors/{user}', [
        'as' => 'suscriptors.destroy',
        'uses' => 'SuscriptorController@destroy',
    ])->middleware('permission:delete suscriptors');

    //----------- LETTERS ------------//
    Route::get('letters', [
        'as' => 'letters.index',
        'uses' => 'LetterController@index',
    ])->middleware('permission:list letters');

    Route::get('letters/{letter}/show', [
        'as' => 'letters.show',
        'uses' => 'LetterController@show',
    ])->middleware('permission:show letters');
    
    Route::get('letters/create', [
        'as' => 'letters.create',
        'uses' => 'LetterController@create',
    ])->middleware('permission:create letters');
    Route::post('letters/store', [
        'as' => 'letters.store',
        'uses' => 'LetterController@store',
    ])->middleware('permission:create letters');

    //-------------- AREAS ------------------//
    Route::get('areas', [
        'as' => 'areas.index',
        'uses' => 'AreaController@index',
    ])->middleware('permission:list areas');
    Route::get('areas/create', [
        'as' => 'areas.create',
        'uses' => 'AreaController@create',
    ])->middleware('permission:create areas');
    Route::post('areas/store', [
        'as' => 'areas.store',
        'uses' => 'AreaController@store',
    ])->middleware('permission:create areas');
    Route::get('areas/{area}/edit', [
        'as' => 'areas.edit',
        'uses' => 'AreaController@edit',
    ])->middleware('permission:edit areas');
    Route::put('areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ])->middleware('permission:edit areas');
    Route::patch('areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ])->middleware('permission:edit areas');
    Route::delete('areas/{area}', [
        'as' => 'areas.destroy',
        'uses' => 'AreaController@destroy',
    ])->middleware('permission:delete areas');

    Route::get('roles', [
        'as' => 'roles.index',
        'uses' => 'RoleController@index',
    ])->middleware('permission:list roles');
    Route::get('roles/create', [
        'as' => 'roles.create',
        'uses' => 'RoleController@create',
    ])->middleware('permission:create roles');
    Route::post('roles/store', [
        'as' => 'roles.store',
        'uses' => 'RoleController@store',
    ])->middleware('permission:create roles');
    Route::get('roles/{role}/edit', [
        'as' => 'roles.edit',
        'uses' => 'RoleController@edit',
    ])->middleware('permission:edit roles');
    Route::put('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:edit roles');
    Route::patch('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:edit roles');
    Route::delete('roles/{role}', [
        'as' => 'roles.destroy',
        'uses' => 'RoleController@destroy',
    ])->middleware('permission:delete roles');

    Route::get('permissions', [
        'as' => 'permissions.index',
        'uses' => 'PermissionController@index',
    ])->middleware('permission:list roles');

    //----------- articles ------------//
    
    Route::get('articles', [
        'as' => 'articles.index',
        'uses' => 'ArticleController@index',
    ])->middleware('permission:list articles');
    
    Route::get('articles/create/{letter}', [
        'as' => 'articles.create',
        'uses' => 'ArticleController@create',
    ])->middleware('permission:create articles');
    
    Route::post('articles/store', [
        'as' => 'articles.store',
        'uses' => 'ArticleController@store',
    ])->middleware('permission:create articles');
    
    Route::get('articles/{article}/show', [
        'as' => 'articles.show',
        'uses' => 'ArticleController@show',
    ])->middleware('permission:show articles');
    
    Route::get('articles/{article}/edit', [
        'as' => 'articles.edit',
        'uses' => 'ArticleController@edit',
    ])->middleware('permission:edit articles');
    
    Route::put('articles/{article}', [
        'as' => 'articles.update',
        'uses' => 'ArticleController@update',
    ])->middleware('permission:edit articles');
    
    Route::patch('articles/{article}', [
        'as' => 'articles.update',
        'uses' => 'ArticleController@update',
    ])->middleware('permission:edit articles');
    
    Route::delete('articles/{article}', [
        'as' => 'articles.destroy',
        'uses' => 'ArticleController@destroy',
    ])->middleware('permission:delete articles');
    
//----------- Plantillas ------------//
    Route::get('templates', [
        'as' => 'templates.index',
        'uses' => 'TemplateController@index',
    ])->middleware('permission:list templates');
    
    Route::get('templates/create', [
        'as' => 'templates.create',
        'uses' => 'TemplateController@create',
    ])->middleware('permission:create templates');
    
    Route::post('templates/store', [
        'as' => 'templates.store',
        'uses' => 'TemplateController@store',
    ])->middleware('permission:create templates');
    /*
    Route::get('templates/{template}/show', [
        'as' => 'templates.show',
        'uses' => 'TemplateController@show',
    ])->middleware('permission:show templates');
    */
    Route::get('templates/{template}/edit', [
        'as' => 'templates.edit',
        'uses' => 'TemplateController@edit',
    ])->middleware('permission:edit templates');
    
    Route::put('templates/{template}', [
        'as' => 'templates.update',
        'uses' => 'TemplateController@update',
    ])->middleware('permission:edit templates');
    
    Route::patch('templates/{template}', [
        'as' => 'templates.update',
        'uses' => 'TemplateController@update',
    ])->middleware('permission:edit templates');
    
    Route::get('templates/{template}', [
        'as' => 'templates.download',
        'uses' => 'TemplateController@download',
    ])->middleware('permission:show templates');

    Route::delete('templates/{template}', [
        'as' => 'templates.destroy',
        'uses' => 'TemplateController@destroy',
    ])->middleware('permission:delete templates');

    //----------- boletines ------------//
    Route::get('bulletins', [
        'as' => 'bulletins.index',
        'uses' => 'BulletinController@index',
    ])->middleware('permission:list bulletins');
    
    Route::get('bulletins/create', [
        'as' => 'bulletins.create',
        'uses' => 'BulletinController@create',
    ])->middleware('permission:create bulletins');
    
    Route::post('bulletins/store', [
        'as' => 'bulletins.store',
        'uses' => 'BulletinController@store',
    ])->middleware('permission:create bulletins');
    
    Route::get('bulletins/{bulletin}/show', [
        'as' => 'bulletins.show',
        'uses' => 'BulletinController@show',
    ])->middleware('permission:show bulletins');
    Route::get('bulletins/{id}', [
        'as' => 'bulletins.view',
        'uses' => 'BulletinController@view',
    ])->middleware('permission:show bulletins');

    Route::get('bulletins/{bulletin}/edit', [
        'as' => 'bulletins.edit',
        'uses' => 'BulletinController@edit',
    ])->middleware('permission:edit bulletins');
    
    Route::put('bulletins/{bulletin}', [
        'as' => 'bulletins.update',
        'uses' => 'BulletinController@update',
    ])->middleware('permission:edit bulletins');
    
    Route::patch('bulletins/{bulletin}', [
        'as' => 'bulletins.update',
        'uses' => 'BulletinController@update',
    ])->middleware('permission:edit bulletins');

    Route::get('bulletins/download/{bulletin}', [
        'as' => 'bulletins.download',
        'uses' => 'BulletinController@download',
    ]);
    
    Route::post('bulletins/publish/{bulletin}', [
        'as' => 'bulletins.publish',
        'uses' => 'BulletinController@publish',
    ])->middleware('permission:show bulletins');
    
    Route::delete('bulletins/{bulletin}', [
        'as' => 'bulletins.destroy',
        'uses' => 'BulletinController@destroy',
    ])->middleware('permission:delete bulletins');

    // Train machine
    Route::get('train_machine', [
        'as' => 'train.machine.index',
        'uses' => 'TrainMachineController@train',
    ])->middleware('permission:train machine');

    // Train machine
    Route::get('train_machine/store', [
        'as' => 'train.machine.store',
        'uses' => 'TrainMachineController@store',
    ])->middleware('permission:train machine');

});

Route::get('bulletins/download/{bulletin}', [
    'as' => 'bulletins.download',
    'uses' => 'Admin\BulletinController@download',
]);
Route::get('bulletins/{id}', [
        'as' => 'bulletins.view',
        'uses' => 'Admin\BulletinController@view',
]);
    
//Route::get('/usuarios', 'UserController@index');