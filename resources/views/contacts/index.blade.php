@extends('contacts.layout')
   
@section('content')
  
<div class="card shadow-lg mt-5">
  <h2 class="card-header">Phonebook <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"><path d="M12.422 13.424h-9.33a1.473 1.473 0 1 1 0-2.947h8.348a.982.982 0 0 0 .982-.982V1.638a.982.982 0 0 0-.982-.982H3.092A1.473 1.473 0 0 0 1.62 2.09v9.821m9.82-1.434v2.947"/><path d="M7.524 8.236a1.702 1.702 0 0 0 1.957-.461l.246-.247a.533.533 0 0 0 .096-.732l-.796-.795a.533.533 0 0 0-.732.095a.533.533 0 0 1-.731.095L6.29 4.92a.533.533 0 0 1 .095-.732a.533.533 0 0 0 .096-.732l-.796-.796a.533.533 0 0 0-.732.096L4.708 3a1.71 1.71 0 0 0-.462 1.957a9.546 9.546 0 0 0 3.278 3.278Z"/></g></svg></h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('contacts.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>
  
        <table class="table table-sm table-bordered mt-4 caption-top">
       
        <form action="{{ route('contacts.index') }}" method="GET">
        <div class="input-group">
  <div class="form-outline">
    <input type="search" name="search" id="form1" placeholder="search" class="form-control" />
    
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>
</form>
        <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Date Updated</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $contact->name }}</td>
                    @if($contact->address =='')         
                        <td>---</td>         
                    @else
                        <td>{{ $contact->address }}</td>        
                    @endif
                    <td>{{ $contact->contact_no }}</td>
                    @if($contact->description =='')         
                        <td>---</td>         
                    @else
                        <td>{{ $contact->description }}</td>        
                    @endif
                    <td>{{ $contact->created_at }}</td>
                    <td>{{ $contact->updated_at }}</td>
                    <td>
                        <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
             
                            <a class="btn btn-default btn-sm" href="{{ route('contacts.show',$contact->id) }}"><span class="text-success"><i class="fa-solid fa-eye"></i> Show</span></a>
              
                            <a class="btn btn-default btn-sm" href="{{ route('contacts.edit',$contact->id) }}"><span class="text-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</span></a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-default btn-sm"><span class="text-danger"><i class="fa-solid fa-trash"></i> Delete</span></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                
                    <td colspan="8" class="text-danger p-3">No data entries</td>
                </tr>
            @endforelse
            </tbody>
         
        </table>

        {{ $contacts->links() }}
        
        <footer class="py-16 text-center text-xxs text-danger dark:text-white/70">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
  
  </div>
</div>  
@endsection