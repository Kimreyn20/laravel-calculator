<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/add/{n1}/{n2}', function ($n1,$n2) {
    validateNumbers([$n1, $n2]);
    $s= $n1+$n2;
    return "The sum is ".$s;
});

Route::put('/sub/{n1}/{n2}', function ($n1,$n2) {
    validateNumbers([$n1, $n2]);
    $d= $n1-$n2;
    return "The difference is ".$d;
});

Route::delete('/mul/{n1}/{n2}', function ($n1,$n2) {
    validateNumbers([$n1, $n2]);
    $p= $n1*$n2;
    return "The product is ".$p;
});

Route::post('/div/{n1}/{n2}', function ($n1,$n2) {
    validateNumbers([$n1, $n2]);
    $q= $n1/$n2;
    if ($n2 == 0) {
        return "The dividor shoul not be equal to zero";}
        else { return "The quotient is ".$q;
}});

function validateNumbers($numbers)
{
    $rules = ['numeric'];

    foreach ($numbers as $number) {
        validator([$number], $rules)->validate();
    }
}
