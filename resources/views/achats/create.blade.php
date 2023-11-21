
<x-app-layout>
<form action="{{route ('achats.store') }}" method="post">
    @csrf
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrement un achat<h/h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="id_stock">Depot</label>
            <select name="id_stock">
                <option value="">selectionné</option>
                    @foreach ($listestocks as $listestock)
                        <option value="{{ $listestock->id_stock }}">{{ $listestock->depots->designation." ".$listestock->type_emballages->libelle }}</option>
                    @endforeach
            </select>       
        </div>
        
        <div class="enf2">
            <label for="quantite_achat">Quantite_achat</label>
            <input type="text" name="quantite_achat" value="{{ old('quantite_achat') }}"/><br>
        </div>
        
        <div class="enf3">
            <label for="quantite_retourne">Quantite_retourne</label>
            <input type="text" name="quantite_retourne" value="{{ old('quantite_retourne') }}" /><br>
        </div>

        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>

























