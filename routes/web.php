<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VigilanteController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;

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

/*Route::get('/', function () {
    return view('admin_layout.index');
});*/

Route::get('/admin/cadastro', [AdminAuthController::class, 'showRegisterForm'])->name('admin_cadastro');
Route::post('/admin/cadastro', [AdminAuthController::class, 'register']);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin_login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);


Route::get('/cadastro', [AuthController::class, 'formCadastroVigilante'])->name('cadastroVigilante');
Route::post('/cadastro', [AuthController::class, 'cadastroVigilante']);

Route::get('/login', [AuthController::class, 'formLoginVigilante'])->name('loginVigilante');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('Vigilante_layout.index');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth:admin')->group(function () {

    Route::get('/adm_index', function () {
        return view('admin_layout.index');
    });

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');

    Route::get('/adm_estados',[EstadoController::class, 'index']);
    //Chama a tela de inclusão
    Route::get('/adm_estados/incluir', [EstadoController::class, 'BuscarInclusao'])->name('adm_estados.incluir');
    //Serve para o cadastro dos estados
    Route::post('/adm_estados/incluir', [EstadoController::class, 'ExecutaInclusao']);
    Route::get('/adm_estados/exc/{id}', [EstadoController::class, 'ExcluirEstado'])->name('adm_estados_ex');
    Route::get('/adm_estados/upd/{id}', [EstadoController::class, 'BuscarAlteracao'])->name('adm_estados_upd');
    Route::post('/adm_estados/upd', [EstadoController::class, 'ExecutaAlteracao']);

    Route::get('/adm_cidades',[CidadeController::class, 'index'])->name('adm_cidades_index');
    Route::get('/adm_cidades/incluir', [CidadeController::class, 'BuscarInclusao'])->name('adm_cidades.incluir');
    Route::post('/adm_cidades/incluir', [CidadeController::class, 'salvarNovaCidade']);
    Route::get('/adm_cidades/upd/{id}', [CidadeController::class, 'formularioAlterar'])->name('adm_cidades_upd');
    Route::post('/adm_cidades/upd', [CidadeController::class, 'salvarAlterarCidade']);
    Route::get('/adm_cidades/exc/{id}', [CidadeController::class, 'excluirCidade'])->name('adm_cidades_ex');

    Route::get('/adm_vigilantes',[VigilanteController::class, 'index'])->name('adm_vigilantes_index');
    Route::get('/adm_vigilantes/incluir', [VigilanteController::class, 'BuscarInclusao'])->name('adm_vigilantes.incluir');
    Route::post('/adm_vigilantes/incluir', [VigilanteController::class, 'salvarNovoVigilante']);
    Route::get('/adm_vigilantes/upd/{id}', [VigilanteController::class, 'BuscarAlteracao'])->name('adm_vigilantes_upd');
    Route::post('/adm_vigilantes/upd', [VigilanteController::class, 'ExecutaAlteracao']);
    Route::get('/adm_vigilantes/exc/{id}', [VigilanteController::class, 'ExcluirVigilante'])->name('adm_vigilantes_ex');

});




