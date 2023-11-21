
<x-app-layout>
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Afficher un achat</h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="id_stock">Depot</label>
            <select name="id_stock">
                <option value="">selectionné</option>
                    @foreach ($listestocks as $listestock)
                        <option value="{{ $listestock->id_stock }}" {{ ($listestock->id_stock == $achat->id_stock)?"selected":"" }}>{{ $listestock->depots->designation." ".$listestock->type_emballages->libelle }}</option>
                    @endforeach
            </select>       
        </div>
        
        <div class="enf2">
            <label for="quantite_achat">Quantite_achat</label>
            <input type="text" name="quantite_achat" value="@php if (!empty($achat)){echo $achat->quantite_achat;} @endphp"  disabled/><br>
        </div>
        
        <div class="enf3">
            <label for="quantite_retourne">Quantite_retourne</label>
            <input type="text" name="quantite_retourne" value="@php if (!empty($achat)){echo $achat->quantite_retourne;} @endphp" disabled /><br>
        </div>

        <button id="b1" type="submit"><a href="{{route('achats.index')}}">Quiter</a></button>
    </div>  
</form>
</x-app-layout>

























