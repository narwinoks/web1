<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;

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
            default:
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
        $bookings = Content::where('category', $this->getFix('booking-category'))
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->when($offset, function ($query) use ($offset) {
                return $query->offset($offset);
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->where('category', $category)
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
}
