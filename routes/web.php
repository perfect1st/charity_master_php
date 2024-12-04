<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ArticleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
  

    Route::get('/', function () {
        $banner = Article::find(1);
        $helpDep = Department::find(2);
        $helpDepImages= Department::find(2)->articles->where('articles_isactive', 'active');

        $lastActivities= Article::find(5);

        $popularCasesDep = Department::find(5);
        $popularCasesDepImages= Department::find(5)->articles->where('articles_isactive', 'active');

        $counter= Department::find(6)->articles->where('articles_isactive', 'active');

        $newsDep = Department::find(7);
        $news=Department::find(7)->articles->where('articles_isactive', 'active');

        $setting = Setting::find(1);
        $settingArticle= Article::find(14);

        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);

        return view('welcome',[
            "banner"=>$banner,
            "helpDep"=>$helpDep,
            "helpDepImages"=>$helpDepImages,
            "lastActivities"=>$lastActivities,
            "popularCasesDep"=>$popularCasesDep,
            "popularCasesDepImages"=>$popularCasesDepImages,
            "counter"=>$counter,
            "newsDep"=>$newsDep,
            "news"=>$news,
            "setting"=>$setting,
            "settingArticle"=>$settingArticle,
            "newsbutton"=>$newsbutton
            ]);
      
    });

   

    //serviceDetails
    Route::get('/aboutus', function () {
       
        $setting = Setting::find(1);
        $settingArticle= Article::find(14);

        $helpDep = Department::find(2);
        $helpDepImages= Department::find(2)->articles->where('articles_isactive', 'active');

        $popularCasesDep = Department::find(5);
        $popularCasesDepImages= Department::find(5)->articles->where('articles_isactive', 'active');
        $lastActivities= Article::find(5);

        $popularCasesDep = Department::find(5);
        $popularCasesDepImages= Department::find(5)->articles->where('articles_isactive', 'active');

        $counter= Department::find(6)->articles->where('articles_isactive', 'active');

        $newsDep = Department::find(7);
        $news=Department::find(7)->articles->where('articles_isactive', 'active');

        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);

       // return 'xxxxxxxxxxxx';

        return view('aboutus', [
            "settingArticle"=>$settingArticle,
            //"aboutUs"=>$aboutUs,
            "setting" => $setting,
            "helpDep"=>$helpDep,
            "helpDepImages"=>$helpDepImages,
            "popularCasesDep"=>$popularCasesDep,
            "popularCasesDepImages"=>$popularCasesDepImages,
            "lastActivities"=>$lastActivities,
            "counter"=>$counter,
            "newsDep"=>$newsDep,
            "news"=>$news,
            "newsbutton"=>$newsbutton
        ]);
    });

    Route::get('/cause_details/{id}', function ($id) {
       // return $id;
        //$service=Article::find($id);
        $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);
        $helpDep = Department::find(2);
        $item=Article::find($id);

        return view('cause_details', [
            "settingArticle"=>$settingArticle,
            "newsbutton"=>$newsbutton,
            "setting" => $setting,
            "item"=>$item,
            "helpDep"=>$helpDep
        ]);
    });

    Route::get('/contactUs', function () {
        //$service=Article::find($id);
        $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);
        


        return view('contactUs', [
            "settingArticle"=>$settingArticle,
            "setting" => $setting,
            "newsbutton"=>$newsbutton
        ]);
    });

    Route::get('/donates',function(){
        $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);

       // return 'gggggggggg';

        return view('donates', [
            "settingArticle"=>$settingArticle,
            "setting" => $setting,
            "newsbutton"=>$newsbutton
        ]);

    })->middleware(['auth']);

    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::resource('/department', DepartmentController::class);
        Route::resource('/article', ArticleController::class);
        //Route::resource('/clinics', ClinicsController::class);
        //Route::resource('/orders', OrderController::class);
        //Route::resource('/contactus', Contact_UsController::class);

        Route::get('/sort', [DepartmentController::class, 'Sort'])->name('Sort');
        // Route::resource('/testominals', TestominalsController::class);

        Route::get('/addSliderPage/{id}', [ArticleController::class, 'addSliderPage'])->name('addSliderPage');
        Route::post('/createslider', [ArticleController::class, 'createSlider'])->name('createSlider');
        Route::get('/editSliderPage/article={id}/dep={dep_id}', [ArticleController::class, 'editSliderPage'])->name('editSliderPage');
        Route::post('/editslider', [ArticleController::class, 'editSlider'])->name('editSlider');
        Route::post('/deleteslider', [ArticleController::class, 'deleteSlider'])->name('deleteSlider');
        //settings
        Route::get('/settingwebsite', [ArticleController::class, 'settingWebsite'])->name('settingWebsite');
        //editSetting
        Route::post('/editSetting', [ArticleController::class, 'editSetting'])->name('editSetting');
        //sort button   sortArticle
        Route::get('/sort', [ArticleController::class, 'Sort'])->name('Sort');
        Route::get('/sortArticle', [ArticleController::class, 'sortArticle'])->name('sortArticle');
        Route::get('/searcharticles', [ArticleController::class, 'searchArticles'])->name('searchArticles');
        //pdf and excel routes
        Route::get('/export/{id}', [ArticleController::class, 'export'])->name('export');
        Route::get('/downloadpdf/{id}', [ArticleController::class, 'downloadPdf'])->name('downloadPdf');

        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




        // //orders pages
        // Route::get('/searchorders', [OrderController::class, 'searchOrders'])->name('searchOrders');
        // Route::get('/sortorders', [OrderController::class, 'sortOrders'])->name('sortOrders');
        // //pdf and excel routes
        // Route::get('/exportOrder', [OrderController::class, 'exportOrder'])->name('exportOrder');
        // Route::get('/downloadpdfOrder', [OrderController::class, 'downloadpdfOrder'])->name('downloadpdfOrder');

        // Route::get('/searchTestominals', [TestominalsController::class, 'searchTestominals'])->name('searchTestominals');

        //  //sortContactRequests
        // Route::get('/sortContactRequests', [Contact_UsController::class, 'sortContactRequests'])->name('sortContactRequests');
        //  //searchContacts
        // Route::get('/searchContacts', [Contact_UsController::class, 'searchContacts'])->name('searchContacts');

        //    Route::get('/exportContacts', [Contact_UsController::class, 'exportContacts'])->name('exportContacts');
        // Route::get('/downloadpdfContacts', [Contact_UsController::class, 'downloadpdfContacts'])->name('downloadpdfContacts');


    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Auth::routes();
});








Route::get('/', function () {
    return redirect('/ar');
});
