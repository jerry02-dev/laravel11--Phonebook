@extends('contacts.layout')
    
@section('content')
  
<div class="card shadow-lg mt-5">
  <h2 class="card-header">Add New Contact</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('contacts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
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
                type="number" 
                name="contact_no" 
                class="form-control @error('contact_no') is-invalid @enderror" 
                id="inputName" 
                placeholder="Contact No.">
            @error('contact_no')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Address:</strong></label>
            <input 
                type="text" 
                name="address" 
                class="form-control @error('address') is-invalid @enderror" 
                id="inputName" 
                placeholder="Address">
        </div>

        
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                style="height:150px" 
                name="description" 
                id="inputDetail" 
                placeholder="Description"></textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
<br/>
@endsection