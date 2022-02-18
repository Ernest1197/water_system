<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        $user = auth()->user();
        $settings = Settings::where('user_id', $user->id)->first();
        return view('users.settings', compact(['user', 'settings']));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'meter_number' => ['required', 'min:9', 'max:9'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'meter_number' => $request->meter_number,
            'first_meter_reading' => $request->first_meter_reading,
        ]);

        $data = [
            'phone' => $request->phone,
            'province' => $request->province,
            'district' => $request->district,
            'sector' => $request->sector,
            'user_id' => $user->id,
        ];

        $settings = Settings::where('user_id', $user->id)->first();
        if ($settings) $settings->update($data);
        else Settings::create($data);

        return redirect()->route('settings.show')->with('success', 'Settings update successfully...');
    }
}
