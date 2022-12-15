<div class="modal fade" id="modalInfoUser" tabindex="-1" role="dialog" aria-labelledby="modalInfoUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Informacion del Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="card mt-4 mb-3"> --}}
                {{-- <div class="card-body pb-0"> --}}
                <div class="row align-items-center mb-3">
                    <div class="col-9">
                        <h5 class="mb-1">
                            <a href="javascript:;" id="idNomUserInfo"></a>
                        </h5>
                    </div>
                    {{-- <div class="col-3 text-end">
                  <div class="dropstart">
                    <a href="javascript:;" class="text-secondary" id="dropdownDesignCard" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="dropdownDesignCard">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit Team</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Add Member</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">See Details</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Team</a></li>
                    </ul>
                  </div>
                </div> --}}
                </div>
                {{-- <p>Because it's about motivating the doers. Because I’m here to follow my dreams and inspire other people to follow their dreams, too.</p> --}}
                <ul class="list-unstyled mx-auto">
                    <li class="d-flex">
                        <p class="mb-0">Usuario</p>
                        <span class="badge badge-secondary ms-auto" id='UserInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">Permiso</p>
                        <span class="badge badge-secondary ms-auto" id='UserPermisoInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">Puesto</p>
                        <span class="badge badge-secondary ms-auto" id='UserPuestoInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">Email Laboral</p>
                        <span class="badge badge-secondary ms-auto" id='UserEmailInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">Email Personal</p>
                        <span class="badge badge-secondary ms-auto" id='UserEmailDosInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">Contacto</p>
                        <span class="badge badge-secondary ms-auto" id='UserTelInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">CURP</p>
                        <span class="badge badge-secondary ms-auto" id='UserCURPInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                    <li class="d-flex">
                        <p class="mb-0">RFC</p>
                        <span class="badge badge-secondary ms-auto" id='UserRFCInfo'></span>
                    </li>
                    <li>
                        <hr class="horizontal dark">
                    </li>
                </ul>
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-warning" data-bs-dismiss="modal">Cerrar</button>
                {{-- <button type="button" class="btn bg-gradient-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
