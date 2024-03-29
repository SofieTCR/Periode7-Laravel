@extends('regisseurs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('regisseurs.create') }}"> Create New Regisseur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($regisseurs as $regisseur)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $regisseur->Voornaam }}</td>
            <td>{{ $regisseur->Achternaam }}</td>
            <td>
                <form action="{{ route('regisseurs.destroy',$regisseur->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('regisseurs.show',$regisseur->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('regisseurs.edit',$regisseur->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $regisseurs->links() !!}
      
@endsection
