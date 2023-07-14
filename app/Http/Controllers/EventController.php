<?php

namespace App\Http\Controllers;

use App\Models\{Event, Type};
use Illuminate\Http\Request;
use App\Http\Requests\EventFormRequest;
use Illuminate\Database\Eloquent\Collection;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('type')->get();
        return view('dashboard', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create', ['types' => $this->getTypes()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventFormRequest $request)
    {
        $imagePath = $this->uploadImage($request);

        // Create a new event instance and save the image path
        $event = new Event();
        $this->createOrUpdate($event, $request, $imagePath);

        return redirect()->to('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $event->load('type');
        return view('event.edit', ['event' => $event, 'types' => $this->getTypes()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $imagePath = $this->uploadImage($request);

        // update event instance and save the image path
        $this->createOrUpdate($event, $request, $imagePath ?? $event->image);

        return redirect()->to('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->to('/dashboard')->with('success', 'Successfully event deleted!');
    }

    /**
     * get all types
     *
     * @return Collection
     */
    private function getTypes(): Collection
    {
        return Type::all();
    }

    /**
     * Uploads an image file from the request and returns the image path.
     *
     * @param Request $request
     * @return string|null
     */
    private function uploadImage(Request $request): ?string
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = '/storage/'.$image->store('images', 'public');
        }

        return $imagePath;
    }

    /**
     * Create or update an event with the provided data.
     *
     * @param  Event  $event
     * @param  Request  $request
     * @param  string  $imagePath
     * @return Event
     */
    private function createOrUpdate(Event $event, Request $request, string $imagePath): Event
    {
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->type_id = $request->input('type_id');
        $event->image = $imagePath;
        $event->save();

        return $event;
    }
}
