<x-app-layout>
    <form action="{{ route('consignations.update', ['consignation' => $consignation->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mt-20">
            <div class="bg-gray-700 w-100 h-10 text-white">
                <h1 class="text-center font-bold p-2">Édition d'une consignation</h1>
            </div>
            <hr class="h-1 mt-2 mb-3">

            <div>
                <label for="id_fournisseur">Fournisseur :</label>
                <select name="id_fournisseur">
                    <option value="">Sélectionnez</option>
                    @foreach($listefournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id_fournisseur }}" {{ $consignation->id_fournisseur == $fournisseur->id_fournisseur ? 'selected' : '' }}>
                            {{ $fournisseur->nom_fournisseur }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_type">Type d'Emballage :</label>
                <select name="id_type">
                    <option value="">Sélectionnez</option>
                    @foreach($listemballages as $listemballage)
                        <option value="{{ $listemballage->id_type }}" {{ $consignation->id_type == $listemballage->id_type ? 'selected' : '' }}>
                            {{ $listemballage->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="quantite_Consigne">Quantité Consignée :</label>
                <input type="text" name="quantite_Consigne" value="{{ $consignation->quantite_Consigne }}">
            </div>

            <button id="b1" type="submit">Enregistrer les modifications</button>
        </div>
    </form>
</x-app-layout>
