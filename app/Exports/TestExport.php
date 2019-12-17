<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TestExport implements FromView
{
    public function view(): View
    {
        return view('users', [
            'users' => User::all()
        ]);
    }
}
