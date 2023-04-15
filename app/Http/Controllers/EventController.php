<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Equipment;
use App\Models\Event;
use App\Models\EventsEquipment;
use App\Models\Rent;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(User $user){
        if (! Gate::allows('is-admin')) {
            $events = Event::where('userID', '=', Auth::id())->get();
        }
        else {
            $events = Event::all();
        }
        return view('user.event', ["events"=>$events]);


    }

    public function show(Event $event){

       $equipment = EventsEquipment::where('eventID', '=', $event->id)->get();
        return view('user.eventinfo', ["event"=>$event, "equipments"=>$equipment]);
    }

    public function store(StoreEventRequest $request){


        $validatedData = $request->validate([
            'name' => 'bail|required|max:50',
            'lastName' => 'bail|required|max:50',
            'email'=>'bail|required|max:255',
            'startDate'=> 'bail|after:today',
            'endDate' => 'bail|after_or_equal:startDate',
            'eventName' => 'bail|required|max:200',
            'description'=>'bail|max:200'
        ]);

        $cartItems =\Cart::getContent()->toArray();
        $event = new Event;
        $event->userID = Auth::user()->id;
        $event->startDate = $request->startDate;
        $event->endDate = $request->endDate;
        $event->name = $request->eventName;
        $days = strtotime($request->startDate) - strtotime($request->endDate);
        $days = abs(round($days/86400));
        $event->hourCount = $days;
        $event->price = \Cart::getTotal() * $days;
        $event->paidPrice = \Cart::getTotal();
        $event->description = $request->description;
        $event->save();
        $eventID = $event->id;


        foreach (\Cart::getContent() as $row){
            $rent = new Rent;
            $rent->eventID = $eventID;
            $rent->equipmentID = $row->id;
            $maxQuantity = DB::table('equipments')->select('quantity')->where('id', $row->id)->value('quantity');
            if($row->quantity > $maxQuantity)
                $rent->quantity = $maxQuantity;
            else
                $rent->quantity = $row->quantity;
            $rent->save();
            Equipment::where('id', $row->id)->decrement('quantity', $row->quantity);
        }

        \Cart::clear();
        return view('user.event', ["events" => Event::where('userID', '=', Auth::id())->get()]);
    }

    public function edit($eventID){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $event = Event::where('id', '=', $eventID);
        $event->update([
            'status' => 2
        ]);
        $equipment = EventsEquipment::where('eventID', '=', $eventID)->get();
        foreach ($equipment as $eq) {
            Equipment::where('id', $eq->equipmentID)->increment('quantity', $eq->quantity);
//        $equpiments = EventsEquipment::whereHas('quantity', function ($query) use ($eventID){
//            $query->where('eventID', $eventID);
//        })-get();
        }
        return back();
    }
}
