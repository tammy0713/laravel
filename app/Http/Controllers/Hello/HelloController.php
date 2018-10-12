<?php
namespace App\Http\Controllers\Hello;
use App\Hello;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $model=new Hello();
        var_dump($model->find(4));
    }
    public function info()
    {
        $data = DB::table('hello')->get()->toArray();
        //var_dump($data);die();
       //return view('hello/info',['data'=>$data]);
    }
    public function add(Request $request)
    {
        $data=$request->post();
        unset($data['_token']);
        $res= DB::table('hello')->insert($data);
        if($res)
        {
            return redirect('hello/select');
        }else{
            return redirect('hello/select');
        }
    }
    public function select()
    {
        $data = DB::table('hello')->get()->toArray();
        //$data = DB::table('hello')->paginate(3)->toArray();
//        echo "<pre>";
       //var_dump($data);
       return view('hello/select',['data'=>$data]);
    }
    public function del($id)
    {
       $del= DB::table('hello')->delete($id);
        if($del)
        {
            return redirect('hello/select');
        }else{
            return redirect('hello/select');
        }
    }
    public function up($id)
    {
        $up= DB::table('hello')->find($id);
        return view('hello/up',['up'=>$up]);
    }
    public function up_do(Request $request)
    {
       $data=$request->post();
        $id=$data['id'];
        $res=[
          'name'=>$data['name'],
            'pwd'=>$data['pwd'],
        ];
        $res= DB::table('hello')->where('id',$id)->update($res);
        if($res)
        {
            return redirect('hello/select');
        }else{
            return redirect('hello/up');
        }
    }
}