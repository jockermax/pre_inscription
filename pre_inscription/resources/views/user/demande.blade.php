@extends('layouts.user.base')

@section('content')
    <!-- service section -->
    <div class="container mt-5 mb-5 bg-secondary">
        <div class="text-center p-3 mb-4"
             style="background-color: #093a6f; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <img src="{{asset('front/images/LOGO-ISI.jpg')}}" width="70px" height="70px" alt="isi"
                 class="mr-2 rounded-circle shadow-sm">
            <span class="text-white h2">Demande de Pré-inscription</span>
            <h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </h6>
            <img src="{{asset('front/images/LOGO-ISI.jpg')}}" width="70px" height="70px" alt="isi"
                 class="ml-2 rounded-circle shadow-sm">
        </div>

        <form action="{{ route('demande.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card bg-light">
                <div class="card-header active" onclick="toggleContent('personalData')"
                     style="background-color: #093a6f;">
                    <h6 class="card-title text-white">DONNÉES PERSONNELLES</h6>
                </div>
                <div class="card-body toggle-content" id="personalData">
                    <!-- Informations de base -->
                    <h6>Informations de base</h6>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" value="" id="surname"
                                       placeholder="Nom">
                                <label for="surname" class="text-danger">
                                    *Nom de famille (tel qu'indiqué sur votre extrait ou document de naissance)
                                    <span data-toggle="tooltip"
                                          title="Entrez votre nom tel qu'il apparaît sur votre extrait de naissance.">
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="prenom" value="" class="form-control" id="givenname"
                                       placeholder="Prénom">
                                <label for="givenname" class="text-danger">
                                    Prénom(s) (tel qu'indiqué sur votre extrait ou votre document de naissance)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="custom-select" name="sexe">
                                    <option value="" selected>SEXE</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" name="date_naissance" value="" class="form-control" id="birthdate"
                                       placeholder="Date de naissance">
                                <label for="birthdate">Date de naissance</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select" id="phoneCountry">
                                            <option value="" selected>Indicatif téléphonique</option>
                                            <!-- Les options seront ajoutées ici par JavaScript -->
                                        </select>
                                        <label for="phoneCountry">Indicatif téléphonique</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" name="telephone" value="" class="form-control"
                                               id="phoneNumber" placeholder="Entrez votre numéro de téléphone">
                                        <label for="phoneNumber">Numéro de téléphone</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations de naissance et de résidence -->
                    <h6>Informations de naissance et de résidence</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="pays_naissance" class="custom-select" id="countryOfBirth">
                                    <option value="" selected>Pays ou territoire de naissance</option>
                                    <!-- Ajouter ici la liste des pays -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="ville_naissance" class="form-control" id="cityOfBirth"
                                       placeholder="Ville de naissance">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="pays_residence" class="custom-select" id="applicationCountry">
                                    <option value="" selected>Pays ou territoire où vous effectuez la demande</option>
                                    <!-- Ajouter ici la liste des pays -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Couriel et langue -->
                    <h6>E-mail & Langue</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Courriel Personnel</label>
                                <input type="email" name="email" value="" class="form-control"
                                       id="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="langue_maternelle" class="custom-select" id="motherTongue">
                                    <option disabled selected>Langue maternelle</option>

                                    <!-- Les 15 langues les plus parlées -->
                                    <optgroup label="Langues les plus parlées">
                                        <option value="mandarin">Mandarin</option>
                                        <option value="english">Anglais</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="spanish">Espagnol</option>
                                        <option value="french">Français</option>
                                        <option value="arabic">Arabe</option>
                                        <option value="bengali">Bengali</option>
                                        <option value="russian">Russe</option>
                                        <option value="portuguese">Portugais</option>
                                        <option value="urdu">Ourdou</option>
                                        <option value="indonesian">Indonésien</option>
                                        <option value="german">Allemand</option>
                                        <option value="japanese">Japonais</option>
                                        <option value="swahili">Swahili</option>
                                        <option value="marathi">Marathi</option>
                                    </optgroup>

                                    <!-- 15 langues africaines -->
                                    <optgroup label="Langues africaines">
                                        <option value="swahili">Swahili</option>
                                        <option value="amharic">Amharique</option>
                                        <option value="yoruba">Yoruba</option>
                                        <option value="oromo">Oromo</option>
                                        <option value="hausa">Hausa</option>
                                        <option value="igbo">Igbo</option>
                                        <option value="zulu">Zoulou</option>
                                        <option value="shona">Shona</option>
                                        <option value="chichewa">Chichewa</option>
                                        <option value="kinyarwanda">Kinyarwanda</option>
                                        <option value="wolof">Wolof</option>
                                        <option value="xhosa">Xhosa</option>
                                        <option value="sotho">Sotho</option>
                                        <option value="tswana">Tswana</option>
                                        <option value="lingala">Lingala</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="langue_parlee" class="custom-select" id="spokenLanguage">
                                    <option value="" selected>Langue parlée</option>
                                    <!-- Les 15 langues les plus parlées -->
                                    <optgroup label="Langues les plus parlées">
                                        <option value="mandarin">Mandarin</option>
                                        <option value="english">Anglais</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="spanish">Espagnol</option>
                                        <option value="french">Français</option>
                                        <option value="arabic">Arabe</option>
                                        <option value="bengali">Bengali</option>
                                        <option value="russian">Russe</option>
                                        <option value="portuguese">Portugais</option>
                                        <option value="urdu">Ourdou</option>
                                        <option value="indonesian">Indonésien</option>
                                        <option value="german">Allemand</option>
                                        <option value="japanese">Japonais</option>
                                        <option value="swahili">Swahili</option>
                                        <option value="marathi">Marathi</option>
                                    </optgroup>

                                    <!-- 15 langues africaines -->
                                    <optgroup label="Langues africaines">
                                        <option value="swahili">Swahili</option>
                                        <option value="amharic">Amharique</option>
                                        <option value="yoruba">Yoruba</option>
                                        <option value="oromo">Oromo</option>
                                        <option value="hausa">Hausa</option>
                                        <option value="igbo">Igbo</option>
                                        <option value="zulu">Zoulou</option>
                                        <option value="shona">Shona</option>
                                        <option value="chichewa">Chichewa</option>
                                        <option value="kinyarwanda">Kinyarwanda</option>
                                        <option value="wolof">Wolof</option>
                                        <option value="xhosa">Xhosa</option>
                                        <option value="sotho">Sotho</option>
                                        <option value="tswana">Tswana</option>
                                        <option value="lingala">Lingala</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="TravailProofOfFunds" class="form-label">Status Légal</label>
                        <div class="form-group">
                            <select class="custom-select" name="status_legal">
                                <option value="" selected>Status légal actuel au Sénégal</option>
                                <option value="citoyen_senegalais">citoyen(ne) senegalais (e)</option>
                                <option value="resident_permanant">Résident permanant</option>
                                <option value="etranger">Etranger</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3 mr-3">
                        <button type="reset" class="btn btn-warning mr-2">Réinitialiser</button>
                    </div>
                </div>
                <div class="card-header  active" onclick="toggleContent('admissionDetails')"
                     style="background-color: #093a6f;">
                    <h6 class="card-title text-white">DEMANDE D'ADMISSION & CHOIX DE PROGRAMME</h6>
                </div>
                <div class="card-body toggle-content" id="admissionDetails">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row mt-4 ml-4">
                                <div class="col-md-3">
                                    <span class="h5 ml-2">Departement</span>
                                </div>
                                <div class="col-md-6 ml-2">
                                    <select class="form-control" name="departement" id="departement"
                                            onchange="updateFiliereList()">
                                        <option selected desabled>-- Faites votre choix --</option>
                                        @foreach($departements->unique('departement_id') as $filiere)
                                            <option
                                                value="{{$filiere->departement->id}}">{{$filiere->departement->nomDepartement}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 ml-4">
                                <div class="col-md-3">
                                    <span class="h5 ml-2">Filière</span>
                                </div>
                                <div class="col-md-6 ml-2">
                                    <select class="form-control" name="filiere" id="filiere"
                                            onchange="updateFiliereInfo()">

                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 ml-4">
                                <div class="col-md-3">
                                    <span class="h5 ml-2">Niveau à intégrer</span>
                                </div>
                                <div class="col-md-6 ml-2">
                                    <select class="form-control" name="niveau_a_integrer">
                                        <option value="licence1">Licence 1</option>
                                        <option value="licence2">Licence 2</option>
                                        <option value="licence2">Licence 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white">Informations</div>
                                <div class="card-body text-black" id="filiereInfo">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de réinitialisation -->
                    <div class="d-flex justify-content-end mt-3 mr-3">
                        <button type="reset" class="btn btn-warning mr-2">Réinitialiser</button>
                    </div>
                </div>

                <div class="card-header active" onclick="toggleContent('visitDetails')"
                     style="background-color: #093a6f;">
                    <h6 class="card-title text-white">DETAIL DES ETUDES ANTERIEURES & Baccalauréat</h6>
                </div>
                <div class="card-body toggle-content" id="visitDetails">
                    <div class="mb-3">
                        <label for="travelReason" class="form-label">Etudes anterieures & baccalauréat</label>
                        <select class="form-control" id="etudeReason" name="visable_type"
                                onchange="showTravelDetails(this.value)" required>
                            <option value="" selected disabled>Remplir...</option>
                            <option value="Seconde">Seconde</option>
                            <option value="Premiere">Premiere</option>
                            <option value="Terminal">Terminal</option>
                            <option value="baccalaureat">Baccalauréat</option>
                        </select>
                    </div>
                    <div id="SecondeDetails" class="travel-details">
                        <h5>Informations Seconde</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="paysEtudeSeconde" class="custom-select" id="paysEtudeSeconde">
                                        <option value="" selected>Pays Etude</option>
                                        <!-- Ajouter ici la liste des pays -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="villeEtude" class="form-control" id="villeEtude"
                                           placeholder="Ville d'étude">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom d'établissement d'enseignement</label>
                            <input type="text" class="form-control" id="accommodation" name="etablissement">
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom du programme</label>
                            <input type="text" class="form-control" id="accommodation" name="programme"
                                   placeholder="ex:science de la vie et de la terre">
                        </div>
                        <div class="mb-3">
                            <label for="DateDébut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>

                        <div class="mb-3">
                            <label for="DateFin" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" name="date_fin">
                        </div>

                        <div class="mb-3">
                            <label for="hotelBooking" class="form-label">Bulletin seconde</label>
                            <input type="file" class="form-control" name="BultinSeconde">
                        </div>
                    </div>
                    <div id="PremiereDetails" class="travel-details">
                        <h5>Informations Premiere</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="paysEtudePremiere" class="custom-select" id="paysEtudePremiere">
                                        <option value="" selected>Pays Etude</option>
                                        <!-- Ajouter ici la liste des pays -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="villeEtude" class="form-control" id="villeEtude"
                                           placeholder="Ville d'étude">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom d'établissement d'enseignement</label>
                            <input type="text" class="form-control" id="accommodation" name="etablissement">
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom du programme</label>
                            <input type="text" class="form-control" id="accommodation" name="programme"
                                   placeholder="ex:science de la vie et de la terre">
                        </div>
                        <div class="mb-3">
                            <label for="DateDébut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>

                        <div class="mb-3">
                            <label for="DateFin" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" name="date_fin">
                        </div>

                        <div class="mb-3">
                            <label for="hotelBooking" class="form-label">Bulletin Premiere</label>
                            <input type="file" class="form-control" name="BultinPremiere">
                        </div>
                    </div>
                    <div id="TerminalDetails" class="travel-details">
                        <h5>Informations Terminal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="paysEtudeTerminal" class="custom-select" id="paysEtudeTerminal">
                                        <option value="" selected>Pays Etude</option>
                                        <!-- Ajouter ici la liste des pays -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="villeEtude" class="form-control" id="villeEtude"
                                           placeholder="Ville d'étude">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom d'établissement d'enseignement</label>
                            <input type="text" class="form-control" id="accommodation" name="etablissement">
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom du programme</label>
                            <input type="text" class="form-control" id="accommodation" name="programme"
                                   placeholder="ex:science de la vie et de la terre">
                        </div>
                        <div class="mb-3">
                            <label for="DateDébut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>

                        <div class="mb-3">
                            <label for="DateFin" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" name="date_fin">
                        </div>

                        <div class="mb-3">
                            <label for="hotelBooking" class="form-label">Bulletin Terminal</label>
                            <input type="file" class="form-control" name="BultinTerminal">
                        </div>
                    </div>
                    <div id="baccalaureatDetails" class="travel-details">
                        <h5>Informations Baccalauréat</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="paysEtudeBaccalaureat" class="custom-select"
                                            id="paysEtudeBaccalaureat">
                                        <option value="" selected>Pays Etude</option>
                                        <!-- Ajouter ici la liste des pays -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="villeEtude" class="form-control" id="villeEtude"
                                           placeholder="Ville d'étude">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom d'établissement d'enseignement</label>
                            <input type="text" class="form-control" id="accommodation" name="etablissement">
                        </div>
                        <div class="mb-3">
                            <label for="accommodation" class="form-label">Nom du programme</label>
                            <input type="text" class="form-control" id="accommodation" name="programme"
                                   placeholder="ex:science de la vie et de la terre">
                        </div>
                        <div class="mb-3">
                            <label for="DateDébut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>

                        <div class="mb-3">
                            <label for="DateFin" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" name="date_fin">
                        </div>

                        <div class="mb-3">
                            <label for="hotelBooking" class="form-label">Relever de notes des exams du BAC</label>
                            <input type="file" class="form-control" name="relever">
                        </div>
                        <div class="mb-3">
                            <label for="hotelBooking" class="form-label">Diplôme ou Attestation BAC</label>
                            <input type="file" class="form-control" name="diplome">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3 mr-3">
                        <button type="reset" class="btn btn-warning mr-2">Réinitialiser</button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <button type="button" class="btn btn-primary mt-4 mb-4" data-toggle="modal"
                        data-target="#confirmationModal">Envoyer la demande de pré-inscription
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                 aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation de soumission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez-vous envoyer les informations ? Cette action est irréversible. Veuillez bien vérifier
                            vos
                            informations.
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <br>

    <script>
        function fillCountrySelect(selectId, data) {
            const select = document.getElementById(selectId);
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.innerHTML = `<span class="flag-icon flag-icon-${country.cca2.toLowerCase()}"></span> ${country.name.common}`;
                select.appendChild(option);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('countryOfBirth', data);
                    // Répéter pour d'autres champs select si nécessaire
                    // fillCountrySelect('autreSelectId', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('paysEtudeSeconde', data);
                    // Répéter pour d'autres champs select si nécessaire
                    // fillCountrySelect('autreSelectId', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });
        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('paysEtudePremiere', data);
                    // Répéter pour d'autres champs select si nécessaire
                    // fillCountrySelect('autreSelectId', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('paysEtudeTerminal', data);
                    // Répéter pour d'autres champs select si nécessaire
                    // fillCountrySelect('autreSelectId', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('paysEtudeBaccalaureat', data);
                    // Répéter pour d'autres champs select si nécessaire
                    // fillCountrySelect('autreSelectId', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });

        function fillCountrySelect2(selectId, data) {
            const select = document.getElementById(selectId);
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.innerHTML = `<span class="flag-icon flag-icon-${country.cca2.toLowerCase()}"></span> ${country.name.common}`;
                select.appendChild(option);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountrySelect('countryOfBirth', data);
                    fillCountrySelect('applicationCountry', data);
                    // Répéter pour d'autres champs select si nécessaire
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));
        });

        function fillCountryPhoneSelect(selectId, data) {
            const select = document.getElementById(selectId);
            // Trier les pays par ordre alphabétique
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));

            data.forEach(country => {
                // Vérifier si les informations d'indicatif sont disponibles
                if (country.idd && country.idd.root && country.idd.suffixes && country.idd.suffixes.length > 0) {
                    const option = document.createElement('option');
                    option.value = country.idd.root + country.idd.suffixes[0];
                    option.textContent = `${country.name.common} (${country.idd.root}${country.idd.suffixes[0]})`;
                    select.appendChild(option);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    fillCountryPhoneSelect('phoneCountry', data);
                })
                .catch(error => console.error('Erreur lors de la récupération des pays:', error));

            // Gestionnaire d'événements pour mettre à jour le champ du numéro de téléphone
            document.getElementById('phoneCountry').addEventListener('change', function () {
                const phoneInput = document.getElementById('phoneNumber');
                const selectedOption = this.options[this.selectedIndex];
                phoneInput.value = selectedOption.value;
            });
        });


        function submitForm() {
            document.getElementById("myForm").submit();
        }

        // Assurez-vous que l'ID "myForm" correspond à l'ID de votre formulaire
    </script>

    <script>
        function updateFiliereList() {
            var departementId = document.getElementById('departement').value;
            var filiereSelect = document.getElementById('filiere');

            // Effacer les options actuelles
            filiereSelect.innerHTML = '<option selected disabled>-- Faites votre choix --</option>';

            // Filtrer les filières du département sélectionné
            var filieres = {!! $departements->toJson() !!};
            var filieresDepartement = filieres.filter(filiere => filiere.departement_id == departementId);

            // Ajouter les nouvelles options
            filieresDepartement.forEach(filiere => {
                var option = document.createElement('option');
                option.value = filiere.nomFiliere;  // Utiliser le nom de la filière comme valeur
                option.text = filiere.nomFiliere;
                filiereSelect.appendChild(option);
            });

            // Effacer les informations sur la filière
            document.getElementById('filiereInfo').innerHTML = '';
        }

        function updateFiliereInfo() {
            var filiereNom = document.getElementById('filiere').value;

            // Filtrer la filière sélectionnée par le nom
            var filieres = {!! $departements->toJson() !!};
            var filiereSelected = filieres.find(filiere => filiere.nomFiliere == filiereNom);

            // Mettre à jour les informations sur la filière
            document.getElementById('filiereInfo').innerHTML = `
        <p>Filière: ${filiereSelected.nomFiliere}</p>
        <p>Côut Formation : ${filiereSelected.cout}</p>
        <p>Mensualite : ${filiereSelected.mensualite}</p>
        <p>Durée: ${filiereSelected.duree} Mois</p>
    `;
        }

    </script>

@endsection
