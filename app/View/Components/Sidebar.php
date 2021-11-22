<?php

namespace App\View\Components;

use App\Models\Pendadaran\Pendadaran;
use App\Models\Proposal\Proposal;
use App\Models\Seminar\Seminar;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $proposalProses = Proposal::where('status', '=', 'dikirim')->count();
        $semhasProses = Seminar::where('status', '=', 'dikirim')->count();
        $pendadaranProses = Pendadaran::where('status', '=', 'dikirim')->count();
        return view('components.app._sidebar', compact('proposalProses', 'semhasProses', 'pendadaranProses'));
    }
}
