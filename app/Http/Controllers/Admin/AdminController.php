<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function showSettings()
    {
        $settings = Setting::first() ?? new Setting();

        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'store_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch the first settings record or create a new one if it doesn't exist
        $settings = Setting::firstOrNew([]);

        // Handle store logo upload if a new logo is uploaded
        if ($request->hasFile('store_logo')) {
            // Delete the old logo if it exists
            if ($settings->store_logo && file_exists(storage_path('app/public/' . $settings->store_logo))) {
                unlink(storage_path('app/public/' . $settings->store_logo));
            }

            $logoPath = $request->file('store_logo')->store('store_logos', 'public');
            $settings->store_logo = $logoPath;
        }

        $settings->store_name = $request->store_name;
        $settings->admin_email = $request->admin_email;
        $settings->contact_number = $request->contact_number;

        $settings->save();

        return redirect()->route('show.settings')->with('success', 'Settings updated successfully.');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function showUsers()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.user.manage', compact('users'));
    }


    public function order_history()
    {
        $orders = Order::all();  
        return view('admin.order.history', compact('orders'));
    }
}
