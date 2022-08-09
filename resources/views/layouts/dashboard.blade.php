
<!DOCTYPE html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<div class="g-sidenav-show bg-gray-100">
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html " target="_blank">
            <img src="/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Circe Notarial</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#adminpanel" class="nav-link " aria-controls="adminspanel" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">ADMINISTRADOR</span>
              </a>
              <div class="collapse " id="adminpanel">
                <ul class="nav ms-4">
                  <li class="nav-item ">
                    <a class="nav-link " href="{{route('usuarios')}}">
                      <span class="sidenav-mini-icon"> U </span>
                      <span class="sidenav-normal"> Usuarios </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/dashboards/default.html">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Default </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/dashboards/automotive.html">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Automotive </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/dashboards/smart-home.html">
                      <span class="sidenav-mini-icon"> S </span>
                      <span class="sidenav-normal"> Smart Home </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                      <span class="sidenav-mini-icon"> V </span>
                      <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                    </a>
                    <div class="collapse " id="vrExamples">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/dashboards/vr/vr-default.html">
                            <span class="sidenav-mini-icon text-xs"> V </span>
                            <span class="sidenav-normal"> VR Default </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/dashboards/vr/vr-info.html">
                            <span class="sidenav-mini-icon text-xs"> V </span>
                            <span class="sidenav-normal"> VR Info </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/dashboards/crm.html">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> CRM </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            {{-- <li class="nav-item mt-3">
              <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
            </li> --}}
            {{-- <li class="nav-item">
              <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link active" aria-controls="pagesExamples" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                  <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pages</span>
              </a>
              <div class="collapse  show " id="pagesExamples">
                <ul class="nav ms-4">
                  <li class="nav-item ">
                    <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Profile <b class="caret"></b></span>
                    </a>
                    <div class="collapse " id="profileExample">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/profile/overview.html">
                            <span class="sidenav-mini-icon text-xs"> P </span>
                            <span class="sidenav-normal"> Profile Overview </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/profile/teams.html">
                            <span class="sidenav-mini-icon text-xs"> T </span>
                            <span class="sidenav-normal"> Teams </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/profile/projects.html">
                            <span class="sidenav-mini-icon text-xs"> A </span>
                            <span class="sidenav-normal"> All Projects </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                      <span class="sidenav-mini-icon"> U </span>
                      <span class="sidenav-normal"> Users <b class="caret"></b></span>
                    </a>
                    <div class="collapse " id="usersExample">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/users/reports.html">
                            <span class="sidenav-mini-icon text-xs"> R </span>
                            <span class="sidenav-normal"> Reports </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/users/new-user.html">
                            <span class="sidenav-mini-icon text-xs"> N </span>
                            <span class="sidenav-normal"> New User </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Account <b class="caret"></b></span>
                    </a>
                    <div class="collapse " id="accountExample">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/account/settings.html">
                            <span class="sidenav-mini-icon text-xs"> S </span>
                            <span class="sidenav-normal"> Settings </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/account/billing.html">
                            <span class="sidenav-mini-icon text-xs"> B </span>
                            <span class="sidenav-normal"> Billing </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/account/invoice.html">
                            <span class="sidenav-mini-icon text-xs"> I </span>
                            <span class="sidenav-normal"> Invoice </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/account/security.html">
                            <span class="sidenav-mini-icon text-xs"> S </span>
                            <span class="sidenav-normal"> Security </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link  active " data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Projects <b class="caret"></b></span>
                    </a>
                    <div class="collapse show" id="projectsExample">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" href="../../../pages/pages/projects/general.html">
                            <span class="sidenav-mini-icon text-xs"> G </span>
                            <span class="sidenav-normal"> General </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/projects/timeline.html">
                            <span class="sidenav-mini-icon text-xs"> T </span>
                            <span class="sidenav-normal"> Timeline </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="../../../pages/pages/projects/new-project.html">
                            <span class="sidenav-mini-icon text-xs"> N </span>
                            <span class="sidenav-normal"> New Project </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/pricing-page.html">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Pricing Page </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/rtl-page.html">
                      <span class="sidenav-mini-icon"> R </span>
                      <span class="sidenav-normal"> RTL </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/widgets.html">
                      <span class="sidenav-mini-icon"> W </span>
                      <span class="sidenav-normal"> Widgets </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/charts.html">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Charts </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/sweet-alerts.html">
                      <span class="sidenav-mini-icon"> S </span>
                      <span class="sidenav-normal"> Sweet Alerts </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/notifications.html">
                      <span class="sidenav-mini-icon"> N </span>
                      <span class="sidenav-normal"> Notifications </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/pages/chat.html">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Chat </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                  <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Applications</span>
              </a>
              <div class="collapse " id="applicationsExamples">
                <ul class="nav ms-4">
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/applications/kanban.html">
                      <span class="sidenav-mini-icon"> K </span>
                      <span class="sidenav-normal"> Kanban </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/applications/wizard.html">
                      <span class="sidenav-mini-icon"> W </span>
                      <span class="sidenav-normal"> Wizard </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/applications/datatables.html">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> DataTables </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/applications/calendar.html">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Calendar </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link " href="../../../pages/applications/analytics.html">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Analytics </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}
              {{-- <a class="nav-link" href="https://github.com/creativetimofficial/ct-argon-dashboard-pro/blob/main/CHANGELOG.md" target="_blank">
                <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-align-left-2 text-dark text-sm"></i>
                </div>
                <span class="nav-link-text ms-1">Changelog</span>
              </a> --}}
            </li>
          </ul>
        </div>
        <div class="sidenav-footer mx-3 my-3">
          <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-60 mx-auto" src="/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
              <div class="docs-info">
                <h6 class="mb-0">Nesesitas ayuda?</h6>
                <p class="text-xs font-weight-bold mb-0">Por favor contactanos!</p>
              </div>
            </div>
          </div>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Contacto</a>
        </div>
      </aside>

      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg  bg-gray-100">
        @yield('content')
    </main>
    @yield('scripts')

    </div>
</html>
