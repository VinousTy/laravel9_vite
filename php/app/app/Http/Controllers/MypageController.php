<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use App\Services\MypageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
  public function index()
  {
    $user = User::findOrFail(Auth::id());

    $events = $user->events;

    $fromTodayEvents = MypageService::reservedEvent($events, 'fromToday');
    $pastEvents = MypageService::reservedEvent($events, 'past');

    return view('mypage.index', compact('fromTodayEvents', 'pastEvents'));
  }

  public function show($id)
  {
    $event = Event::findOrFail($id);
    $reservation = Reservation::where('user_id', Auth::id())
      ->where('event_id', $id)
      ->latest()
      ->first();

    return view('mypage.show', compact('event', 'reservation'));
  }

  public function cancel($id)
  {
    $reservation = Reservation::where('user_id', Auth::id())
      ->where('event_id', $id)
      ->latest()
      ->first();

    $reservation->canceled_date = Carbon::now()->format('Y-m-d 00:00:00');
    $reservation->save();

    session()->flash('status', 'キャンセルしたお');

    return view('dashboard');
  }
}
