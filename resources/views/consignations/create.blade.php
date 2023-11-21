<x-app-layout>
    <form action="{{ route ('consignations.store') }}" method="post">
        @csrf
        <div class="mt-20">
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrement d'une consignation<h/h1></div>
            <hr class="h-1 mt-2 mb-3">
            <div>
                <label for="id_fournisseur"> Fournisseur :</label>
                <select name="id_fournisseur" >
                    <option value="">selectionné</option>
                    @foreach($listefournisseurs as $fournisseur)
                        <option value="$fournisseur->id_fournisseur">{{ $fournisseur->nom_fournisseur}}</option>
                    @endforeach
                </select><br>
            </div>
                
            <div>
                <label for="id_type"> Type d'Emballage :</label>
                <select name="id_type" >
                    <option value="">selectionné</option>
                    @foreach($listemballages as $listemballage)
                        <option value="$listemballage->id_type">{{ $listemballage->libelle}}</option>
                    @endforeach
                </select><br>
            </div>
            <div>
                <label for="quantite_Consigne">Quantité Consigné :</label>
                <input type="text" name="quantite_Consigne">
                <br><br>
            </div>
                <button id="b1" type="submit">Enregistrer</button>
        </div>
    </form>
</x-app-layout>

