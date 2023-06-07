<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png"> --}}
  <title>
    Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  {{-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/299e2ad6c6.js" crossorigin="anonymous"></script>
  {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #8a97e0;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #7685de;
}
    .select2-container--default .select2-selection--single , .select2-selection--multiple {

        border: 0px solid red !important;
    }
    .select2-container--open{
        border:#5e73e4 1px solid
    }
    .select2-search--dropdown .select2-search__field{
        border-radius: .5rem;
        padding-left: .5rem;
    }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <span class="ms-1 font-weight-bold">MediSolution</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @yield('dashbtn')" href="{{route('dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-tv mb-1 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('patbtn')" href="{{route('patients.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-hospital-user mb-1 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Patients</span>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link @yield('resbtn')" href="{{route('reservations.index')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-calendar-days mb-1 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Rendez-vous</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('resbtn')" href="{{route('reservations.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-regular fa-calendar-minus mb-1 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Rendez-vous en ligne</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('resbtn')" href="{{route('reservations.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-coins mb-1 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Comptabilité</span>
            </a>
          </li>
          @if (Auth::id()==1)
          <li class="nav-item">
            <a data-bs-toggle="collapse" class="nav-link" href="#ParamétragePages" aria-controls="ParamétragePages" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-sliders mb-1 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Paramétrage</span>
              </a>
            <div class="collapse" id="ParamétragePages" style="">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link @yield('assisbtn')" href="{{route('assistant.index')}}">
                          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-user mb-1 text-primary text-sm opacity-10"></i>
                          </div>
                          <span class="nav-link-text ms-1">Assistants</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('drugbtn')" href="{{route('drugs.index')}}">
                          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-pills mb-1 text-primary text-sm opacity-10"></i>
                          </div>
                          <span class="nav-link-text ms-1">Drugs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link @yield('servbtn')" href="{{route('services.index')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-notes-medical mb-1 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Services</span>
                    </a>
                    </li>

                </ul>
            </div>
            </li>
        @endif
        {{-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('profile')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user mb-1 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('logout')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-arrow-right-from-bracket mb-1 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li> --}}
        <li class="nav-item">
            <div class="nav-link">
                <button type="button" class="btn btn-primary w-100 m-0" data-bs-toggle="modal" data-bs-target="#addPatient">
                    Ajouter un patient
                    <i class="fa-solid fa-user-plus ms-2"></i>
                </button>
            </div>
          </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="py-1 px-3 d-flex justify-content-between w-100">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('pageName')</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="{{route('profile')}}" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">{{auth()->user()->name}}</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center" onclick="pinSidenav()">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('content')
        <div class="modal fade" id="addPatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter un patient</h5>
                  <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('patients.store')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleFormControlInput1">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Prénom">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleFormControlInput1">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Nom">
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">N° de téléphone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="phone" placeholder="0606-060606" onkeyup="phoneFormate(this);">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">CIN</label>
                            <input type="text" class="form-control" name="phone" placeholder="BE252525">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-date-input" class="form-control-label">Date de naissance</label>
                            <input class="form-control" type="date" value="2000-01-01" id="example-date-input">
                        </div>
                        <div class="form-group col-6">
                            <label for="example-date-input" class="form-control-label">Genre</label>
                            <div class="row ps-3">
                        <div class="form-check mt-1 col-6">
                            <input class="form-check-input" checked type="radio" name="gendre" id="customRadio1">
                            <label class="custom-control-label m-0" for="customRadio1">Mâle <i class="fa-solid fa-mars"></i></label>
                          </div>
                          <div class="form-check mt-1 col-6">
                            <input class="form-check-input" type="radio" name="gendre " id="customRadio2">
                            <label class="custom-control-label m-0" for="customRadio2">Femelle <i class="fa-solid fa-venus"></i></label>
                          </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Patient assurance <span class="text-danger">*</span></label>
                        <select class="form-control" name="assurance_id">
                          <option value="">Sélectionner l'assurance du patient</option>
                          <option value="1">Cnss</option>
                          <option value="2">Cnops</option>
                          <option value="3">Wafa assurance</option>
                          {{-- @foreach ($assurances as $assurance)
                            <option value="{{$assurance->id}}">{{$assurance->name}}</option>
                          @endforeach --}}
                        </select>
                      </div>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" checked name="iswaiting">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Ajouté à la salle d'attente</label>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
              </div>
            </div>
          </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  @livewireScripts
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  {{-- <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script> --}}
  {{-- <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> --}}
  {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}
  {{-- <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script> --}}
  <script>


  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
  <!-- Github buttons -->
  {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script> --}}
  <script src="../assets/js/script.js"></script>

</body>

</html>
