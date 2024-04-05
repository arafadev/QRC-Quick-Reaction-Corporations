<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\View\Components\Alert;

class NotificationController extends Controller
{
    public function index()
    {
        DB::table('notifications')->update(['read_at' => now()]);
        return view('admins.notifications.index', ['notifications' => DB::table('notifications')->get()]);

    }

    public function delete(Request $request)
    {
        if (!$request->has('ids') || empty($request->ids)) {
            return response()->json(['success' => false, 'message' => 'No notification IDs provided'], 404);
        }
        try {
            DB::table('notifications')->whereIn('id', $request->ids)->delete();
            return response()->json(['success' => true, 'message' => 'Notifications deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete notifications'], 500);
        }
    }
}
