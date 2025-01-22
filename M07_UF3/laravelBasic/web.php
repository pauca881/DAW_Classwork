    <?php

    use App\Http\Controllers\mycontroller;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('inici');
        });
        
    Route::get('/holamundo', function () {
        return view('app');
        });
        
    Route::get('/holatodos', function () {
        return 'hola a toos';
        });

    Route::get('/index', function () {
        return view('index');
        });

    Route::get('/nosaltres', function () {
        return view('nosaltres');
        })->name('nosaltres');
        
    Route::get('/onestem', function () {
        return view('onestem');
        })->name('onestem');

    Route::get('/insertar', [mycontroller::class, 'f_formulari'])->name('dades_insertar');
    Route::post('/insertar', [mycontroller::class, 'f_insert'])->name('dades_insertar');

    Route::get('/consultar',[mycontroller::class, 'f_consultar'])->name('dades_consultar');
    //Route::get('/consultar/{fila}',[mycontroller::class,'f_consultardetalle'])->name('dades_consultar');
    Route::get('/consultar/{fila}',[mycontroller::class,'f_consultardetalle'])->name('dades-consultar');

    Route::get('/buscar',[mycontroller::class, 'f_buscar_formulari'])->name('dades-buscar');
    Route::post('/buscar',[mycontroller::class, 'f_buscar'])->name('dades-buscar');


    Route::get('/borrar', [mycontroller::class, 'f_borrar'])->name('dades-borrar');
    Route::delete('/borrar/{fila}',[mycontroller::class, 'f_borrarfila'])->name('dades-borrarfila');

    Route::get('/modificar',[mycontroller::class, 'f_modificar'])->name('dades-modificar');
    Route::get('/modificar/{fila}',[mycontroller::class, 'f_modificarfila'])->name('dades-modificarfila');
    Route::patch('/modificar/{fila}',[mycontroller::class, 'f_actualitzarfila'])->name('dades-actualitzarfila');




