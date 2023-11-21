<x-app-layout>
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'une quantite</h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="id_depots">Depot</label>
            <select name="id_depots" value="@php if (!empty($depotemballage)){echo $depotemballage->id_depots;} @endphp" disabled>
                <!-- <option value="">selectionné</option> -->
                    @foreach ($depots as $d)
                    <option value="{{ $d->id_depot }}">{{ $d->id_depot }}</option>
                @endforeach
                   
            </select>
        </div>
        <div class="enf2">
            <label for="id_type_emballage">TypeEmballage</label>
            <select name="id_type_emballage" value="@php if (!empty($depotemballage)){echo $depotemballage->id_type_emballage;} @endphp" disabled>
                <!-- <option value="">selectionné</option> -->
                    @foreach ($typemballages as $t)
                    <option value="{{ $t->id_type }}">{{ $t->libelle }}</option>
                @endforeach
                    
            </select>
        </div>
        <div class="enf3">
            <label for="id_fournisseur">Fournisseur</label>
            <select name="id_fournisseur" value="@php if (!empty($depotemballage)){echo $depotemballage->id_fournisseur;} @endphp" disabled >
                <!-- <option value="">selectionné</option> -->
                    @foreach ($fournisseurs as $f)
                    <option value="{{ $f->id_fournisseur }}">{{ $f->nom_fournisseur }}</option>
                @endforeach
                    
            </select>
        </div>
        <div class="enf4">
            <label for="quantite_stock">Quantite_stock</label>
            <input type="text" name="quantite_stock" value="@php if (!empty($depotemballage)){echo $depotemballage->quantite_stock;} @endphp" disabled/><br>
        </div>
        <button id="b1" type="submit"><a href="{{route('depotemballages.index')}}">Quiter</a></button>
    </div>  

</x-app-layout>
