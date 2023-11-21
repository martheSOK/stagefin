
<x-app-layout>
<form action="{{route ('clients.store') }}" method="post">
    @csrf
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrement un client<h/h1></div>
        <hr class="h-1 mt-2 mb-3">
        <div class="enf1">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}"/><br>
        </div>
        @error('nom')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="enf2">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" value="{{ old('prenom') }}"/><br>
        </div>
        @error('prenom')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="enf3">
            <label for="contact">Contact</label>
            <input type="text" name="contact"/><br>
        </div>
        @error('contact')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="enf4">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse"/><br>
        </div>
        @error('adresse')
            <div class="error">{{ $message }}</div>
        @enderror

        <button id="b1" type="submit">Enregistrer</button>
    </div>  
</form>
</x-app-layout>

























