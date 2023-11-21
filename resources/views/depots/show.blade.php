
<x-app-layout>
<form action="{{route ('depots.store') }}" method="post">
    @csrf
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'un depot</h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="nom_depot">Nom_du_depot</label>
            <input type="text" name="designation" value="@php if (!empty($depot)){echo $depot->designation;} @endphp" disabled/><br>
        </div>
        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>

