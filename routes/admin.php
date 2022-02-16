<!--
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login',[AdminAuthController::class,'getLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class,'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class,'logout'])->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	//Admin Dashboard
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
});
?>
