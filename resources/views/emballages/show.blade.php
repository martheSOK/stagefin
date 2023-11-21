<x-app-layout>
<form action="{{route ('emballages.store') }}" method="post">
    @csrf
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'un emballage</h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="libelle">Type_emballage</label>
            <input type="text" name="libelle" value="@php if (!empty($emballage)){echo $emballage->libelle;} @endphp" disabled/><br>
        </div>
        <button id="b1" type="submit"><a href="{{route('emballages.index')}}">Quiter</a></button>

    </div>  
</form>
</x-app-layout>

