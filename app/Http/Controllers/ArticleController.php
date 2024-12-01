<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Excel;
use App\Exports\UsersExport;
use PDF;
use I18N_Arabic_Glyphs;
use App\Http\Controllers\Controller;
//use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Exception;
use Illuminate\Support\Facades\Hash;

class ArticleController extends Controller
{
    //get departments to all department pages
    private function userDeps()
    {
        $userDeps=Department::where('department_isactive','active')->where('price',null)->get();
        return $userDeps;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dep=Department::find($id);
        $userDeps=$this->userDeps();
        $sliders=Article::where('departement_id',$dep->id)->get();
        return view('admin.articles.all',compact('dep','userDeps','sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addSliderPage($id)
    {
        $type_id=$id;
        $userDeps=$this->userDeps();
        $dep= Department::find($type_id);
        //get id from departement table
        $sliderId=$id;
        //return add slider page
        return view('admin.articles.add',compact('userDeps','sliderId','dep'));
    }
    public function createSlider(Request $request)
    {
        $departmentId= $request->sliderId;
        $ar = nl2br(htmlentities($request->articles_subject_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->articles_subject_en, ENT_QUOTES, 'UTF-8'));
         $flag=$request->flag;

             $dt = now();
             $date = $dt->format('Y,dS M,(D) ');
              $path = 'articles/';
              $count=0;
              $x=array();
              //return $_FILES['articles_image']['name'][0];
              if($_FILES['articles_image']['name'][0] || $_FILES['articles_image']['name'][1] || $_FILES['articles_image']['name'][2] || $_FILES['articles_image']['name'][3])
              {
                // return 'done';
                 foreach($_FILES['articles_image']['name'] as $i => $name)
                 {
                     // now $name holds the original file name  time() . '.' . $course_pic->extension()
                      $tmp_name = time() .$_FILES['articles_image']['name'][$i];

                      if($tmp_name==null)
                      {
                         array_push($x,null);
                         continue;
                      }
                     if (move_uploaded_file($_FILES['articles_image']['tmp_name'][$i], $path . $tmp_name))
                     {
                         $count++;
                         array_push($x,$tmp_name);
                     }
                 }
              }

              array_keys($x);
             //return $x;
              array_key_exists(2, $x) ? $x[2]: null;
              $article=Article::create([
                 'departement_id'=>$request->sliderId,
                 'articles_title_ar'=>$request->articles_title_ar,
                 'articles_title_en'=>$request->articles_title_en,
                 'articles_subject_ar'=>$ar,
                 'articles_subject_en'=>$en,
                 'articles_isactive'=>$request->articles_isactive,
                 'articles_image'=>array_key_exists(0, $x) && $x[0] ? $x[0]: null,
                  'articles_date'=>$date,
                  'articles_address_ar'=>$request->articles_address_ar,
                  'articles_address_en'=>$request->articles_address_en,
                  'articles_subject_ar2'=>$request->articles_subject_ar2,
                  'articles_subject_en2'=>$request->articles_subject_en2,
                 // 'articles_keyword'=>$request->articles_keyword,
                  //'articles_desc'=>$request->articles_desc
             ]);
           //  $article->articles_image2=array_key_exists(1, $x) && $x[1] ? $x[1]: null;
            // $article->articles_image3=array_key_exists(2, $x) && $x[2] ? $x[2]: null;
            // $article->articles_image4=array_key_exists(3, $x) && $x[3] ? $x[3]: null;
             $article->save();
            return redirect()->route('article.show',$departmentId);
    }
    public function Sort(Request $request)
    {
          $sort= $request->search;
          if($sort=='Arabic Title')
          {
            $departements=Department::orderBy('department_title_ar', 'DESC')->get();
          }
          elseif($sort=='English Title')
          {
            $departements=Department::orderBy('department_title_en', 'DESC')->get();
          }
          $userDeps=$this->userDeps();
          return view('admin.departmentlist',compact('departements','userDeps'));
    }
    public function editSliderPage($id,$depArticle_id)
    {

        $dep_id=$depArticle_id;
        $sliderId=$id;
        $userDeps=$this->userDeps();
        $dep=Article::find($sliderId)->departement;
        $article=Article::find($sliderId);
         return view('admin.articles.edit',compact('sliderId','userDeps','dep','dep_id','article'));
        // return view('admin.articles.edit',compact('sliderId','userDeps','dep','dep_id'));
    }
    public function editSlider(Request $request)
    {
       // return $request;
        $id=$request->sliderId;
        $dep_id=$request->dep_id;
         $count=0;
         $path = 'articles/';
         $x=array();
         $ar = nl2br(htmlentities($request->articles_subject_ar, ENT_QUOTES, 'UTF-8'));
         $en = nl2br(htmlentities($request->articles_subject_en, ENT_QUOTES, 'UTF-8'));
         $ar2 = nl2br(htmlentities($request->articles_subject_ar2, ENT_QUOTES, 'UTF-8'));
         $en2 = nl2br(htmlentities($request->articles_subject_en2, ENT_QUOTES, 'UTF-8'));
         
        foreach($_FILES['articles_image']['name'] as $i => $name)
        {
            // now $name holds the original file name
             $tmp_name = time().$_FILES['articles_image']['name'][$i];
             if($tmp_name==null)
                 {
                    array_push($x,null);
                    continue;
                 }

                if (move_uploaded_file($_FILES['articles_image']['tmp_name'][$i], $path . $tmp_name))
                {
                    array_push($x,$tmp_name);
                    $count++;
                }

        }
       // return $x;
        $update = array();
        $update['articles_title_ar'] = $request->articles_title_ar;
        $update['articles_title_en'] = $request->articles_title_en;

        $update['articles_subject_ar'] = $ar;
        $update['articles_subject_en'] = $en;

        $update['articles_isactive'] = $request->articles_isactive;
        $update['articles_address_ar'] = $request->articles_address_ar;
        $update['articles_address_en'] = $request->articles_address_en;
        $update['articles_subject_ar2'] = $ar2;
        $update['articles_subject_en2'] = $en2;
        $update['articles_keyword']=$request->articles_keyword;
        $update['articles_desc']=$request->articles_desc;
        //$work_time

        Article::where('id', $id)->update(
            $update
        );
        if(count($x)>0)
        {
            $article=Article::find($id);
            if(array_key_exists(0, $x) && $x[0])
            { $article->articles_image=$x[0];}
            if(array_key_exists(1, $x) && $x[1])
            {$article->articles_image2=$x[1];}
            if(array_key_exists(2, $x) && $x[2])
            { $article->articles_image3=$x[2]; }
            if(array_key_exists(3, $x) && $x[3])
            { $article->articles_image4=$x[3]; }
            $article->save();
        }
       return redirect()->route('article.show',$dep_id);
    }

    public function deleteSlider(Request $request)
    {
       $id=$request->sliderId;
      $article= Article::find($id);
      //return $article;
      // $article->articles_image;
       $img_destination = 'articles/' . $article->articles_image;
       $img_destination2 = 'articles/' . $article->articles_image2;
       $img_destination3 = 'articles/' . $article->articles_image3;
       $img_destination4 = 'articles/' . $article->articles_image4;
        if (File::exists($img_destination)) {
           // return 'done';
            File::delete($img_destination);
           // return 'done';
        }
        if (File::exists($img_destination2)) {
            File::delete($img_destination2);
        }
        if (File::exists($img_destination3)) {
            File::delete($img_destination3);
        }
        if (File::exists($img_destination4)) {
            File::delete($img_destination4);
        }
       // return 'no';
        $article->delete();
       return redirect()->back();
    }
    public function sortArticle(Request $request)
    {
        $sort= $request->search;
        $id=$request->id;
        $sortColum='';
        $sort=='Title Ar' || $sort=='العنوان بالعربية' ? $sortColum='articles_title_ar' : '' ;
       // return $sortColum;
        $sort=='Title En' || $sort=='العنوان بالانجليزية' ? $sortColum='articles_title_en' : '';
        $sort=='Subject Ar' || $sort=='المحتوي بالعربية' ? $sortColum='articles_subject_ar' : '';
        $sort=='Subject EN' || $sort=='المحتوي بالانجليزية' ? $sortColum='articles_subject_en' : '';
        $sort=='is active' || $sort=='نشط ام لا' ? $sortColum='articles_isactive' : '';

             $sliders=Article::orderBy($sortColum,'DESC')->where('departement_id',$id)->paginate();
            // $sliders=Article::where('departement_id',$dep->id)->paginate();
             $dep=Department::find($id);
             $userDeps=$this->userDeps();
             return view('admin.articles.all',compact('dep','userDeps','sliders'));
    }
    public function searchArticles(Request $request)
    {
        $search_field=$request->search_field;
        $type=$request->type;
        $id=$request->id;
        $dep=Department::find($id);
        $userDeps=$this->userDeps();
        $sliders=Article::where($type,$search_field)->where('departement_id',$id)->paginate();
        return view('admin.articles.all',compact('dep','userDeps','sliders'));
    }

    public function export($dep_id){
        return Excel::download(new UsersExport($dep_id), 'users.csv');
    }
    public function downloadPdf($dep_id)
    {
      $sliders=Article::select('articles_title_ar', 'articles_title_en', 'articles_subject_ar','articles_subject_en','articles_isactive','price')->where('departement_id',$dep_id)->get();
      $dep=Department::find($dep_id);
      $pdf = PDF::loadView('pdf.articlepdf',[
        'title' => 'Certificate',
        'format' => 'A4-P',
        'orientation' => 'P'
    ] ,compact('sliders','dep'));
     return $pdf->download('report.pdf');

    }
    public function settingWebsite()
    {
        $userDeps=$this->userDeps();
        $setting=Setting::findOrNew(1);
        $setting->save();
        return view('admin.setting.edit',compact('setting','userDeps'));
    }
    public function editSetting(Request $request)
    {
        $work_time = nl2br(htmlentities($request->work_time, ENT_QUOTES, 'UTF-8'));
        $work_time_en= nl2br(htmlentities($request->work_time_en, ENT_QUOTES, 'UTF-8'));
      //  return $work_time;
        $update = array();
            $update['setting_title_ar'] = $request->setting_title_ar;
            $update['setting_title_en'] = $request->setting_title_en;
            $update['setting_site_email'] = $request->setting_site_email;
            $update['setting_keywords'] = $request->setting_keywords;
            $update['setting_description'] = $request->setting_description;
            $update['setting_site_address_ar'] = $request->setting_site_address_ar;
            $update['setting_site_address_en'] = $request->setting_site_address_en;
            $update['setting_googlemap'] = $request->setting_googlemap;
            $update['setting_facebookurl'] = $request->setting_facebookurl;
            $update['setting_twitterurl'] = $request->setting_twitterurl;
            $update['setting_googleplusurl'] = $request->setting_googleplusurl;
            $update['setting_instgramurl'] = $request->setting_instgramurl;
            $update['setting_snapchaturl'] = $request->setting_snapchaturl;
            $update['setting_linkedinurl'] = $request->setting_linkedinurl;
            $update['setting_youtubeurl'] = $request->setting_youtubeurl;
            $update['setting_whatsappurl'] = $request->setting_whatsappurl;
            $update['setting_sitetell1'] = $request->setting_sitetell1;
            
           
             
             
            Setting::where('id', 1)->update(
                $update
            );
            return redirect()->back();
    }

}
