<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// MAPEAMETO DE ROTAS
Route::get(
    '/',
    function () {
        return redirect()->route('topics.index');
    }
);

Route::group(
    ['middleware' => 'access.control.list'], function () {

        Route::resource('topics', 'TopicController');
    }
);

Route::resource('interactions', 'InteractionController');

Route::post('/interactions/store', 'InteractionController@store')->name('interactions.store');
Route::post('/topics/delete', 'TopicController@delete')->name('topics.delete');

Auth::routes();

Route::group(
    ['middleware' => 'auth', 'namespace' => 'Manager', 'prefix' => 'manager'], function () {
        Route::get(
            '/', function () {
                return redirect()->route('users.index');
            }
        );

        Route::resource('roles', 'RoleController');
        Route::get('roles/{role}/resources', 'RoleController@syncResources')->name('roles.resources');
        Route::put('roles/{role}/resources', 'RoleController@updateSyncResources')->name('roles.resources.update');

        Route::resource('users', 'UserController');
        Route::resource('resources', 'ResourceController');
        Route::resource('channels', 'ChannelController');

    }
);

Route::group(
    ['middleware' => 'auth'], function () {
        Route::get('routes', function () {
            foreach (Route::getRoutes()->getRoutes() as $route) {
                print $route->getName() . '<br><hr><strong style="color:blue; font-family:verdana, arial, helvetica; font-size:20px; border-bottom: 2px solid orange;"><br>';
            }
        });
    });

Route::group(
    ['middleware' => 'auth'], function () {
        Route::get('/clear', function () {
            $exitCode = Artisan::call('cache:clear');
        });
    });