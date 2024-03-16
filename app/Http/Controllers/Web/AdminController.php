<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use App\Models\User;
use App\Responses\ServerResponse;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    use Valet;
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
            $image->statusenable = false;
            $image->save();
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
}
