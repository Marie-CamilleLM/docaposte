@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Classement</h3>
    <div>
        @if(session()->has("successDelete"))
            <div class="alert alert-success">
                <p>{{ session()->get('successDelete') }}</p>
            </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Matériel(s)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <th scope="row">{{ $client->nom }}</th>
                    <th scope="row">{{ $client->prenom }}</th>
                    <th scope="row">{{ $client->prix }}</th>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection
