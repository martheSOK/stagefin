<x-app-layout>
    <form action="{{ route('mouvements.store') }}" method="post">
        @csrf
        <div class="mt-20" >
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'un mouvement</h1></div>
            <hr class="h-1 mt-2 mb-3">
            <div>
                <label for="id_depsource" class="font-bold">Depot_Source</label>
                <!-- <option value="">selectionné</option> -->
                <select name="id_depsource" value="@php if (!empty($mouvement)){echo $mouvement->id_depsource;} @endphp" disabled>
                    @foreach ($listestoks as $listestok)
                        <option value="{{ $listestok->id_stock }}" {{ ($listestok->id_stock == $mouvement->id_depsource)?"selected":"" }}>{{ $listestok->depots->designation." ".$listestok->type_emballages->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_depdestination" class="font-bold">Depot_Destination</label>
                <!-- <option value="">selectionné</option> -->
                <select name="id_depdestination" value="@php if (!empty($mouvement)){echo $mouvement->id_depdestination;} @endphp" disabled>
                    @foreach ($listestoks as $listestok)
                        <option value="{{ $listestok->id_stock }}" {{ ($listestok->id_stock == $mouvement->id_depdestination)?"selected":"" }}>{{ $listestok->depots->designation." ".$listestok->type_emballages->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="quantite_mouvement" class="font-bold" >Quantite</label>
                <input type="text" name="quantite_mouvement" value="@php if (!empty($mouvement)){echo $mouvement->quantite_mouvement;} @endphp" disabled/>
            </div>
            <!-- <div>
                <label for="date" class="font-bold">Date</label>
                <input type="text" name="date" value="@php if (!empty($mouvement)){echo $mouvement->date;} @endphp" disabled/>
            </div> -->
            <button id="b1" type="submit"><a href="{{ route('mouvements.index') }}">Quiter</a></button>
        </div>    
    </form>
</x-app-layout>