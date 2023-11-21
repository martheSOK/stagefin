<x-app-layout>
<form action="{{route ('stocks.store') }}" method="post">
    @csrf
   
    <div class="contener">
    <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrement des quantite d'emballages</h1></div>
    <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="id_depot">Depot</label>
            <select name="id_depot">
                <option value="">selectionné</option>
                    @foreach ($depots as $depot)
                    <option value="{{ $depot->id_depot }}">{{ $depot->designation }}</option>
                @endforeach    
            </select>
        </div>
        <div class="enf2">
            <label for="id_type">TypeEmballage</label>
            <select name="id_type">
                <option value="">selectionné</option>
                    @foreach ($typemballages as $typemballage)
                    <option value="{{ $typemballage->id_type }}">{{ $typemballage->libelle }}</option>
                @endforeach
                    
            </select>
        </div>
        <div class="enf3">
            <label for="id_fournisseur">Fournisseur</label>
            <select name="id_fournisseur[]" multiple>
                <option value="">selectionné</option>
                    @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id_fournisseur }}">{{ $fournisseur->nom_fournisseur }}</option>
                @endforeach
                    
            </select>
        </div>
        <div class="enf4">
            <label for="quantite_stock">Quantite_stock</label>
            <input type="text" name="quantite_stock"/><br>
        </div>
        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>
