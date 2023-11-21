<x-app-layout>
    <div class="mt-20">
        <form action="{{route ('fournisseurs.store') }}" method="post">
            @csrf
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrer un fournisseur</h1></div>
            <hr class="h-1 mt-2 mb-3">
                <div class="enf1">
                    <label for="nom_fournisseur">Nom_fournisseur</label>
                    <input type="text" name="nom_fournisseur"  value="{{ old('nom_fournisseur') }}"/><br>
                </div>
                @error('nom_fournisseur')
                    <div class="error">{{ $message }}</div>
                @enderror
                <div class="enf2">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" value="{{ old('contact') }}"/><br>
                </div>
                @error('contact')
                    <div class="error">{{ $message }}</div>
                @enderror
                <div class="enf3">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}"/><br>
                </div>
                @error('adresses')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button id="b1" type="submit">Enregistrer</button>
            </div>  
        </form>
</x-app-layout>
