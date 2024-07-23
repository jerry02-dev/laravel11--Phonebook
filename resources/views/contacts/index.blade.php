@extends('contacts.layout')
   
@section('content')
  
<div class="card shadow-lg mt-5">
  <h2 class="card-header">{{ $user->name }}'s Phonebook</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession


        <div class="col-md-3">
      <span class="">Current User : {{ $user->email}}</span>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <small> Logout Account</small>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                
            </div>
  
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