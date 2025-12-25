<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //atentie tabelul in db este all_entries si folosesc "eager loading" ca sa evit problema N+1
        $allEntries = Entry::with('user')->get(); // sau _>pagination() in loc de get daca vreau sa 
        $user = Auth::user();
        return view('forms.index', compact('allEntries', 'user'));
    }

    /**
     * Show the form for creating a new resource. Adica arata formularul pentru a adauga date
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'vendor_name' => ['required', 'string', 'max:255', Rule::unique('all_entries', 'vendor_name')],
            'vendor_desc' => ['nullable', 'string'],
            'v_email' => ['required', 'email', 'unique:all_entries,v_email'],
            'v_website' => ['nullable', 'string'],
            'employee_num' => ['required', 'integer'],
            'organisation_type' => ['required', 'string', 'in:corporation,proprietorship,partnership'],
            'business_type' => ['required', 'array', 'min:1'],
            'business_type.*' => ['string', Rule::in(['manufacturer', 'inf_services', 'retail', 'trading', 'consultancy', 'web_dev', 'other'])],
            'v_address' => ['required', 'string'],
            'v_country' => ['required', 'string'],
            'v_city' => ['required', 'string'],
        ]);
        //Go to user which create
        $validatedData['user_id'] = Auth::id();
        // $validatedData['local_id'] = 'ABCD11';
        // dd($request->all(), $validatedData);
        Entry::create($validatedData);
        return redirect()->route('entries.index')->with('success', 'Entry listing created successfully');
    }

    /**
     * Display the specified resource.(params from URI)
     */
    public function show(Entry $entry)
    {
        return view('forms.show')->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        return view('forms.edit')->with('entry', $entry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        //
        $validatedData = $request->validate([
            'vendor_name' => ['required', 'string', 'max:255', Rule::unique('all_entries', 'vendor_name')->ignore($entry)],
            'vendor_desc' => ['nullable', 'string'],
            'v_email' => ['required', 'email', Rule::unique('all_entries', 'v_email')->ignore($entry)],
            'v_website' => ['nullable', 'string'],
            'employee_num' => ['required', 'integer'],
            'organisation_type' => ['required', 'string', 'in:corporation,proprietorship,partnership'],
            'business_type' => ['required', 'array', 'min:1'],
            'business_type.*' => ['string', Rule::in(['manufacturer', 'inf_services', 'retail', 'trading', 'consultancy', 'web_dev', 'other'])],
            'v_address' => ['required', 'string'],
            'v_country' => ['required', 'string'],
            'v_city' => ['required', 'string'],
        ]);
        //To add user to the table using auth()
        $validatedData['updated_by'] = Auth::id();
        // dd($validatedData);
        $entry->update($validatedData);
        return redirect()->route('entries.index')->with('success', 'Entry Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        //Delete and redirect
        $entry->delete();
        return redirect()->route('entries.index')->with('success', 'Entry Id Deleted Successfully!');
    }
}
