@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un client</h3>
    <div class="mt-4">
        @if(session()->has("Success"))
        <div class="alert alert-success">
            <p>{{ session()->get('Success') }}</p>
        </div>
        @endif
        <form style="width:65%;" method="post" action="{{ route('client.ajouter') }}" onsubmit="verification()">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name='nom'>
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" name='prenom'>
            </div>
            <div class="mb-3">
                <label class="form-label">Matériel</label>
                <div class="select is_multiple">
                    <select name="materielId[]" multiple class="form-control">
                        @foreach($clients as $client)
                            @foreach($client->materiels as $materiel)
                                <option value="{{ $materiel->id }}">{{ $materiel->nom }}</option>
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

