<x-app-layout>
        <div class="mt-20" >
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'un client</h1></div>
            <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="@php if (!empty($client)){echo $client->nom;} @endphp" disabled/><br>
        </div>
        

        <div class="enf2">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" value="@php if (!empty($client)){echo $client->prenom;} @endphp" disabled/><br>
        
        <div class="enf3">
            <label for="contact">Contact</label>
            <input type="text" name="contact" value="@php if (!empty($client)){echo $client->contact;} @endphp" disabled/><br>
        </div>
        

        <div class="enf4">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="@php if (!empty($client)){echo $client->adresse;} @endphp" disabled/><br>
        </div>
        

        <button id="b1" type="submit"><a href="{{route('clients.index')}}">Quiter</a></button>
    </div>  
</form>
</x-app-layout>
