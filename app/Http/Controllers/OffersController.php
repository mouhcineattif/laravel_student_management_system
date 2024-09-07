<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
use App\Models\Offers;
use App\Models\Student;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class OffersController extends Controller
{
    private const CACHE_KEY = 'offers';
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Cache::remember(self::CACHE_KEY,14660,function(){
            return Offers::latest()->paginate(10);
        });
        return view('offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffersRequest $request)
    {
        $fields = $request->validated();
        $this->uploadImage($request,$fields);
        $fields['student_id'] = Auth::id();
        Offers::create($fields);
        Cache::forget(self::CACHE_KEY);
        return to_route('offers.index')->with('success','Offer created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(Offers $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offers $offer,Request $request)
    {
        // dd($offer);
        // Gate::authorize('update_offer',$offer);
        // if($request->user()->can('update')){
        //     abort(403,'You are not authorazied');
        // }
        $this->authorize('update',$offer);
        // Gate::authorize('update',$offer);
        return view('offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(OffersRequest $request, Offers $offer)
    {
        $this->authorize('update',$offer);
        $fields = $request->validated();
        $this->uploadImage($request,$fields);
        $isUpdated = $offer->fill($fields)->save();
        Cache::forget(self::CACHE_KEY);
        return to_route('offers.index')->with('success','Offer Updated With Success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offers $offer)
    {
        $this->authorize('delete',$offer);
        $offer->delete();
        Cache::forget(self::CACHE_KEY);
        return to_route('offers.index')->with('success','Offer Deleted With Success !');
    }
    private function uploadImage(OffersRequest $request,array &$fields)
    {
        unset($fields['media']);
        if($request->hasFile('media')){
            $fields['media'] =  $request->file('media')->store('offers','public');
        }
    }
}
