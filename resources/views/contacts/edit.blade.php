@extends('contacts.layout')
    
@section('content')
  
<div class="card shadow-lg mt-5">
  <h2 class="card-header">Edit Contact Info</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('contacts.index') }}"><i class="fa fa-arrow-left"></i> Back to Lists</a>
    </div>
  
    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $contact->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Contact No:</strong></label>
            <input 
                type="text" 
                name="contact_no" 
                value="{{ $contact->contact_no }}"
                class="form-control @error('contact_no') is-invalid @enderror" 
                id="inputName" 
                placeholder="Contact No">
            @error('contact_no')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Address :</strong></label>
            <input 
                type="text" 
                name="address" 
                value="{{ $contact->address }}"
                class="form-control @error('address') is-invalid @enderror" 
                id="inputName" 
                placeholder="Address">
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                style="height:150px" 
                value="{{ $contact->description }}"
                name="description" 
                id="inputDetail" 
                placeholder="Description">{{ $contact->description }}</textarea>
                @error('description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
       
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@endsection