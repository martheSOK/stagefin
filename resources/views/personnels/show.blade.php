<x-app-layout>
    <div class="mt-20" >
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Affichage d'un personnel</h1></div>
                <hr class="h-1 mt-2 mb-3">
    
            <div class="enf1">
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="@php if (!empty($personnel)){echo $personnel->nom;} @endphp" disabled/><br>
            </div>
            <div class="enf2">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" value="@php if (!empty($personnel)){echo $personnel->prenom;} @endphp" disabled/><br>
            </div>
            <div class="enf3">
                <label>Sexe :</label>
                <div class="form-check">
                <input type="radio" class="form-check-input" id="homme" name="sexe" value="homme">
                <label class="form-check-label" for="homme">Homme</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="femme" name="sexe" value="femme">
                <label class="form-check-label" for="femme">Femme</label>
            </div>
            </div>
            <div class="enf4">
                <label for="contact">Contact</label>
                <input type="text" name="contact" value="@php if (!empty($personnel)){echo $personnel->contact;} @endphp" disabled/><br>
            </div>
            <div class="enf5">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" value="@php if (!empty($personnel)){echo $personnel->adresse;} @endphp" disabled/><br>
            </div>
            <div class="enf6"> 
                <label for="id_depot">Depot</label>
                <select name="id_depot" value="@php if (!empty($personnel)){echo $personnel->id_depot;} @endphp" disabled>
                    @foreach ($id_depot as $d)
                        <option value="{{ $d->id_depot }}">{{ $d->designation }}</option>
                    @endforeach
                </select>
            </div>
            <button id="b1" type="submit"><a href="{{route('personnels.index')}}">Quiter</a></button>
          
</x-app-layout>
