@extends('contacts.layout')
  
@section('content')

<div class="card shadow-lg mt-5">
  <h2 class="card-header">Show Contact Info</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('contacts.index') }}"><i class="fa fa-arrow-left"></i> Back to lists</a>
    </div>
  
    <div class="row">

    <div class="col-sm">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $contact->name }}
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Address:</strong> <br/>
                {{ $contact->address }}
            </div>
        </div>
    </div>
    <div class="col-sm">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Contact No:</strong> <br/>
                {{ $contact->contact_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Description:</strong> <br/>
                {{ $contact->description }}
            </div>
        </div>
    </div>
    <div class="col-sm">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Date Added:</strong> <br/>
                {{ $contact->created_at }}
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection