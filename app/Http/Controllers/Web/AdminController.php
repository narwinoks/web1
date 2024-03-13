<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    use Valet;
    public function home(Request $request)
    {
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subDays(6);
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
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $bookingCounts[$date->toDateString()] = 0;
        }
        foreach ($booking as $b) {
            $date = $b->created_at->toDateString();
            $bookingCounts[$date]++;
        }
        $bookingsResult = [];
        foreach ($bookingCounts as $count) {
            $bookingsResult[] = $count;
        }
        return view('features.admin.dashboard', compact('bookingsResult', 'booking', 'accept', 'pending', 'reject'));
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
}
