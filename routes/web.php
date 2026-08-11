<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EnglishController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TerritoriesController;
use Illuminate\Support\Facades\Route;

Route::redirect('/admin/{any?}', '/cp')->where('any', '.*');

Route::get('/', [HomeController::class, 'index']);
Route::redirect('public', '/');
Route::redirect('public/documentos', '/documentos');
Route::redirect('/informacion-general', '/informe-labores');
Route::get('en', [EnglishController::class, 'index']);

Route::get('noticias', [PostController::class, 'posts'])->name('posts.index');
Route::get('noticias/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('viaje-por-el-modelo-de-calidad-de-vida', [PageController::class, 'book']);
Route::get('viaje-por-el-modelo-de-calidad-de-vida/etapa-construccion', [PageController::class, 'book2']);
Route::get('porque-aqui-si', [PageController::class, 'because']);
Route::get('documentos', [PageController::class, 'docs']);
Route::get('linea-de-transparencia', [PageController::class, 'transparency']);

Route::get('work-4-progress', [PageController::class, 'w4p_landing']);
Route::get('work-4-progress/w4p_2025_formulario_A1', [PageController::class, 'w4p_form_1']);
Route::get('work-4-progress/w4p_2025_formulario_A2', [PageController::class, 'w4p_form_2']);
Route::get('work-4-progress/w4p_2025_formulario_A3', [PageController::class, 'w4p_form_3']);

Route::get('nuestras-empresas', [CompaniesController::class, 'index']);
Route::get('nuestros-territorios-progreso', [TerritoriesController::class, 'index']);
Route::get('nuestros-territorios-progreso/{slug}', [TerritoriesController::class, 'territory']);
Route::get('nuestro-impacto-social', [ImpactController::class, 'index']);

Route::redirect('conocenos', 'conocenos/quienes-somos');
Route::get('conocenos/quienes-somos', [AboutController::class, 'whoweare']);
Route::get('conocenos/como-somos', [AboutController::class, 'howweare']);
Route::get('conocenos/que-hacemos', [AboutController::class, 'whatwedo']);
Route::get('conocenos/historia', [AboutController::class, 'history']);
Route::get('conocenos/asuntos-corporativos', [AboutController::class, 'corporate']);
Route::get('conocenos/trabaja-con-nosotros', [AboutController::class, 'workwithus']);
Route::get('/informe-labores', [ReportController::class, 'page']);
Route::get('/informes-labores-empresas', [ReportController::class, 'pagecompanies']);
Route::get('/preguntas-frecuentes', [FaqController::class, 'page']);

Route::get('contactenos', [ContactController::class, 'index']);
Route::post('contactenos/store', [ContactController::class, 'store']);

Route::get('nuestro-acompanamiento-a-comunidades', [CommunityController::class, 'index']);
Route::get('nuestro-acompanamiento-a-comunidades/{slug}', [CommunityController::class, 'community']);

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::any('/{friendlyUrl}', [ContentController::class, 'anySlug'])->where('friendlyUrl', '^(?!cp|api|storage|assets|vendor).*$');
