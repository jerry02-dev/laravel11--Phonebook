<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $search = $request->input('search');

        if($search != null){
            $contacts = Contact::where('name', 'like', "%$search%")->paginate(5);
        }else{
            $contacts =  Contact::latest()->paginate(5);
        }

        if(is_null($contacts)){
            return redirect()->back()->with('message',"No Data Found");
        }else{
            return view('contacts.index', compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request) : RedirectResponse
    {
        Contact::create($request->all());
           
        return redirect()->route('contacts.index')
                         ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact) : View
    {
        return view('contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact) :  View
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest  $request, Contact $contact) : RedirectResponse
    { 
        $contact->update($request->validated());
        $contact->touch();     
        return redirect()->route('contacts.index')
                        ->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact) : RedirectResponse
    {
        $contact->delete();
           
        return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully');
    }
}
