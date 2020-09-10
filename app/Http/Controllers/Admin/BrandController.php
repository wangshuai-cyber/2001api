<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Http\Requests\StoreBrandPost;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
       {
        $brand_name=request()->brand_name;
        $where=[];
        if($brand_name){
            $where[]=['brand_name','like',"%$brand_name%"];
        }

        $brand_url=request()->brand_url;
        if($brand_url){
            $where[]=['brand_url','like',"%$brand_url%"];
        }


        $data=Brand::where($where)->OrderBy('brand_id','desc')->paginate(4);
        if(request()->ajax()){
            return view("admin.brand.ajaxpage",['data'=>$data,'query'=>request()->all()]);
        }    
        return view("admin.brand.show",['data'=>$data,'query'=>request()->all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/create');
    }
    public function upload(Request $request){


            if ($request->hasFile('file') && $request->file('file')->isValid()){

                $photo=$request->file;

                $store_result = $photo->store('upload');
                return json_encode(['code'=>0,'msg'=>'上传成功','data'=>env('IMG_URL').$store_result]);

            }
                return json_encode(['code'=>0,'msg'=>'上传失败']);
            }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brand',
                'brand_url' => 'required',
            ],[
                'brand_name.required'=>'品牌名称不能为空',
                'brand_name.unique'=>'品牌名称已存在',
                'brand_url.required'=>'品牌网址不能为空',
            ]
        );
        $post=$request->except(['_token','file']);
        $res=Brand::create($post);
        if($res){
            return redirect('/brand/show');
        }
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
        $brand=Brand::find($id);
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        $post=$request->except(['_token','file']);
//        $post['brand_logo']="";
        $res=Brand::where('brand_id',$id)->update($post);
        if($res!==false){
            return redirect('/brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        $id = request()->id?:$id;
        if(!$id){
            return;
        }
        $res=Brand::destroy($id);
        if(request()->ajax()){
            return response()->json(['code'=>0,'msg'=>"删除成功"]);
        }
        if($res){
            return redirect('/brand');
        }
    }


     public function change(Request $request)
    {
        $brand_name=$request->brand_name;
        $id=$request->id;
        // dump($id);
        // dd($brand_name);
        if(!$brand_name || !$id){
            //return  $this->error('缺少参数');
            return  response()->json(['code'=>3,'msg'=>'缺少参数']);
        }
        $res=Brand::where('brand_id',$id)->update(['brand_name'=>$brand_name]);
        if($res){
            //return  $this->success('修改成功','');
           return  response()->json(['code'=>0,'msg'=>'修改成功']);
        }
    }
}
