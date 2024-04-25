@extends('master')
@section('body')
<div class="page-titles">

    <ol class="breadcrumb">
        <li><h5 class="bc-title">Tableau de bord</h5></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
             </a>
        </li>
    </ol>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 wid-100">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card chart-grd same-card">
                        <div class="card-body depostit-card p-0">
                            <div class="depostit-card-media d-flex justify-content-between pb-0">
                                <div>
                                    <h6>Total Secteurs</h6>
                                    <h3>{{ $nbSecteurs }}</h3>
                                </div>
                                
                            </div>
                            <div id="NewCustomers"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card chart-grd same-card">
                        <div class="card-body depostit-card p-0">
                            <div class="depostit-card-media d-flex justify-content-between pb-0">
                                <div>
                                    <h6>Total Starups</h6>
                                    <h3>{{ $nbStartups }}</h3>
                                </div>
                               
                            </div>
                            <div id="NewExperience"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 same-card">
                    <div class="card">
                        <div class="card-body depostit-card">
                            <div class="depostit-card-media d-flex justify-content-between style-1">
                                <div>
                                    <h6>Total Investisseur</h6>
                                    <h3>{{ $nbInvestisseur }}</h3>
                                </div>
                               
                            </div>

                           
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card chart-grd same-card">
                        <div class="card-body depostit-card p-0">
                            <div class="depostit-card-media d-flex justify-content-between pb-0">
                                <div>
                                    <h6>Total Fondateurs</h6>
                                    <h3>{{ $nbFondateurs }}</h3>
                                </div>
                                
                            </div>
                            <div id="NewCustomers"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-6 active-p">
                    <div class="card">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                        <script>
                            const ctx = document.getElementById('myChart');
                            const statistique = @json($statistique);
                        
                            const labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                            const data = [];
                        
                            for (let i = 0; i < 12; i++) {
                                data.push(0);    
                            }
                        
                            statistique.forEach(stat => { 
                                const moisIndex = stat.mois - 1;
                                data[moisIndex] += stat.nb; 
                            });
                        
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: '# Nombre des personnes(investisseurs&fondateurs) qui utilisent l\'application',
                                        data: data,
                                        borderWidth: 1,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)',
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            // Réglez le pas de l'axe y à 10 pour afficher les nombres par intervalles de 10
                                            stepSize: 10
                                        }
                                    }
                                }
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
@endsection


