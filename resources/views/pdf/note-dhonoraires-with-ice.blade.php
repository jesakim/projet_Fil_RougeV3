<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://medisolution.com/assets/fonts/Cairo');
.logoimg{
    width: 140px;
    position: absolute;
    top: -23px;
    left: 0px;
}
.logotext{
    position: absolute;
    top: 70px;
    left: -15;
    font-size: 15px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
    letter-spacing: -1px;
}
.drName{
    position: absolute;
    top: -20;
    right: -20px;
    font-size: 40px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
    letter-spacing: -2px;
    font-weight: bold;
}
.drStatus{
    position: absolute;
    top: 5px;
    left: 150px;
    font-size: 20px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
hr.new4 {
  border: 1px solid #004AAD;
  position: absolute;
    top: 50px;
    left: 150px;
    width: 340px;
}
.services1 ,.services2 {
    position: absolute;

    left: 150px;
    font-size: 10px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
.services1{
    top: 60px;
}
.services2{
    top: 80px;
}
.ordo{
    position: absolute;
    top: 130px;
    left: 100px;
    font-size: 30px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
    border-bottom: 2px solid #004AAD;
    font-weight: bold;
}
.city{
    position: absolute;
    top: 160px;
    right: 0px;
    /* font-size: 20px; */
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
.date{
    position: absolute;
    top: 170px;
    right: 10px;
    letter-spacing: 1px;
}
.MM{
    position: absolute;
    top: 200px;
    left: -15;
    /* font-size: 20px; */
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
.name{
    position: absolute;
    top: 210px;
    left: 135px;
    font-size: 20px;
}
.montant{
    position: absolute;
    top: 250px;
    left: 0;
    font-size: 20px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
.dhs{
    position: absolute;
    top: 265px;
    left: 100px;
    font-size: 20px;
}
.arretez{
    position: absolute;
    top: 300px;
    left: 0;
    font-size: 20px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
}
.dhs-lettres{
    position: absolute;
    top: 350px;
    left: 50px;
    font-size: 20px;
}
.footerLine{
    border: 1px solid #004AAD;
  position: absolute;
    bottom: 0px;
    /* left: 150px; */
    width: 100%;
}
.footerText{
    position: absolute;
    bottom: -60px;
    width: 100%;
    font-size: 10px;
    font-family: 'Cairo', 'sans-serif';
    color: #004AAD;
    white-space: pre;
}
.wrapper-page {
    page-break-after: always;
    width: 100%; height: 100%;
}

.wrapper-page:last-child {
    page-break-after: avoid;
} /* page-break-after works, as well */

</style>
<body>
    {{-- <div class="content name">{{$patientName}}</div>
    <div class=" content date">{{$created_at}}</div>
    <ul class="content drugs">
        @foreach ($drugs as $drug)

        <li class="drugs-li">{{$drug}}</li>
        @endforeach

    </ul> --}}
    <div  class="wrapper-page">

<header>
    <div class="logo">
        <img class="logoimg" src='https://medisolution.com/assets/img/logos/toothLogo.svg'>
        <span class="logotext">CABINET DENTAIRE NAJD</span>
    </div>
    <div>
        <div class="drName">
            DR. FADWA SAKIM
        </div>
        <div class="drStatus">
            Chirurgien dentiste
        </div>
        <hr class="new4">
        <div class="services">
            <span class="services1">Soins - Prothèses - Parodontologie</span>
            <span class="services2">Radiologie - Esthétique du sourire</span>
        </div>
    </div>
</header>
<main>
    <div class="ordo">
        Note d'honoraires
    </div>
    <div class="city">
        El jadida, Le ..............................
    </div>
    <div class="date">{{date('d/m/Y',strtotime($note->created_at));}}</div>
    <div class="MM">
        Monsieur / Madame :
    </div>
    <div class="name">
        {{$note->patient->fname}} {{$note->patient->name}}
    </div>
    <div class="montant">
        Montant : .........................
    </div>
    <div class="dhs">
        {{$note->montant}} Dhs
    </div>
    <div class="arretez">
        Arretez la presente Note d'honoraires à :
    </div>
    <div class="dhs-lettres">
        {{$note->numberToWords}} Dhs
    </div>
</main>
<footer>
    <hr class="footerLine">
    <div class="footerText"> Résidence yasmine, Lot Najd 1, Appt N5, 1er étage,  El Jadida     -     Tél: 05 23 39 55 71     -      INP: 114181159  <br> E-mail: fadoua.odontologie@gmail.com   -   Patente: 42108987   -   ICE: 001945932000080   -   IF: 20786284
    </div>
</footer>
</div>
</body>
</html>
