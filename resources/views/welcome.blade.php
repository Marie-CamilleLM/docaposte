@extends("layouts.master")

@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste</h3>
    <div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Matériel</th>
                    <th scope="col">Total</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <th scope="row"> {{ $client->nomClient }} - {{ $client->prenom }}</th>
                    <th scope="row">{{ $client->prix }}</th>
                 </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection
