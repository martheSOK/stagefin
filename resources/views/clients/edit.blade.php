<x-app-layout>
    <form action="{{ route('clients.update',$client->id_client) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="mt-20" >
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Modifiction d'un client</h1></div>
            <hr class="h-1 mt-2 mb-3">
            <div class="enf1">
                <label for="nom">Nom</label>
                <input type="text" name="nom"  value="@php if (!empty($client)){echo $client->nom;} @endphp"/><br>
            </div>
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="enf2">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" value="@php if (!empty($client)){echo $client->prenom;} @endphp"/><br>
            </div>
            @error('prenom')
            <div class="error">{{ $message }}</div>
            @enderror
            <div class="enf3">
                <label for="contact">Contact</label>
                <input type="text" name="contact" value="@php if (!empty($client)){echo $client->contact;} @endphp"/><br>
            </div>
            @error('contact')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="enf4">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" value="@php if (!empty($client)){echo $client->adresse;} @endphp"/><br>
            </div>
            @error('adresse')
                <div class="error">{{ $message }}</div>
            @enderror

            <button id="b1" type="submit">Enregistrer</button>
        </div>  
    </form>
</x-app-layout>
