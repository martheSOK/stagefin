<x-app-layout>
<form action="{{route ('fournisseurs.update', $fournisseur->id_fournisseur) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mt-20" >
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Modifiction d'un fournisseur</h1></div>
            <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="nom_fournisseur">Nom_fournisseur</label>
            <input type="text" name="nom_fournisseur" value="@php if (!empty($fournisseur)){echo $fournisseur->nom_fournisseur;} @endphp"/><br>
        </div>
        <div class="enf2">
            <label for="contact">Contact</label>
            <input type="text" name="contact" value="@php if (!empty($fournisseur)){echo $fournisseur->contact;} @endphp"/><br>
        </div>
        <div class="enf3">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="@php if (!empty($fournisseur)){echo $fournisseur->adresse;} @endphp"/><br>
        </div>
        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>

