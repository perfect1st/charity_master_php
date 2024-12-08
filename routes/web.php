<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use App\Models\User;


use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ArticleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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

   Route::post('/pay',function(Request $request){

   $user = Auth::user();

   // return $user;

    $url = 'https://accept.paymob.com/api/auth/tokens';

    $data = [
        'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SndjbTltYVd4bFgzQnJJam95TWpNek16RXNJbU5zWVhOeklqb2lUV1Z5WTJoaGJuUWlMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuV3RVYjZHdkxRdXlCRG1mQjN1S0RIVTRGSklHMjJYSTNnellQRXA1czlhaC0wbkE4V0JJZEtBaDRvOS10Vkw4NmluaEVyblhSNkdhVVJPcXM5R21rckE='
        
    ]; // Replace with your request data

    try {
        $response = Http::post($url, $data);

       // $status = $response->status(); // HTTP status code
       // $responseBody = $response->body(); // Raw response body
        $responseJson = $response->json(); // JSON-decoded response (if applicable)

        $token=$responseJson['token'];

        $url2="https://accept.paymob.com/api/ecommerce/orders";

        $totalPrice=$request["radio-group"] * 100;

        $integrationID="2319784";

        $data2=[
            "auth_token" => $token,
          "delivery_needed" => "false",
          "amount_cents" => $totalPrice,
          "currency" => "EGP",
          "items" => []
            ];

            $response2 = Http::post($url2, $data2);

            $responseJson2 = $response2->json();

            $orderID=$responseJson2['id'];

          //  return $orderID;

            $url3="https://accept.paymob.com/api/acceptance/payment_keys";

            $billing_data_array = [
    'apartment' => 'Na',
    'email' =>$user->email,
    'floor' => 'Na',
    'first_name' => $user->name,
    'street' => 'Na',
    'building' => 'Na',
    'phone_number' => $user->mobile,
    'postal_code' => 'Na',
    'city' => 'Na',
    'country' => 'Na',
    'last_name' => $user->name,
    'state' => 'Na',
];

            $billing_data = (object) $billing_data_array;

            $data3=[
                "auth_token" => $token,
              "amount_cents" => $totalPrice,
              "expiration" => "3600",
              "order_id"=> $orderID,
              "currency"=> "EGP", 
              "integration_id"=> $integrationID,
              "billing_data" => $billing_data
                ];
            
                $response3 = Http::post($url3, $data3);

            $responseJson3 = $response3->json();

            $orderToken=$responseJson3['token'];

            $payURL = "https://accept.paymobsolutions.com/api/acceptance/iframes/414769?payment_token={$orderToken}";

            return redirect()->away($payURL);

         

    } catch (\Exception $e) {
        // Handle exceptions
    }

   })->middleware(['auth']);

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

    Route::get('/checkout',function(Request $request){
        $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);

        $success = $request->query('success'); 

      //  return $name;
        if($success==true){

        }


        return view('checkout',[
            "settingArticle"=>$settingArticle,
            "setting" => $setting,
            "newsbutton"=>$newsbutton
        ]);
    })->middleware(['auth']);

    Route::get('/userSetting',function(){
       // return 'vvvvvvvvvvvvv';

       $usersession = Auth::user();

        $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);
        $user=User::find($usersession->id);

       // return $user;

        return view('userSetting',[
            "settingArticle"=>$settingArticle,
            "setting" => $setting,
            "newsbutton"=>$newsbutton,
            "user"=>$user
        ]);

   })->middleware(['auth']);

   Route::post('editUserSetting',function(){
    return "gggggggggg";

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
