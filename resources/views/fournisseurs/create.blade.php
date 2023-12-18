<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="flex justify-end">
            <a class="bg-green-800 p-2 rounded-lg text-white" href=" {{ route('fournisseurs.index') }} ">Listes fournisseurs</a>
        </div>
        <form action="{{route ('personnels.store') }}" method="post">
            @csrf
            <div class="container py-24 mx-auto flex flex-wrap items-center">
            
                <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col m-auto  ">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5 text-center">Enregistrer un fournisseur</h2>
                    <div class="relative mb-4">
                    <label for="nom_fournisseur" class="leading-7 text-sm text-gray-600">Nom_fournisseur</label>
                    <input type="text" id="nom_fournisseur" name="nom_fournisseur" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('nom_fournisseur') }}">
                    </div>
                    @error('nom_fournisseur')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    
                    <div class="relative mb-4">
                        <label for="contact" class="leading-7 text-sm text-gray-600">Contact</label>
                        <input type="number" id="contact" name="contact" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('contact') }}">
                    </div>
                    @error('contact')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Adresse</label>
                        <input type="text" id="email" name="adresse" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('adresse') }}">
                    </div>
                    @error('adresses')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg" type="submit">Enregistrer</button>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>


