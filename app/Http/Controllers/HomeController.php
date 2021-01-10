<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Messsage;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Context;

class HomeController extends Controller
{


    public static function categorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getsetting()
    {
        return Setting::first();
    }


    public function index()
    {
        $setting = Setting::first();
        $slider =   Product::select('id','title','image','price','slug')->limit(4)->get();
        $daily =   Product::select('id','title','image','price','slug')->limit(6)->inRandomOrder()->get();
        $last =   Product::select('id','title','image','price','slug')->limit(4)->orderByDesc('id')->get();
        $picked =   Product::select('id','title','image','price','slug')->limit(4)->inRandomOrder()->get();
        #print_r($picked);
        #exit();
        $data= [
            'setting'=>$setting,
            'slider'=>$slider,
            'daily'=>$daily,
            'last'=>$last,
            'picked'=>$picked,
            'page'=>'home'
        ];

        return view('home.index',$data);

    }

    public function product($id,$slug)
    {
        $data = Product::find($id);
        $datalist = Image::where('product_id',$id)->get();
        #print_r($data);
        #exit();
        return view('home.product_detail',['data'=>$data,'datalist'=>$datalist]);
    }

    public function getproduct(Request $request)
    {
        $search=$request->input('search');

        $count = Product::where('title', 'like', '%'.$search.'%')->get()->count();
        if ($count==1)
        {
            $data = Product::where('title', 'like', '%'.$search.'%')->first();
            return redirect()->route('product',['id'=>$data->id,'slug'=>$data->slug]);
        }
        else
        {
            return redirect()->route('productlist',['search'=>$search]);
        }

    }

    public function productlist($search)
    {
        $datalist =Product::where('title', 'like', '%'.$search.'%')->get();
        return view('home.search_products',['search'=>$search,'datalist'=>$datalist]);
    }



    public function addtocart($id)
    {
        echo "Add to Cart <br>";
        $data = Product::find($id);
        print_r($data);
        exit();
    }

    public function categoryproducts($id,$slug)
    {
        $datalist = Product::where('category_id',$id)->get();
        $data = Category::find($id);
        #print_r($data);
        #exit();
        return view('home.category_products',['data'=>$data,'datalist'=>$datalist]);
    }


    public function aboutus()
    {
        $setting = Setting::first();
        return view('home.about',['setting'=>$setting]);
    }
    public function references()
    {
        $setting = Setting::first();
        return view('home.references',['setting'=>$setting]);
    }
    public function faq()
    {
        return view('home.about');
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }

    public function sendmessage(Request $request)
    {
        $data = new Messsage();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->save();

        return redirect()->route('contact')->with('info','Mesajınız Kaydedilmişstir, Teşekkür ederiz.');

    }

    public function login()
    {
        return view('admin.login');
    }


    public function logincheck(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
            return view('admin.login');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //
    public function test($id,$name)
    {
        $data['id']=$id;
        $data['name']=$name;

        return view('home.test',$data);
        /*
        echo "Id Number :", $id;
        echo "<br>Name  :", $name;
        for ($i=1;$i<=$id;$i++)
        {
            echo "<br> $i - $name";
        }
        */
    }


}
