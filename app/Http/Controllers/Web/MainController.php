<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use App\Responses\ServerResponse;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    use Valet;
    public function index(Request $request)
    {
        return view('features.public.index');
    }
    public function blog(Request $request)
    {
        return view('features.public.blog');
    }

    public function studio(Request $request)
    {
        return view('features.public.studio');
    }
    public function wedding(Request $request)
    {
        return view('features.public.wedding');
    }
    public function prewedding(Request $request)
    {
        return view('features.public.prewedding');
    }
    public function engagement(Request $request)
    {
        return view('features.public.engagement');
    }
    public function pengajian(Request $request)
    {
        return view('features.public.pengajian');
    }
    public function kin(Request $request)
    {
        return view('features.public.kin');
    }
    public function pl(Request $request)
    {
        return view('features.public.pl');
    }
    public function review(Request $request)
    {
        return view('features.public.review');
    }
    public function faq(Request $request)
    {
        return view('features.public.faq');
    }
    public function aboutUs(Request $request)
    {
        return view('features.public.about-us');
    }
    public function gallery(Request $request, $slug)
    {
        $title = "Gallery Title";
        return view('features.public.gallery', compact('title'));
    }
    public function form(Request $request)
    {
        $profile = json_decode($request->cookie('profile'), true);
        return view('features.public.form', compact('profile'));
    }
    public function reservation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'option' => 'required',
            'name' => 'required',
            'agreement1' => 'required',
            'agreement2' => 'required',
            'notes' => 'required',
            'other' => 'required',
            'list' => 'required',
            'address' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'instaramcp' => 'required',
            'namecpp' => 'required',
            'instagram' => 'required',
        ], [
            'type.required' => 'Bagian ini harus diisi !',
            'option.required' => 'Bagian ini harus diisi !',
            'name.required' => 'Bagian ini harus diisi !',
            'agreement1.required' => 'Bagian ini harus diisi !',
            'agreement2.required' => 'Bagian ini harus diisi !',
            'notes.required' => 'Bagian ini harus diisi !',
            'other.required' => 'Bagian ini harus diisi !',
            'list.required' => 'Bagian ini harus diisi !',
            'address.required' => 'Bagian ini harus diisi !',
            'email.required' => 'Bagian ini harus diisi !',
            'instaramcp.required' => 'Bagian ini harus diisi !',
            'instagram.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data['name'] = $request->name;
        $detail = "";
        if ($request->option == "Prewedding") {
            $detail = $request->prewedding_package;
        } else if ($request->option == "Wedding") {
            $detail = $request->wedding_package;
        } else if ($request->option == "Custome Page") {
            $detail = $request->etc;
        } else {
            $detail = $request->option;
        }
        $request->merge(['detail' => $detail]);
        $data['content'] = json_encode($request->all(), true);
        $category = $this->getFix('booking-category');
        $data['category'] = $category;
        $data['status'] = 'Pending';
        DB::beginTransaction();
        try {
            $db = Content::create($data);
            $result = [
                'message' => 'Booking Berhasil Disimpan !',
                'data' => $db,
                'code' => 200,
                'errors' => []
            ];
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $result = [
                'message' => $e->getMessage(),
                'data' => [],
                'code' => 500,
                'errors' => [
                    'line' => $e->getLine(),
                    'message' => $e->getMessage()
                ]
            ];
        }
        return $this->respond($result, $result['code']);
    }
    public function login(Request $request)
    {
        return view('features.public.login');
    }
    public function register(Request $request)
    {
        return view('features.public.register');
    }
    public function getContent(Request $request)
    {
        $variable = str_replace(' ', '', $request->key);
        switch ($variable) {
            case trim($this->getFix('image')):
                return $this->getDataImage($request);
                break;
            case trim('category-blog'):
                return $this->getCategoryBlog($request);
                break;
            default:
                return response()->json(['message' => 'not found']);
                break;
        }
    }
    public function getDataImage(Request $request)
    {
        $limit = $request->limit;
        $category = $request->category;
        $offset = $request->offset;
        $images = Image::where('statusenable', true)
            ->whereNull('parent_id')
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category', 'like', '%' . $category . '%');
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->get();
        return view('features.public.data.gallery', compact('images'));
    }
    public function getCategoryBlog(Request $request)
    {
        $categories = Content::where('category', 'category-image')->where('statusenable', true)->get();
        return view('features.public.data.category', compact('categories'));
    }
}
