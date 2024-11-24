<?php
    use Core\Route;
    use App\Http\Controller\SmsController;
    use App\Http\Controller\HomeController;

    Route::get('/',[HomeController::class,'main']);
    Route::get('/getNumber',[SmsController::class,'getNumber']);
    Route::get('/getSms',[SmsController::class,'getSms']);
    Route::get('/cancelNumber',[SmsController::class,'cancelNumber']);
    Route::get('/getStatus',[SmsController::class,'getStatus']);
?>