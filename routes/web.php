<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KYCController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;


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
    return Redirect::to('login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return Redirect::to('admin/dashboard');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //Route::resource('companies', CompanyController::class);

    // Incubators
        Route::get('incubators',[CompanyController::class, 'incubators']);
        Route::get('incubator/{id}',[CompanyController::class, 'incubator']);
        Route::post('deleteIncubator/{company_id}',[CompanyController::class, 'deleteIncubator'])->name('deleteIncubator');

        // Investors
        Route::get('investors',[CompanyController::class, 'investors']);
        Route::get('investor/{id}',[CompanyController::class, 'investor']);
        Route::post('deleteInvestor/{company_id}',[CompanyController::class, 'deleteInvestor'])->name('deleteInvestor');


       // Analysts
       Route::get('analysts',[CompanyController::class, 'analysts']);
       Route::get('analyst/{id}',[CompanyController::class, 'analyst']);
       Route::post('deleteAnalyst/{company_id}',[CompanyController::class, 'deleteAnalyst'])->name('deleteAnalyst');




        // Pools
        Route::get('pools',[CompanyController::class, 'pools']);
        Route::get('pool/{id}',[CompanyController::class, 'pool']);
        Route::post('deletePool/{id}',[CompanyController::class, 'deletePool'])->name('deletePool');
        Route::post('editPool/{id}',[CompanyController::class, 'editPool'])->name('editPool');
        Route::post('statusPool/{id}',[CompanyController::class, 'statusPool'])->name('statusPool');




        // UPools
        Route::get('upools',[CompanyController::class, 'upools']);
        Route::get('upool/{id}',[CompanyController::class, 'upool']);
        Route::post('deleteUpool/{id}',[CompanyController::class, 'deleteUpool'])->name('deleteUpool');
        Route::post('editUpool/{id}',[CompanyController::class, 'editUpool'])->name('editUpool');


        //  Company
        Route::get('add_company',[CompanyController::class, 'add_company']);
        Route::post('createcompany',[CompanyController::class, 'createcompany'])->name('createcompany');
        Route::post('editCompany/{id}',[CompanyController::class, 'editCompany'])->name('editCompany');
        Route::post('deleteCompany/{id}',[CompanyController::class, 'deleteCompany'])->name('deleteCompany');



        // Sectors
       Route::get('sectors',[CompanyController::class, 'sectors']);
       Route::post('editSector/{id}',[CompanyController::class, 'editSector'])->name('editSector');
       Route::post('addSector',[CompanyController::class, 'addSector'])->name('addSector');
       Route::post('deleteSector/{id}',[CompanyController::class, 'deleteSector'])->name('deleteSector');


       // Industry
       Route::get('industries',[CompanyController::class, 'industries']);
       Route::post('editIndustry/{id}',[CompanyController::class, 'editIndustry'])->name('editIndustry');
       Route::post('addIndustry',[CompanyController::class, 'addIndustry'])->name('addIndustry');
       Route::post('deleteIndustry/{id}',[CompanyController::class, 'deleteIndustry'])->name('deleteIndustry');




     // KYC//
      Route::get('enterprisekyc',[KYCController::class, 'enterprisekyc']);
      Route::get('enterprisekycdetails/{id}',[KYCController::class, 'enterprisekycdetails'])->name('enterprisekycdetails');
      Route::get('enterprise/{slug}',[KYCController::class, 'enterprise'])->name('enterprise');
      Route::post('approveKyc/{id}',[KYCController::class, 'approveKyc'])->name('approveKyc');
      Route::post('rejectKyc/{id}',[KYCController::class, 'rejectKyc'])->name('rejectKyc');

      Route::get('ddakyc',[KYCController::class, 'ddakyc']);
      Route::get('ddakycdetails/{id}',[KYCController::class, 'ddakycdetails'])->name('ddakycdetails');
      Route::get('dda/{slug}',[KYCController::class, 'dda'])->name('dda');
      Route::post('approveddaKyc/{id}',[KYCController::class, 'approveddaKyc'])->name('approveddaKyc');
      Route::post('rejectddaKyc/{id}',[KYCController::class, 'rejectddaKyc'])->name('rejectddaKyc');




    //  Route::get('investor/{id}/view', 'AdminController@viewInvestor')->name('adminViewInvestor');
    //  Route::post('investor/{id}/status', 'AdminController@changeInvestorStatus')->name('statusInvetors');
    //  Route::post('investor/{id}/delete', 'AdminController@deleteInvestor')->name('adminDeleteInvestor');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
