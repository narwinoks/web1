<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Responses\ServerResponse;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    use Valet;
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function home(Request $request)
    {
        return view('features.admin.dashboard');
    }
    public function booking(Request $request)
    {
        $category = $this->getFix('booking-category');
        return view('features.admin.booking', compact('category'));
    }
    public function content(Request $request)
    {
        $variable = str_replace(' ', '', $request->key);
        switch ($variable) {
            case trim($this->getFix('booking-category')):
                return $this->getDataBooking($request);
                break;
            case trim($this->getFix('image')):
                return $this->getDataImage($request);
                break;
            case 'image-edit':
                return $this->editImage($request);
                break;
            case 'dashboard':
                return $this->dashboard($request);
                break;
            case 'price-list':
                return $this->priceListData($request);
                break;
            case $this->getFix('qa'):
                return $this->qaData($request);
                break;
            case $this->getFix('review'):
                return $this->reviewData($request);
                break;
            case $this->getFix('banner'):
                return $this->bannerData($request);
                break;
            case 'request-pl':
                return $this->getPLRequest($request);
                break;
            case 'bank':
                return $this->getBank($request);
                break;
            case 'img-gallery':
                return $this->getProductGallery($request);
                break;
            case 'orders':
                return $this->getOrder($request);
                break;
            case 'story':
                return $this->getStory($request);
                break;
            case 'category-blog':
                return $this->getCategory($request);
                break;
            default:
                return response()->json(['message' => 'not found']);
                break;
        }
    }
    public function dashboard(Request $request)
    {
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subDays(6);
        if ($request->type == "booking") {
            $category = $this->getFix('booking-category');
            $bookings = Content::where('category', $category)->where('statusenable', true);
            $booking = $bookings->whereBetween('created_at', [$startDate, $endDate])->get();
            $acceptedBookings = clone $bookings;
            $accept = $acceptedBookings->where('status', 'LIKE', '%Approve%')->count();
            $pendingBookings = clone $bookings;
            $pending = $pendingBookings->where('status', 'LIKE', '%Pending%')->count();
            $rejectedBookings = clone $bookings;
            $reject = $rejectedBookings->where('status', 'LIKE', '%Reject%')->count();
            $bookingCounts = [];
            $dates = [];
            $bookingsResult = [];
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $formattedDate = $date->toDateString();
                $dates[] = $formattedDate;
                $bookingsResult[] = isset($bookingCounts[$formattedDate]) ? $bookingCounts[$formattedDate] : 0;
            }
            return view('features.admin.data.dp', compact('bookingsResult', 'booking', 'accept', 'pending', 'reject'));
        } elseif ($request->type == "image") {
            $image = Image::whereNull('parent_id')->count();
            $countByCategories = Image::whereNull('parent_id')->select('category', DB::raw('COUNT(*) as total'))
                ->groupBy('category')
                ->orderByDesc('total')
                ->take(3)
                ->get();
            $imageCounts = Image::whereNull('parent_id')
                ->whereBetween(DB::raw('DATE(created_at)'), [$startDate->toDateString(), $endDate->toDateString()])
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('total', 'date')
                ->toArray();

            $dates = [];
            $imagesResult = [];
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $formattedDate = $date->toDateString();
                $dates[] = $formattedDate;
                $imagesResult[] = isset($imageCounts[$formattedDate]) ? $imageCounts[$formattedDate] : 0;
            }

            return view('features.admin.data.ds', compact('image', 'countByCategories', 'dates', 'imagesResult'));
        } else {
            $user = User::count();
            $userStatus = User::select('statusenambled', DB::raw('COUNT(*) as total'))
                ->groupBy('statusenambled')
                ->orderByDesc('total')
                ->take(3)
                ->get();
            $userCounts = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
                ->whereBetween('created_at', [$startDate, $endDate->endOfDay()])
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('total', 'date')
                ->toArray();

            $dates = [];
            $usersResult = [];
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $formattedDate = $date->toDateString();
                $dates[] = $formattedDate;
                $usersResult[] = isset($userCounts[$formattedDate]) ? $userCounts[$formattedDate] : 0;
            }
            return view('features.admin.data.du', compact('user', 'userStatus', 'usersResult'));
        }
    }
    public function saveContent(Request $request)
    {
        $key = $request->key;
        switch ($key) {
            case 'save-image':
                return $this->saveImage($request);
                break;
            case 'save-price-list':
                return $this->savePriceList($request);
                break;
            case 'save-qa':
                return $this->saveQa($request);
                break;
            case 'review':
                return $this->saveReview($request);
                break;
            case 'banner':
                return $this->saveBanner($request);
                break;
            case 'bank':
                return $this->saveBank($request);
                break;
            case 'product':
                return $this->saveProduct($request);
                break;
            case 'story':
                return $this->saveStory($request);
                break;
            case 'category-blog':
                return $this->saveCategoryBlog($request);
                break;
            default:
                return response()->json(['message' => 'not found']);
                break;
        }
    }
    public function deleteContent(Request $request)
    {
        $key = $request->key;
        switch ($key) {
            case 'delete-image':
                return $this->deleteImage($request);
                break;
            case 'delete':
                return $this->delete($request);
                break;

            default:
                return response()->json(['message' => 'not found']);
                break;
        }
    }
    public function getDataBooking(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $startDate = $request->startDate . " " . "00:00:00";
        $endDate = $request->endDate . " " . "23:59:59";
        $category = $this->getFix('booking-category');
        $bookings = Content::where('category', $category)
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })
            ->get();

        return view('features.admin.data.booking', compact('bookings'));
    }
    public function updateContent(Request $request)
    {
        $content = Content::where('id', $request->id)->first();
        try {
            $content->update($request->all());
            $result = [
                'data' => $content,
                'message' => 'Successfully',
                'code' => 200
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
    public function image(Request $request)
    {
        $keyCategory = $this->getFix('image');
        $categories = Content::select('name')->where('category', 'category-image')->where('statusenable', true)->get();
        return view('features.admin.image', compact('categories', 'keyCategory'));
    }
    public function getDataImage(Request $request)
    {
        $limit = $request->limit;
        $category = $request->category;
        $offset = $request->offset;
        $startDate = $request->startDate . " " . "00:00:00";
        $endDate = $request->endDate . " " . "23:59:59";
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
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })
            ->get();
        return view('features.admin.data.image', compact('images'));
    }
    public function showModal(Request $request)
    {
        $variable = str_replace(' ', '', $request->key);
        switch ($variable) {
            case 'image':
                return $this->modalImage($request);
                break;
            case 'pricelist':
                return $this->modalPricelist($request);
                break;
            case 'qa':
                return $this->modalQa($request);
                break;
            case 'review':
                return $this->modalReview($request);
                break;
            case 'banner':
                return $this->modalBanner($request);
                break;
            case 'bank':
                return $this->modalBank($request);
                break;
            case 'story':
                return $this->modalStory($request);
                break;
            case 'category-image':
                return $this->modalCategoryImage($request);
                break;
            default:
                break;
        }
    }
    public function editImage(Request $request)
    {
        $images = DB::table('images as img')->where('img.id', $request->id)
            ->where('img.statusenable', true)->whereNull('img.parent_id')
            ->where('img2.statusenable', true)->leftJoin('images as img2', 'img.id', "=", 'img2.parent_id')->get();
        return view('features.admin.data.img', compact('images'));
    }
    public function modalImage(Request $request)
    {
        $categories = Content::select('name')->where('category', 'category-image')->where('statusenable', true)->get();
        $types = json_decode($this->getFix('type-image'), true);
        if ($request->id) {
            $image = Image::where('id', $request->id)->first();
            return view('features.admin.modal.edit-image', compact('categories', 'types', 'image'));
        } else {
            return view('features.admin.modal.add-image', compact('categories', 'types'));
        }
    }
    public function saveImage(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category' => 'required',
        ];

        $messages = [
            'name.required' => 'Bagian ini harus diisi!',
            'category.required' => 'Bagian ini harus diisi!',
        ];
        if (!$request->id) {
            $rules['thumbnail'] = 'required';
            $messages['thumbnail.required'] = 'Bagian ini harus diisi!';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        DB::beginTransaction();
        try {
            if ($request->thumbnail) {
                $thumbnail = $request->thumbnail;
                $imageName = 'thumbnail-' . Str::slug($request->name, '-') . '.' . $thumbnail->extension();
                $thumbnail->move(public_path('assets/img'), $imageName);
            } else {
                $imageName = $request->image_old;
            }
            $thumbnailData = [
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'url' => $imageName,
                'type' => 'Image',
                'category' => $request->category
            ];
            $parent = Image::updateOrCreate(['id' => $request->id], $thumbnailData);

            $images = $request->images;
            if ($images) {
                foreach ($images as $key => $image) {
                    $img = Str::slug($request->name) . '-' . Str::random(2)  . '.' . $image->extension();
                    $image->move(public_path('assets/img'), $img);
                    $data = [
                        'url' => $img,
                        'type' => 'Image',
                        'parent_id' => $parent->id,
                        'category' => $request->category
                    ];
                    Image::create($data);
                }
            }
            $embed = $request->embed;
            if ($embed) {
                $data = [
                    'url' => $request->embed,
                    'type' => 'Embed Youtube',
                    'parent_id' => $parent->id,
                    'category' => $request->category
                ];
                Image::create($data);
            }
            $video = $request->video;
            if ($video) {
                $videoName = Str::slug($request->name) . '-' . Str::random(2) . '.' . $video->extension();
                $video->move(public_path('assets/img'), $videoName);
                $data = [
                    'url' => $video,
                    'type' => 'Embed Youtube',
                    'parent_id' => $parent->id,
                    'category' => $request->category
                ];
                Image::create($data);
            }
            DB::commit();
            $result = [
                'message' => 'Data Berhasil Ditambahkan !',
                'data' => [],
                'code' => 200,
                'errors' => []
            ];
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
    public function deleteImage(Request $request)
    {
        try {
            $image = Image::where('id', $request->id)->first();
            $this->deleteImg($image->url);
            $imgs  = Image::where('parent_id', $request->id)->get();
            foreach ($imgs as $key => $img) {
                $this->deleteImg($img->url);
                $img->delete();
            }
            $image->delete();
            $result = [
                'message' => 'Data Berhasil Dihapus !',
                'data' => $image,
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
    public function priceList(Request $request)
    {
        $types = json_decode($this->getFix('category-price'), true);
        return view('features.admin.price-list', compact('types'));
    }
    public function modalPricelist(Request $request)
    {
        $types = json_decode($this->getFix('category-price'), true);
        if ($request->id) {
            $data = Content::where('category', $this->getFix('pricelist'))->where('id', $request->id)->first();
            return view('features.admin.modal.edit-pricelist', compact('types', 'data'));
        } else {
            return view('features.admin.modal.add-pricelist', compact('types'));
        }
    }
    public function savePriceList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ], [
            'category.required' => 'Bagian ini harus diisi !',
            'title.required' => 'Bagian ini harus diisi !',
            'subtitle.required' => 'Bagian ini harus diisi !',
            'content.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data['content'] = json_encode($request->all(), true);
        $category = $this->getFix('pricelist');
        $data['name'] = $request->title;
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

    public function priceListData(Request $request)
    {
        $category = $request->category;
        $contents = Content::where('statusenable', true)
            ->when($category, function ($query) use ($category) {
                $s = '"category": "' . $category . '"';
                return $query->where('content', 'like', '%' . $category . '%');
            })
            ->where('category', 'pricelist')
            ->get();
        return view('features.admin.data.pl', compact('contents'));
    }
    public function delete(Request $request)
    {
        try {
            $image = Content::where('id', $request->id)->first();
            $image->statusenable = false;
            $image->save();
            $result = [
                'message' => 'Success !',
                'data' => $image,
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
    public function review(Request $request)
    {
        return view('features.admin.review');
    }
    public function qa(Request $request)
    {
        return view('features.admin.qa');
    }
    public function modalQa(Request $request)
    {
        if ($request->id) {
            $data = Content::where('category', $this->getFix('qa'))->where('id', $request->id)->first();
            return view('features.admin.modal.edit-qa', compact('data'));
        } else {
            return view('features.admin.modal.add-qa');
        }
    }
    public function saveQa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Bagian ini harus diisi !',
            'answer.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data['content'] = json_encode($request->all(), true);
        $category = $this->getFix('qa');
        $data['name'] = $category;
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
    public function qaData(Request $request)
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
        return view('features.admin.data.qa', compact('contents'));
    }
    public function modalReview(Request $request)
    {
        if ($request->id) {
            $data = Content::where('category', $this->getFix('review'))->where('id', $request->id)->first();
            return view('features.admin.modal.edit-review', compact('data'));
        } else {
            return view('features.admin.modal.add-review');
        }
    }
    public function saveReview(Request $request)
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
        if ($request->file('file')) {
            $save['file'] = $this->uploadImage($request->file, Str::slug($request->name, "-") . "-" . "review");
            $this->deleteImg($request->image_old);
        }
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
    public function reviewData(Request $request)
    {
        $search = $request->search;
        $category = $this->getFix('review');
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
        return view('features.admin.data.review', compact('contents'));
    }
    public function banner(Request $request)
    {
        $type = $this->getFix('type-banner');
        return view('features.admin.banner', compact('type'));
    }
    public function modalBanner(Request $request)
    {
        $types = json_decode($this->getFix('type-banner'), true);
        if ($request->id) {
            $data = Content::where('id', $request->id)->first();
            return view('features.admin.modal.edit-banner', compact('types', 'data'));
        } else {
            return view('features.admin.modal.add-banner', compact('types'));
        }
    }
    public function saveBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'category' => 'required',
            'file' => 'required',
        ], [
            'title.required' => 'Bagian ini harus diisi !',
            'subtitle.required' => 'Bagian ini harus diisi !',
            'category.required' => 'Bagian ini harus diisi !',
            'file.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $save = $request->only('title', 'subtitle', 'category', 'order');
        if ($request->file('file')) {
            $img = $this->uploadImage($request->file, Str::slug($request->category, "-") . "-" . Str::random(12) . "-" . "banner");
            $this->deleteImg($request->image_old);
            $data['image'] = $img;
            $save['file'] = $img;
        }
        $data['content'] = json_encode($save, true);
        $data['name'] = $request->category;
        $data['category'] = $request->category;
        try {
            if ($request->category == "banner") {
                $banner = [
                    'id' => $request->id,
                ];
            } else {
                $banner = [
                    'id' => $request->id,
                    'category' => $request->category
                ];
            }
            $res = Content::updateOrCreate($banner, $data);
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
    public function bannerData(Request $request)
    {
        $search = $request->search;
        $category = $this->getFix('banner');
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
            ->when($category, function ($query) use ($category) {
                return $query->where('category', 'like', '%' . $category . '%');
            })
            ->get();
        return view('features.admin.data.banner', compact('contents'));
    }
    public function products(Request $request)
    {
        $products = Product::where('statusenable', true)->get();
        return view('features.admin.products', compact('products'));
    }
    public function productAdd(Request $request)
    {
        return view('features.admin.product-add');
    }
    public function plRequest(Request $request)
    {
        return view('features.admin.pl-request');
    }
    public function getPLRequest(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $startDate = $request->startDate . " " . "00:00:00";
        $endDate = $request->endDate . " " . "23:59:59";
        $category = 'request-pl';
        $contents = Content::where('category', $category)
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        return view('features.admin.data.pl-request', compact('contents'));
    }
    public function bank(Request $request)
    {
        return view('features.admin.bank');
    }
    public function modalBank(Request $request)
    {
        $banks = json_decode($this->getFix('bank-category'), true);
        if ($request->id) {
            $data = Content::where('category', $this->getFix('bank'))->where('id', $request->id)->first();
            return view('features.admin.modal.edit-bank', compact('banks', 'data'));
        } else {
            return view('features.admin.modal.add-bank', compact('banks'));
        }
    }
    public function saveBank(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'norekening' => 'required',
        ], [
            'name.required' => 'Bagian ini harus diisi !',
            'norekening.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data['content'] = json_encode($request->all(), true);
        $category = $this->getFix('bank');
        $data['name'] = $category;
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

    public function getBank(Request $request)
    {
        $category = $this->getFix('bank');
        $contents = Content::where('category', $category)
            ->where('statusenable', true)
            ->get();
        return view('features.admin.data.bank', compact('contents'));
    }
    public function saveProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Bagian ini harus diisi !',
            'price.required' => 'Bagian ini harus diisi !',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        DB::beginTransaction();
        try {
            $data = $request->only('name', 'price', 'discount', 'stock', 'description', 'tag');
            $data['slug'] = Str::slug($request->name, '-');
            if ($request->file('image')) {
                $data['image'] = $this->uploadImage($request->image, Str::slug($request->name, "-") . "-" . "thubnail");
                $this->deleteImg($request->image_old);
            }
            $product = Product::updateOrCreate(['id' => $request->id], $data);
            $images = $request->images;
            if ($images) {
                foreach ($images as $key => $image) {
                    $img = $this->uploadImage($image, Str::slug($request->name, "-") . "-" . $key);
                    Image::create([
                        'product_id' => $product->id,
                        'url' => $img,
                        'type' => 'Image'
                    ]);
                }
            }
            DB::commit();
            $result = [
                'message' => 'Success !',
                'data' => $product,
                'code' => 200,
                'errors' => []
            ];
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
    public function getProductGallery(Request $request)
    {
        $productID = $request->id;
        $images = Image::where('statusenable', true)
            ->when($productID, function ($query) use ($productID) {
                return $query->where('product_id', $productID);
            })->where('category', null)->get();
        return view('features.admin.data.pr', compact('images'));
    }
    public function deleteProduct(Request $request)
    {
        Product::where('id', $request->id)->update(['statusenable' => false]);
        return response()->json(['message' => 'successfully']);
    }
    public function productEdit(Request $request, $id)
    {
        $productID = $request->id;
        $product = Product::where('statusenable', true)
            ->where('id', $id)->first();
        return view('features.admin.product-edit', compact('product'));
    }
    public function data(Request $request)
    {
        $key  = $request->key;
        switch ($key) {
            case 'products':
                return $this->dataProducts($request);
                break;
            default:
                return response()->json(['message' => 'resource non found'], 404);
                break;
        }
    }
    public function dataProducts(Request $request)
    {
        $search = $request->search;
        $products = Product::where('statusenable', true)
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();
        return view('features.admin.data.product', compact('products'));
    }
    public function order(Request $request)
    {
        return view('features.admin.order');
    }
    public function getOrder(Request $request)
    {
        $startDate = $request->startDate . " 00:00:00";
        $endDate = $request->endDate . " 23:59:59";

        $orders = Order::with('product')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('features.admin.data.order', compact('orders'));
    }
    public function story(Request $request)
    {
        return view('features.admin.story');
    }
    public function modalStory(Request $request)
    {
        if ($request->id) {
            return view('features.admin.modal.edit-story');
        } else {
            return view('features.admin.modal.add-story');
        }
    }
    public function saveStory(Request $request)
    {
        $rules = [];

        if ($request->type == 'image') {
            $rules['file'] = 'required|image|max:5120';
        } elseif ($request->type == 'video') {
            $rules['file'] = 'required|file|mimes:mp4,mov,avi|max:15360';
        }
        $validator = Validator::make($request->all(), $rules, [
            'file.required' => 'File harus diunggah!',
            'file.image' => 'File harus berupa gambar (format: jpg, jpeg, png, gif, svg)!',
            'file.file' => 'File harus berupa video (format: mp4, mov, avi)!',
            'file.mimes' => 'Format file tidak didukung (hanya jpg, jpeg, png, gif, svg untuk gambar dan mp4, mov, avi untuk video)!',
            'file.max' => 'Ukuran file terlalu besar. Maksimum 5MB untuk gambar dan 15MB untuk video!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        if ($request->file('file')) {
            $data['url'] = $this->uploadImage($request->file, Str::slug($request->type, "-") . "-" . "story" . "-" . Str::random(7));
        }
        $data['category'] = 'story';
        $data['type'] = $request->type;
        $data['slug'] = 'story' . Str::random(10);
        $result = Image::updateOrCreate(['id' => $request->id], $data);
        return $this->respond($result, 200);
    }
    public function getStory(Request $request)
    {
        $limit = $request->limit;
        $category = 'story';
        $offset = $request->offset;
        $startDate = $request->startDate . " " . "00:00:00";
        $endDate = $request->endDate . " " . "23:59:59";
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
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('features.admin.data.story', compact('images'));
    }
    public function category(Request $request)
    {

        return view('features.admin.category');
    }
    public function getCategory(Request $request)
    {
        $images = Content::where('category', 'category-image')
            ->whereNotNull('image')
            ->where('statusenable', true)->get();
        return view('features.admin.data.category', compact('images'));
    }
    public function saveCategoryBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:5120'
        ], [
            'file.required' => 'File harus diunggah!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        if ($request->file('file')) {
            $data['image'] = $this->uploadImage($request->file, Str::slug(Str::random(10), "-") . "-" . "story" . "-" . Str::random(7));
            $this->deleteImg($request->image_old);
        }
        $result = Content::updateOrCreate(['id' => $request->id], $data);
        $result = [
            'message' => 'Data Berhasil Ditambahkan !',
            'data' => [],
            'code' => 200,
            'errors' => []
        ];
        return $this->respond($result, 200);
    }
    public function modalCategoryImage(Request $request)
    {
        $content = Content::where('statusenable', true)->where('id', $request->id)->first();
        return view('features.admin.modal.edit-image-category', compact('content'));
    }
}
