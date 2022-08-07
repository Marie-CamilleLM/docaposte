@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un matériel</h3>
    <div class="mt-4">
        @if(session()->has("Success"))
        <div class="alert alert-success">
            <p>{{ session()->get('Success') }}</p>
        </div>
        @endif
        @if ($errors->any())
        <div class='alert alert-danger'>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form style="width:65%;" method="post" action="{{ route('materiel.ajouter') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name='nom'>
            </div>
            <div class="mb-3">
                <label class="form-label">Prix</label>
                <input type="text" class="form-control" name='prix'>
            </div>
            <div class="mb-3">
                <label class="form-label">Client</label>
                <div class="select is_multiple">
                    <select name="clientId[]" class="form-control">
                        @foreach($materiels as $materiel)
                            @foreach($materiel->clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }} - {{ $client->prenom }}</option>
                            @endforeach
                        @endforeach
                      </select>
                </div>
                </div>
  
            </div>
            <button type="submit" class="btn btn-outline-primary">Ajouter</button>
            <a href="{{ route('client') }}">
                <input type="button" value="Annuler" class="btn btn-outline-danger">
            </a>
        </form>
    </div>
  </div>
@endsection
