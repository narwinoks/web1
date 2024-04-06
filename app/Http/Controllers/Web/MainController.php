<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use App\Models\Product;
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
        $banners = Content::where('statusenable', true)
            ->where('statusenable', true)
            ->where('category', 'banner')
            ->get();
        return view('features.public.index', compact('banners'));
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
        $title = Helper::getImageTitle($slug);
        return view('features.public.gallery', compact('title', 'slug'));
    }
    public function form(Request $request)
    {
        $profile = $request->session()->has('profile') ? json_decode($request->session()->get('profile'), true) : null;
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
            case trim('portfolio'):
                return $this->genRandomImage($request);
                break;
            case trim('review'):
                return $this->getReview($request);
                break;
            case trim('banner'):
                return $this->getBanner($request);
                break;
            case trim('pricelist'):
                return $this->getPricelist($request);
                break;
            case trim('image-pricelist'):
                return $this->getImagePricelist($request);
                break;
            case trim('qa'):
                return $this->getQA($request);
                break;
            case trim('gallery'):
                return $this->getGallery($request);
                break;
            case trim('studio'):
                return $this->studioData($request);
                break;
            case trim('products'):
                return $this->getProducts($request);
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
                return $query->where('category', $category);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->get();
        return view('features.public.data.gallery', compact('images'));
    }
    public function genRandomImage(Request $request)
    {
        $limit = 6;
        $offset = 0;
        $images = Image::where('statusenable', true)
            ->whereNull('parent_id')
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->get();
        return view('features.public.data.portfolio', compact('images'));
    }
    public function getCategoryBlog(Request $request)
    {
        $categories = Content::where('category', 'category-image')
            ->whereNotNull('image')
            ->where('statusenable', true)->get();
        if ($request->home) {
            return view('features.public.data.tommorrow', compact('categories'));
        } else {
            return view('features.public.data.category', compact('categories'));
        }
    }
    public function getReview(Request $request)
    {
        $search = $request->search;
        $category = $this->getFix('review');
        $limit = $request->limit ?? 10;
        $offset = $request->offset ?? 0;
        $reviews = Content::where('statusenable', true)
            ->when($search, function ($query) use ($search) {
                return $query->where('content', 'like', '%' . $search . '%');
            })
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->where('statusenable', true)
            ->where('category', $category)
            ->orderBy('created_at', 'DESC')
            ->get();
        if ($request->detail) {
            return view('features.public.data.review-detail', compact('reviews'));
        } else {
            return view('features.public.data.review', compact('reviews'));
        }
    }
    public function getBanner(Request $request)
    {
        $offset = 0;
        $category = $this->getFix('banner');
        $search = $this->getFix('banner');

        $banners = Content::where('statusenable', true)
            ->where('statusenable', true)
            ->where('category', $category)
            ->get();
        return view('features.public.data.banner', compact('banners'));
    }

    public function getPricelist(Request $request)
    {
        $category = $request->category;
        $contents = Content::where('statusenable', true)
            ->when($category, function ($query) use ($category) {
                return $query->where('content', 'like', '%' . $category . '%');
            })
            ->where('category', 'pricelist')
            ->get();
        return view('features.public.data.pl', compact('contents'));
    }
    public function getImagePricelist(Request $request)
    {
        $limit = 6;
        $offset = 0;
        $images = Image::where('statusenable', true)
            ->whereNull('parent_id')
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('features.public.data.img-pl', compact('images'));
    }

    public function save(Request $request)
    {
        $key = $request->key;
        switch ($key) {
            case 'save-pl':
                return $this->savePl($request);
                break;
            case 'genaral':
                return $this->savePl($request);
                break;
            default:
                return response()->json(['message' => 'not found']);
                break;
        }
    }
    public function savePl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'package' => 'required',
            'location' => 'required',
            'find' => 'required',
            'brand' => 'required',
            'estimed' => 'required',
            'why' => 'required',
            'email' => 'required',
            'number' => 'required',
        ], [
            'name.required' => 'Bagian ini harus diisi !',
            'package.required' => 'Bagian ini harus diisi !',
            'location.required' => 'Bagian ini harus diisi !',
            'find.required' => 'Bagian ini harus diisi !',
            'brand.required' => 'Bagian ini harus diisi !',
            'estimed.required' => 'Bagian ini harus diisi !',
            'why.required' => 'Bagian ini harus diisi !',
            'enail.required' => 'Bagian ini harus diisi !',
            'phone.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data = $request->all();
        $data['name'] = $request->name;
        $data['content'] = json_encode($request->all());
        $data['category'] = 'request-pl';
        DB::beginTransaction();
        try {
            $db = Content::create($data);
            $result = [
                'message' => 'Success !',
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
    public function saveForm(Request $request)
    {
        $variable = $request->key;
        switch ($variable) {
            case 'review':
                return $this->saveReviewUser($request);
                break;
            default:
                return response()->json(['message' => 'not found'], 404);
                break;
        }
    }
    public function getQA(Request $request)
    {
        $search = $request->search;
        $category = $this->getFix('qa');
        $limit = $request->limit;
        $offset = $request->offset;
        $contents = Content::where('statusenable', true)
            ->when($search, function ($query) use ($search) {
                return $query->where('content', 'like', '%' . $search . '%');
            })
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->where('category', $category)
            ->get();
        return view('features.public.data.qa', compact('contents'));
    }
    public function getGallery(Request $request)
    {
        $images  = DB::table('images as img1')->join('images as img2', 'img1.id', '=', 'img2.parent_id')->where('img1.slug', $request->slug)->get();
        return view('features.public.data.gallery-detail', compact('images'));
    }
    public function products(Request $request)
    {
        return view('features.public.product');
    }
    public function product(Request $request, $slug)
    {
        $product = Product::where('statusenable', true)
            ->with('images')
            ->where('slug', $slug)
            ->first();
        if (!$product) {
            return view('errors.404');
        }
        return view('features.public.products-detail', compact('product'));
    }
    public function cart(Request $request)
    {
        return view('features.public.cart');
    }
    public function formReview(Request $request)
    {
        return view('features.public.form-review');
    }
    public function saveReviewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'review' => 'required',
        ], [
            'name.required' => 'Bagian ini harus diisi !',
            'review.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $save = $request->only('name', 'review', 'rating');
        $save['image'] = auth()->user()->profile;
        $data['content'] = json_encode($save, true);
        $category = $this->getFix('review');
        $data['name'] = $request->name . "-" . "review";
        $data['category'] = $category;
        try {
            $res = Content::updateOrCreate(['id' => $request->id], $data);
            $result = [
                'message' => 'Success !',
                'data' => $res,
                'code' => 200,
                'errors' => []
            ];
        } catch (Exception $e) {
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
    public function studioData(Request $request)
    {
        $category = 'Studio';
        $limit = 20;
        $order = $request->order;
        $images = Image::where('statusenable', true)
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category', $category);
            })
            ->when($order, function ($query) use ($order) {
                return $query->orderBy('created_at', $order);
            })
            ->inRandomOrder()
            ->get();
        return view('features.public.data.studio', compact('images'));
    }
    public function getProducts(Request $request)
    {
        $products = Product::where('statusenable', true)
            ->get();
        return view('features.public.data.product', compact('products'));
    }
}
