<?php

use App\Task;
use Illuminate\Http\Request;
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



Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/', function () {
        return view('welcome', [
            'tasks' => Task::orderBy('created_at', 'asc')->get(),
        ]);
    });
    /**
     * Show Task Dashboard
     */

    Route::get('/dash', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get(),
        ]); 
    })
    ->middleware('is_admin')    
    ->name('admin');

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/dash');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/dash');
    });
});

Auth::routes();


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
