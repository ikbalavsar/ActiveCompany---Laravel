<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/projects', function (){
    $projects = DB::select("select * from project where status = 'In Progress'");
   return view('projects',['projects'=>$projects]);
});

Route::get('/myWork', function (){
    return view('myWork');
});

Route::get('/completedProjects',function (){
    $projects = DB::select("select * from project where status = 'Completed'");

    return view('completedProjects',['projects' => $projects]);
});

Route::get('/people',function (){
    return view('people');
});

Route::get('/myProfile',function (){
    return view('myProfile');
});

Route::get('/seeDetails/{id}',function ($id){
    $project = DB::select("select * from project where id=$id");
    $project_model = $project[0];
    $tasks = DB::select("select * from task where id in (select task_id from belongs_to where project_id = $project_model->id)");
    $all_task_and_user = [];
    $assigned_person = DB::select("select * from users where id in (select user_id from user_belongs_to_project where project_id = $project_model->id)");
    for($i = 0; $i < count($tasks);$i++){
        $task_id = $tasks[$i]->id;
        $person = DB::select("select * from users where id in (select user_id from user_belongs_to_task where task_id = $task_id)");

        $all_task_and_user[] = [
            'title' => $tasks[$i]->title,
            'status' => $tasks[$i]->status,
            'task_id' => $tasks[$i]->id,
            'count_of_person' => count($person)
        ];

    }
    return view('seeDetails',['project'=>$project_model,'tasks'=>$all_task_and_user,'assigned_person'=>$assigned_person]);
});

Route::get('/taskDetailed/{id}',function ($id){
    $task = DB::select("Select * from task where id = $id");
    $project = DB::select("select * from project where id = (select project_id from belongs_to where task_id = $id)");
    $assigned_user = DB::select("select * from users where id in(select user_id from user_belongs_to_task where task_id = $id )");
    $boolean_flag = 0;
    $all_feedback = [];
    for($i = 0 ; $i < count($assigned_user);$i++){
        if(auth()->user()->id == $assigned_user[$i]->id){
            $boolean_flag = 1;
        }
        $assign_id = $assigned_user[$i]->id;
        $feedback = DB::select("select * from user_belongs_to_task where task_id = $id and user_id = $assign_id");
        $all_feedback[] = [
            'assigned_user' => $assigned_user[$i]->name,
            'feedback' => $feedback[0]->feedback
        ];
    }
    return view('taskDetailed',['task' => $task, 'project' => $project, 'all_feedback' => $all_feedback, 'boolean_flag' => $boolean_flag]);
});
Route::post('/taskDetailed/',function (Request $request){
    if(auth()->user()){
        $task_id = $request->input('task_id');
        $feedback = $request->input('feedback');
        $user_id = auth()->user()->id;
        DB::update("update user_belongs_to_task set feedback = '$feedback' where user_id = $user_id and task_id = $task_id");
        $url = '/taskDetailed/'.$task_id;
        return redirect($url);
    }else{
        return redirect('login');
    }

})->name('send_feedback');;

Route::get('/createProject',function (){
    return view('createProject');
});

Route::get('/addTask/{id}',function ($id){
    $analyst = DB::select("select *,'Analyst' as role from users where id in (select id from analyst)");
    $developers = DB::select("select *,'Developer' as role from users where id in(select id from developer)");
    $managers = DB::select("select *,'Manager' as role from users where id in (select id from manager)");
    $persons = array_merge($analyst,$developers,$managers);
    return view('addTask',['persons'=> $persons,'id'=>$id]);
});
function insert_task($task_title,$task_description,$task_duedate,$time){
    DB::insert("insert into task (title,time_sheet,description,due_date,status,created_at,updated_at) values ('$task_title',0,'$task_description','$task_duedate','Active','$time','$time') ");

}
Route::post('/addTask',function (Request $request){
    $project_id = $request->input('project_id');
    $task_title = $request->input('task_title');
    $task_duedate = $request->input('task_duedate');
    $task_description = $request->input('task_description');
    $persons = $request->input('persons');
    $time = date('Y-m-d H:i:s');



    insert_task($task_title,$task_description,$task_duedate,$time);
    $new_task_id = DB::select("select MAX(id) as id from task");
    $insert_id = $new_task_id[0]->id;
    DB::insert("insert into belongs_to (project_id,task_id) values ($project_id,$insert_id)");
    for($i = 0 ; $i < count($persons); $i++){
        DB::insert("insert into user_belongs_to_task(user_id,task_id,feedback,created_at,updated_at) values ($persons[$i],$insert_id,'','$time','$time')");
        DB::insert("insert into user_belongs_to_project(user_id,project_id,created_at,updated_at) values ($persons[$i],$project_id,'$time','$time')");
    }
    $url = '/seeDetails/'.$project_id;
    return redirect($url);
})->name('addTask');



Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
