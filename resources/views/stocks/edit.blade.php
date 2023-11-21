<x-app-layout>
<form action="{{route ('stocks.update' , $stock->id_stock) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Modification d'un stock depot</h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="id_depot">Depot</label>
            <select name="id_depot" value="@php if (!empty($stock)){echo $stock->id_depots;} @endphp">
                    @foreach ($depots as $depot)
                    <option value="{{ $depot->id_depot }}" {{ ($depot->id_depot == $stock->id_depot)?"selected":"" }}>{{ $depot->designation }}</option>
                @endforeach
                   
            </select>
        </div>
        <div class="enf2">
            <label for="id_type">TypeEmballage</label>
            <select name="id_type" value="@php if (!empty($stock)){echo $stock->id_type;} @endphp">
                <!-- <option value="">selectionné</option> -->
                    @foreach ($typemballages as $typemballage)
                    <option value="{{ $typemballage->id_type }}" {{ ($typemballage->id_type  == $stock->id_type)?"selected":"" }}>{{ $typemballage->libelle }}</option>
                @endforeach
                    
            </select>
        </div>
        <div class="enf3">
            <label for="id_fournisseur">Fournisseur</label>
            <select name="id_fournisseur[]"  multiple value="@php if (!empty($stock)){echo $stock->id_fournisseur;} @endphp">
                <!-- <option value="">selectionné</option> -->
                    @foreach ($fournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id_fournisseur }}" {{ ($fournisseur->id_fournisseur == $stock->id_fournisseur)?"selected":"" }}>{{ $fournisseur->nom_fournisseur }}</option>
                    @endforeach
                    
            </select>
        </div>
        <div class="enf4">
            <label for="quantite_stock">Quantite_stock</label>
            <input type="text" name="quantite_stock" value="@php if (!empty($stock)){echo $stock->quantite_stock;} @endphp"/><br>
        </div>
        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>
