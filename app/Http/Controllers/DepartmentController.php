<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;

class DepartmentController extends Controller
{
    //get departments to all department pages
    private function userDeps()
    {
        //return 'done';
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
        $departements=Department::all();
        $userDeps=$this->userDeps();
       // $userDeps=Department::where('department_isactive','active')->get();
        return view('admin.departmentlist',compact('departements','userDeps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $userDeps=Department::where('department_isactive','active')->get();
       $userDeps=$this->userDeps();
       return view('admin.createdepartment',compact('userDeps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $departmentPic=$request->department_image;
        if($departmentPic==null)
        {
            Department::create([
                'department_title_ar'=>$request->department_title_ar,
                'department_title_en'=>$request->department_title_en,
                'department_isbranch'=>$request->depatment_isbranch,
                'department_isactive'=>$request->depatment_isactive,
                'department_fatherid'=>$request->department_fatherid,
                //'department_image'=>$request->department_image,
            ]);
        }
        else{
             $file_extension = $departmentPic->getClientOriginalExtension();
             $file_name = time() . '.' . $file_extension;
             $path = 'articles';
             $departmentPic->move($path, $file_name);
            Department::create([
                'department_title_ar'=>$request->department_title_ar,
                'department_title_en'=>$request->department_title_en,
                'department_isbranch'=>$request->depatment_isbranch,
                'department_isactive'=>$request->depatment_isactive,
                'department_image'=>$file_name,
                'department_fatherid'=>$request->department_fatherid,
                'department_image'=>$request->department_image
            ]);
        }

       return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep=Department::find($id);
        $userDeps=$this->userDeps();
      //  $userDeps=Department::where('department_isactive','active')->get();
        return view('admin.editdepartment',compact('userDeps','dep'));
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
        $departmentPic=$request->department_image;
        if($departmentPic==null)
        {
            $update = array();
            $update['department_title_ar'] = $request->department_title_ar;
            $update['department_title_en'] = $request->department_title_en;
            $update['department_isbranch'] = $request->depatment_isbranch;
            $update['department_isactive'] = $request->depatment_isactive;
            $update['department_fatherid'] = $request->department_fatherid;
            Department::where('id', $id)->update(
                $update
             );
        }
        else
        {
           $file_extension = $departmentPic->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'articles';
            $departmentPic->move($path, $file_name);
            $update = array();
            $update['department_title_ar'] = $request->department_title_ar;
            $update['department_title_en'] = $request->department_title_en;
            $update['department_isbranch'] = $request->depatment_isbranch;
            $update['department_isactive'] = $request->depatment_isactive;
            $update['department_fatherid'] = $request->department_fatherid;
            $update['department_image']=$file_name;
            Department::where('id', $id)->update(
                $update
            );
        }

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->articles()->delete();

        Department::find($id)->delete();
        return redirect()->route('department.index');
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
          //$userDeps=Department::where('department_isactive','active')->get();
          return view('admin.departmentlist',compact('departements','userDeps'));
    }
    public function confirmDeleteDepartment($id)
    {
        return redirect()->back()->with('delete_confirm', $id);
    }
}

