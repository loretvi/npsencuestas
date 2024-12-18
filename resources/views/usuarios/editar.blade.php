<div class="modal fade" id="kt_modal_edit_{{ $usuario->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Editar</h2>
                <div class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
           <form id="kt_modal_add_user_form" action="{{ route('usuario.update', $usuario->id) }}" class="form" method="POST">
    @csrf        
    @method('PUT')
    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control  mb-3 mb-lg-0 form-control-solid" placeholder="Nombre completo" value="{{ $usuario->nombre }}" required/>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Nombre de usuario</label>
            <input type="text" name="nombre:usuario" class="form-control  mb-3 mb-lg-0 form-control-solid" placeholder="Nombre de usuario" value="{{ $usuario->nombre_usuario }}" required/>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Correo electrónico</label>
            <input type="email" name="email" class="form-control  mb-3 mb-lg-0 form-control-solid" placeholder="ejemplo@ejemplo.com" value="{{ $usuario->email }}" required/>
        </div>
         <div class="fv-row mb-7">
             <label class="required fw-semibold fs-6 mb-2">Contraseña</label>
             <input type="password"  id="contraseña" name="contraseña" required minlength="4" class="form-control  mb-3 mb-lg-0 form-control-solid" placeholder="" value="" />
         </div>
       
    </div>
    <div class="text-center pt-10">
        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
            <span class="indicator-label">Guardar</span>
            <span class="indicator-progress">Espera porfavor...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>