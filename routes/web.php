<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return "Working";
});

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');



Route::get('/formtest', function () {
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});


Route::post('/formtest', function (Request $request) {

  
    $request->validate([
        'email' => 'required|email'
    ]);

    $emails = session()->get('emails', []);

    
    if (count($emails) >= 5) {
        return back()->with('error', 'Maximum of 5 emails allowed.');
    }

  
    if (in_array($request->email, $emails)) {
        return back()->with('error', 'Email already exists.');
    }

   
    $emails[] = $request->email;
    session()->put('emails', $emails);

    return back()->with('success', 'Email added successfully!');
});



Route::post('/delete-email', function (Request $request) {

    $emails = session()->get('emails', []);

    if (isset($emails[$request->index])) {
        unset($emails[$request->index]);
        $emails = array_values($emails);
        session()->put('emails', $emails);
    }

    return back()->with('success', 'Email deleted.');
});