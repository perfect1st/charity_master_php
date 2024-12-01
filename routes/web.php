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
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP 

      $sliders = Department::find(1)->articles->where('articles_isactive', 'active');
        $aboutUs = Department::find(2)->articles->where('articles_isactive', 'active');
        $servicesDep = Department::find(3);
        $services= Department::find(3)->articles->where('articles_isactive', 'active')->take(6);

        $galleryDep = Department::find(4);
        $gallery= Department::find(4)->articles->where('articles_isactive', 'active')->take(6);
        $setting = Setting::find(1);

       
      
        $flag='home';

        return view('welcome',[
            "sliders"=>$sliders,
            "aboutUs"=>$aboutUs,
            "servicesDep"=>$servicesDep,
            "services"=>$services,
            "galleryDep"=>$galleryDep,
            "gallery"=>$gallery,
            "setting"=>$setting,
            "flag"=>$flag
            ]);
    
    **/

    Route::get('/', function () {
        $banner = Article::find(1);
        $helpDep = Department::find(2);
        $helpDepImages= Department::find(2)->articles->where('articles_isactive', 'active');

        $lastActivities= Article::find(5);

        $popularCasesDep = Department::find(5);
        $popularCasesDepImages= Department::find(5)->articles->where('articles_isactive', 'active');


        return view('welcome',[
            "banner"=>$banner,
            "helpDep"=>$helpDep,
            "helpDepImages"=>$helpDepImages,
            "lastActivities"=>$lastActivities,
            "popularCasesDep"=>$popularCasesDep,
            "popularCasesDepImages"=>$popularCasesDepImages
            ]);
      
    });

    Route::get('/gallery', function () {
       // $service = Article::find($id);
        $setting = Setting::find(1);
        $galleryDep = Department::find(4);
        $gallery= Department::find(4)->articles->where('articles_isactive', 'active')->take(6);
        $flag='gallery';

        return view('gallery', [
          
            "galleryDep"=>$galleryDep,
            "gallery"=>$gallery,
            "setting" => $setting,
            "flag"=>$flag
        ]);
    });

    //serviceDetails
    Route::get('/aboutus', function () {
        //$service=Article::find($id);
        $setting = Setting::find(1);
        $flag='aboutus';
        $aboutUs = Department::find(2)->articles->where('articles_isactive', 'active');


        return view('aboutus', [
            "flag"=>$flag,
            "aboutUs"=>$aboutUs,
            "setting" => $setting
        ]);
    });

    Route::get('/services', function () {
        //$service=Article::find($id);
        $setting = Setting::find(1);
        $servicesDep = Department::find(3);
        $services= Department::find(3)->articles->where('articles_isactive', 'active');
        $flag='services';

        return view('services', [
            "flag"=>$flag,
            "servicesDep"=>$servicesDep,
            "services"=>$services,
            "setting" => $setting
        ]);
    });

    Route::get('/contact', function () {
        //$service=Article::find($id);
        $setting = Setting::find(1);
        $flag='contact';


        return view('contact', [
            "flag"=>$flag,
            "setting" => $setting
        ]);
    });

    Route::get('/service/{id}',function($id){
        $article=Article::find($id);
        $setting = Setting::find(1);
        $flag='contact';

       // return 'gggggggggg';

        return view('service', [
            "flag"=>$flag,
            "setting" => $setting,
            "article"=>$article
        ]);

    });

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
