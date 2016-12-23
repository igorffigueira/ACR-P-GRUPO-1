<?php




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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'PagesController@home');
//Route::get('/{id}', 'PagesController@id');

//Route::get('/about', 'PagesController@about');

Route::get('/musicas', 'MusicasController@index');

Route::get('/musicas', 'MusicasController@show');

Route::get('/top', 'TopController@index');

Route::get('/suporte', 'SuporteController@index');

//Route::get('/gestao', 'GestaoController@index');

Route::get('/pesquisa', 'PesquisaController@index');

Route::get('/perfil', 'PerfilController@index');

Route::get('user/{id}','GestaoController@show') ->middleware('auth', 'admin'); //Rotas para admin
Route::get('tipo/{id}', 'GestaoController@show_tipo')->middleware('auth', 'admin'); //Rotas para admin
Route::get('/gestao', 'GestaoController@index') ->middleware('auth', 'admin'); //Rotas para admin

//Route::get('/gestao','GestaoController@ficheiro');
Route::post('/gestao','GestaoController@upload')->middleware('auth','admin'); //Rotas para admin

Route::post('/musicas/compra','MusicasController@compra')->middleware('auth');

Route::group(['middleware' => ['auth','admin']], function () {
	Route::resource('gestaoMusicas', 'GestaoMusicasController');



			});//Rotas para admin

Route::get('/artistas/{id}', 'PagesController@artistas');


Route::get('/perfil/editar/{id}','PerfilController@editar');

Route::post('/perfil/{id}','PerfilController@confirmar');

Route::get('/gestao/adicionar', 'GestaoController@adicionar');
Route::post('/gestao/guardar', 'GestaoController@guardar');

Route::get('/gestao/album', 'GestaoController@gestaoAlbum');
Route::post('/gestao/album', 'GestaoController@adicionaAlbum');


/*Route::group(['middleware' => 'App\Http\Middleware\Admin'], function() //Rota só para admin
{
	Route::get('/user/{id}','GestaoController@show');
}); */

/*Route::group(['middleware' => 'App\Http\Middleware\Admin'], function() //Rota só para admin
{
	Route::get('/tipo/{id}', 'GestaoController@show_tipo');
}); 

Route::group(['middleware' => 'App\Http\Middleware\Admin'], function() //Rota só para admin
{
    Route::get('/gestao', 'GestaoController@index');

}); */

//Route::post('/musicas/download/', 'MusicasController@download')->middleware('auth'); 

Route::post('/search', 'SearchController@user');