<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>Ajouter Voiture</title>
	</head>
	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader">
			<img src="../assets/images/loader.svg" class="loader-img " alt="">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page">
			<div class="page-main">

				@include('LTR/dashboard/header')
				@include('LTR/dashboard/sidebar')

				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

						<div class="row mt-9">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
                                        <div class="fade show active mb-7" >   
                                            <h3 class="mb-5">Obtenez vous un code de voiture?</h3>
                                            <form method="post" id='token_form'>
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-control-label">Veuillez entrer le code:</label>
                                                    <input type="text" class="form-control w-50" id="car_token" name="car_token" >
                                                    <p id="car_token_errors" class = "errors text-danger"></p>
                                                </div>
                                                <button type="submit" name="token_form" class="btn btn-primary">Valider</button>
                                            </form>
                                        </div>
                                        <hr>
                                        <div class="fade show active mt-7" > 
                                            <h3 class="mb-5 mt-15">Ajouter une nouvelle voiture</h3>
                                            <form id="new_car_form" method="post">
                                                @csrf
                                                <div id="basicwizard" class="border pt-0">
                                                    <ul class="nav nav-tabs nav-justified">
                                                        <li class="nav-item"><a href="#tab1" data-toggle="tab" class="nav-link font-bold">Specifications</a></li>
                                                        <li class="nav-item"><a href="#tab2" data-toggle="tab" class="nav-link font-light">Informations voiture</a></li>
                                                        <li class="nav-item"><a href="#tab3" data-toggle="tab" class="nav-link font-light">Options</a></li>
                                                    </ul>
                                                    <div class="tab-content card-body mt-3 b-0 mb-0">
                                                        <div class="tab-pane m-t-10 fade" id="tab1">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group clearfix">
                                                                        <div class="row ">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label" for="marque">Marque</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                @include('LTR/marques_choices')
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  clearfix">
                                                                        <div class="row ">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="modele">Modèle</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                @include('LTR/modeles_choices')
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  clearfix">
                                                                        <div class="row ">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="version">Version</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input id="version" name="version" type="text" class="required form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  clearfix">
                                                                        <div class="row ">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="prix">Prix(en DH)</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input id="prix" name="prix" type="text" class="required form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane m-t-10 fade" id="tab2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group  clearfix">
                                                                        <div class="row ">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="carburant">Carburant</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="carburant" id="carburant" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="Essence">Essence</option>
                                                                                    <option value="Diesel">Diesel</option>
                                                                                    <option value="Electrique">Electrique</option>
                                                                                    <option value="Hybride">Hybride </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="boite_de_vitesse">Boite de vitesse</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="boite_de_vitesse" id="boite_de_vitesse" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="Manuelle">Manuelle</option>
                                                                                    <option value="Automatique">Automatique</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="annee_mise_en_circulation">Année de la mise en circulation</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="annee_mise_en_circulation" id="annee_mise_en_circulation" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="1964 ou plus ancien">1964 ou plus ancien</option>
                                                                                    <option value="1965">1965</option>
                                                                                    <option value="1966">1966</option>
                                                                                    <option value="1967">1967</option>
                                                                                    <option value="1968">1968</option>
                                                                                    <option value="1969">1969</option>
                                                                                    <option value="1970">1970</option>
                                                                                    <option value="1971">1971</option>
                                                                                    <option value="1972">1972</option>
                                                                                    <option value="1973">1973</option>
                                                                                    <option value="1974">1974</option>
                                                                                    <option value="1975">1975</option>
                                                                                    <option value="1976">1976</option>
                                                                                    <option value="1977">1977</option>
                                                                                    <option value="1978">1978</option>
                                                                                    <option value="1979">1979</option>
                                                                                    <option value="1980">1980</option>
                                                                                    <option value="1981">1981</option>
                                                                                    <option value="1982">1982</option>
                                                                                    <option value="1983">1983</option>
                                                                                    <option value="1984">1984</option>
                                                                                    <option value="1985">1985</option>
                                                                                    <option value="1984">1984</option>
                                                                                    <option value="1985">1985</option>
                                                                                    <option value="1986">1986</option>
                                                                                    <option value="1987">1987</option>
                                                                                    <option value="1988">1988</option>
                                                                                    <option value="1989">1989</option>
                                                                                    <option value="1990">1990</option>
                                                                                    <option value="1991">1991</option>
                                                                                    <option value="1992">1992</option>
                                                                                    <option value="1993">1993</option>
                                                                                    <option value="1994">1994</option>
                                                                                    <option value="1995">1995</option>
                                                                                    <option value="1996">1996</option>
                                                                                    <option value="1997">1997</option>
                                                                                    <option value="1998">1998</option>
                                                                                    <option value="1999">1999</option>
                                                                                    <option value="2000">2000</option>
                                                                                    <option value="2001">2001</option>
                                                                                    <option value="2002">2002</option>
                                                                                    <option value="2003">2003</option>
                                                                                    <option value="2004">2004</option>
                                                                                    <option value="2005">2005</option>
                                                                                    <option value="2006">2006</option>
                                                                                    <option value="2007">2007</option>
                                                                                    <option value="2008">2008</option>
                                                                                    <option value="2009">2009</option>
                                                                                    <option value="2010">2010</option>
                                                                                    <option value="2011">2011</option>
                                                                                    <option value="2012">2012</option>
                                                                                    <option value="2013">2013</option>
                                                                                    <option value="2014">2014</option>
                                                                                    <option value="2015">2015</option>
                                                                                    <option value="2016">2016</option>
                                                                                    <option value="2017">2017</option>
                                                                                    <option value="2018">2018</option>
                                                                                    <option value="2019">2019</option>
                                                                                    <option value="2020">2020</option>
                                                                                    <option value="2021">2021</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="dedouane">Véhicule dédouané</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="dedouane" id="dedouane" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="Non, achté au maroc (ww)">Non, achté au maroc (ww)</option>
                                                                                    <option value="oui, dédouané">oui, dédouané</option>
                                                                                    <option value="Pas encore dédouané">Pas encore dédouané</option>
                                                                                    <option value="Importée neuve">Importée neuve</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="kilometrage">Kilométrage</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="kilometrage" id="kilometrage" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="0-4 999">0 - 4 999</option>
                                                                                    <option value="5 000-9 999">5 000 - 9 999</option>
                                                                                    <option value="10 000-14 999">10 000 - 14 999</option>
                                                                                    <option value="15 000-19 999">15 000 - 19 999</option>
                                                                                    <option value="20 000-24 999">20 000 - 24 999</option>
                                                                                    <option value="25 000-29 999">25 000 - 29 999</option>
                                                                                    <option value="30 000-34 999">30 000 - 34 999</option>
                                                                                    <option value="35 000-39 999">35 000 - 39 999</option>
                                                                                    <option value="40 000-44 999">40 000 - 44 999</option>
                                                                                    <option value="45 000-49 999">45 000 - 49 999</option>
                                                                                    <option value="50 000-54 999">50 000 - 54 999</option>
                                                                                    <option value="55 000-59 999">55 000 - 59 999</option>
                                                                                    <option value="60 000-64 999">60 000 - 64 999</option>
                                                                                    <option value="65 000-69 999">65 000 - 69 999</option>
                                                                                    <option value="70 000-74 999">70 000 - 74 999</option>
                                                                                    <option value="75 000-79 999">75 000 - 79 999</option>
                                                                                    <option value="80 000-84 999">80 000 - 84 999</option>
                                                                                    <option value="85 000-89 999">85 000 - 89 999</option>
                                                                                    <option value="90 000-94 999">90 000 - 94 999</option>
                                                                                    <option value="95 000-99 999">95 000 - 99 999</option>
                                                                                    <option value="100 000-109 999">100 000 - 109 999</option>
                                                                                    <option value="110 000-119 999">110 000 - 119 999</option>
                                                                                    <option value="120 000-129 999">120 000 - 129 999</option>
                                                                                    <option value="130 000-139 999">130 000 - 139 999</option>
                                                                                    <option value="140 000-149 999">140 000 - 149 999</option>
                                                                                    <option value="150 000-159 999">150 000 - 159 999</option>
                                                                                    <option value="160 000-169 999">160 000 - 169 999</option>
                                                                                    <option value="170 000-179 999">170 000 - 179 999</option>
                                                                                    <option value="180 000-189 999">180 000 - 189 999</option>
                                                                                    <option value="190 000-199 999">190 000 - 199 999</option>
                                                                                    <option value="200 000-249 999">200 000 - 249 999</option>
                                                                                    <option value="250 000-299 999">250 000 - 299 999</option>
                                                                                    <option value="300 000-349 999">300 000 - 349 999</option>
                                                                                    <option value="350 000-399 999">350 000 - 399 999</option>
                                                                                    <option value="400 000-449 999">400 000 - 449 999</option>
                                                                                    <option value="450 000-499 999">450 000 - 499 999</option>
                                                                                    <option value="Plus de 500 000">Plus de 500 000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="couleur">Couleur</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="couleur" id="couleur" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="Argent">Argent</option>
                                                                                    <option value="Beige">Beige</option>
                                                                                    <option value="Blanc">Blanc</option>
                                                                                    <option value="Blanc cassé">Blanc cassé</option>
                                                                                    <option value="Bleu">Bleu</option>
                                                                                    <option value="Bleu clair">Bleu clair</option>
                                                                                    <option value="Bleu marine">Bleu marine</option>
                                                                                    <option value="Bordeaux">Bordeaux</option>
                                                                                    <option value="Gris">Gris</option>
                                                                                    <option value="Gris clair">Gris clair</option>
                                                                                    <option value="Gris fonce">Gris fonce</option>
                                                                                    <option value="Gris anthracite">Gris anthracite</option>
                                                                                    <option value="Ivoire">Ivoire</option>
                                                                                    <option value="Jaune">Jaune</option>
                                                                                    <option value="Marron">Marron</option>
                                                                                    <option value="Marron clair">Marron clair</option>
                                                                                    <option value="Noir">Noir</option>
                                                                                    <option value="Or">Or</option>
                                                                                    <option value="Orange">Orange</option>
                                                                                    <option value="Rouge">Rouge</option>
                                                                                    <option value="Rouge fance">Rouge fance</option>
                                                                                    <option value="Rose">Rose</option>
                                                                                    <option value="Tuning">Tuning</option>
                                                                                    <option value="Vert">Vert</option>
                                                                                    <option value="Vert fonce">Vert fonce</option>
                                                                                    <option value="Violet">Violet</option>
                                                                                    <option value="Autre">Autre</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="carrosserie">Carrosserie</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="carrosserie" id="carrosserie" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="Cabriolet">Cabriolet</option>
                                                                                    <option value="Suv et 4x4">Suv et 4x4</option>
                                                                                    <option value="Coupé">Coupé</option>
                                                                                    <option value="Citadine">Citadine</option>
                                                                                    <option value="Break">Break</option>
                                                                                    <option value="Monospace">Monospace</option>
                                                                                    <option value="CC">CC</option>
                                                                                    <option value="Micro-citadine">Micro-citadine</option>
                                                                                    <option value="Compact">Compact</option>
                                                                                    <option value="Crossover">Crossover</option>
                                                                                    <option value="Pick up">Pick up</option>
                                                                                    <option value="Utilaire(minivan)">Utilaire(minivan)</option>
                                                                                    <option value="Utilaire(van)">Utilaire(van)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="portes">Nombre de portes</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="portes" id="portes" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                    <option value="10">10</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="puissance_fiscale">Puissance fiscale</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="puissance_fiscale" id="puissance_fiscale" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                    <option value="10">10</option>
                                                                                    <option value="11">11</option>
                                                                                    <option value="12">12</option>
                                                                                    <option value="13">13</option>
                                                                                    <option value="14">14</option>
                                                                                    <option value="15">15</option>
                                                                                    <option value="16">16</option>
                                                                                    <option value="17">17</option>
                                                                                    <option value="18">18</option>
                                                                                    <option value="19">19</option>
                                                                                    <option value="20">20</option>
                                                                                    <option value="21">21</option>
                                                                                    <option value="22">22</option>
                                                                                    <option value="23">23</option>
                                                                                    <option value="24">24</option>
                                                                                    <option value="25">25</option>
                                                                                    <option value="26">26</option>
                                                                                    <option value="27">27</option>
                                                                                    <option value="28">28</option>
                                                                                    <option value="29">29</option>
                                                                                    <option value="30">30</option>
                                                                                    <option value="31">31</option>
                                                                                    <option value="32">32</option>
                                                                                    <option value="33">33</option>
                                                                                    <option value="34">34</option>
                                                                                    <option value="35">35</option>
                                                                                    <option value="36">36</option>
                                                                                    <option value="37">37</option>
                                                                                    <option value="38">38</option>
                                                                                    <option value="39">39</option>
                                                                                    <option value="40">40</option>
                                                                                    <option value="41">41</option>
                                                                                    <option value="42">42</option>
                                                                                    <option value="43">43</option>
                                                                                    <option value="44">44</option>
                                                                                    <option value="45">45</option>
                                                                                    <option value="46">46</option>
                                                                                    <option value="47">47</option>
                                                                                    <option value="48">48</option>
                                                                                    <option value="49">49</option>
                                                                                    <option value="50">50</option>
                                                                                    <option value="51">51</option>
                                                                                    <option value="52">52</option>
                                                                                    <option value="53">53</option>
                                                                                    <option value="54">54</option>
                                                                                    <option value="55">55</option>
                                                                                    <option value="56">56</option>
                                                                                    <option value="57">57</option>
                                                                                    <option value="58">58</option>
                                                                                    <option value="59">59</option>
                                                                                    <option value="60">60</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="premiere_main">Première main</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="premiere_main" id="premiere_main" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="1">Oui</option>
                                                                                    <option value="0">Non</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label form-label " for="garantie">Véhicule en garantie</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control select" name="garantie" id="garantie" required>
                                                                                    <option value="" disabled selected></option>
                                                                                    <option value="1">Oui</option>
                                                                                    <option value="0">Non</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane m-t-10 fade" id="tab3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group row clearfix">
                                                                        <div class="col-lg-12">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Dvd/cd/mp3"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Dvd/cd/mp3</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Alarme"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Alarme</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Aide parking"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Aide parking</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Abs"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Abs</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Carnet d'entretien"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Carnet d'entretien</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Anti patinage"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Anti patinage</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Capot électrique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Capot électrique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Rétroviseur extérieur électrique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Rétroviseur extérieur électrique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Toit ouvrant"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Toit ouvrant</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Siège chauffant"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Siège chauffant</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Siège sport"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Siège sport</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Volant réglable"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Volant réglable</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Volant sport"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Volant sport</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Détecteur de pluie"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Détecteur de pluie</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Ordinateur de bord"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Ordinateur de bord</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Régulateur de vitesse"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Régulateur de vitesse</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Affichage tête haute"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Affichage tête haute</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Frein de parking automatique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Frein de parking automatique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Système d'identification du conducteur"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Système d'identification du conducteur</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Jantes aluminium"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Jantes aluminium</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Airbags"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Airbags</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Climatisation auto"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Climatisation auto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Système de navigation / GPS"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Système de navigation / GPS</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Vitres électriques"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Vitres électriques</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Programme de stabilité électronique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Programme de stabilité électronique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Projecteurs xénons"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Projecteurs xénons</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Toit ouvrant panoramique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Toit ouvrant panoramique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Intérieur cuir"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Intérieur cuir</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Siège électrique"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Siège électrique</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Vitres surteintées"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Vitres surteintées</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Anti démarrage"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Anti démarrage</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Contrôle de pression des pneus"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Contrôle de pression des pneus</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Climatisation multizone"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Climatisation multizone</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Keyless go"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Keyless go</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Radio commande au volant"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Radio commande au volant</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Anti brouillard"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Anti brouillard</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Suspension sport"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Suspension sport</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Non-fumeur"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Non-fumeur</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                            <input type="checkbox" name="options[]" value="Direction assistée"  class="custom-control-input" />
                                                                                            <span class="custom-control-label text-dark ml-2">Direction assistée</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="custom-control mt-4 custom-checkbox">
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="previous list-inline-item"><button type="button" class="btn btn-success btn-sm mt-0 mb-0">Precedent</button></li>
                                                            <li class="next list-inline-item float-right"><button type="button" class="btn btn-success btn-sm mt-0 mb-0">Suivant</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <button type="submit" name="new_car_form" class="btn btn-primary mt-4">Valider</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')
        <!-- Form wizard js -->
        <script src="../assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="../assets/js/wizard.js"></script>

        <script src="../js/add_car.js"></script>

	</body>
</html>