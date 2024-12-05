@extends('layouts.template')

@section('content')
<h1 class="app-page-title" id="greeting"></h1>
<h1 class="app-page-title">Tableau de bord</h1>

			    

    
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                
                <h4 class="stats-type mb-1">Total Departements</h4>
                <div class="stats-figure">{{$totalDepartements}}</div>
               <!-- <div class="stats-meta text-success">
                    <i class="fa fa-house"></i>
                </div>-->
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Employers</h4>
                <div class="stats-figure">{{$totalEmployers}}</div>
               
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Administateurs</h4>
                <div class="stats-figure">{{$totalAdministateurs}}</div>
                
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Paiements</h4>
                <div class="stats-figure">{{$totalPayemnts}}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->
<script>
   document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const hours = now.getHours();
        const greetingElement = document.getElementById('greeting');
    
        let greeting;
        if (hours >= 5 && hours < 12) {
            greeting = 'Bonjour';
        } else if (hours >= 12 && hours < 18) {
            greeting = 'Bon après-midi';
        } else if (hours >= 18 && hours < 22) {
            greeting = 'Bonsoir';
        } else {
            greeting = 'Bonne nuit';
        }
    
        greetingElement.textContent = greeting;
        });
    
</script>
</div><!--//row-->

@endsection