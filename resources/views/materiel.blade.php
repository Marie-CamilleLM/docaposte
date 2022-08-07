@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des clients</h3>
    <div>
        @if(session()->has("successDelete"))
            <div class="alert alert-success">
                <p>{{ session()->get('successDelete') }}</p>
            </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Matériel(s)</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <th scope="row">{{ $client->id }}</th>
                    <th scope="row">{{ $client->nom }}</th>
                    <th scope="row">{{ $client->prenom }}</th>
                    <th scope="row">
                        @foreach($client->materiels as $materiel)
                            <ul>
                                <li>{{ $materiel->nom }} - {{ $materiel->prix }} €</li>
                            </ul>
                        @endforeach
                    </th>
                    <td>
                        <a href="#" class="btn btn-outline-primary">Editer</a>
                        <a href="#" class="btn btn-outline-danger" onclick="if(confirm('Voulez vous supprimer ce client ?')){document.getElementById('form-{{ $client->id }}').submit()}">Supprimer</a>
                        <form id="form-{{ $client->id }}" action="{{ route('client.supprimer', ['client'=>$client->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="_method" value="delete"> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn-toolbar" style="display:inline-block; left: 8em;">
            <a href="{{ route('client.create') }}" class="btn btn-outline-primary">Ajouter un client</a>
            <a href="{{ route('materiel.create') }}" class="btn btn-outline-primary">Ajouter un matériau</a>
        </div>
    </div>
  </div>
@endsection
