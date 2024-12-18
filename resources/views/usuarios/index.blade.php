@extends('layouts.app')
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background: #cad2da;">
                    <!--begin::Card header-->
                    <div class="card-header pt-10">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <i class="ki-duotone ki-user fs-2x text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Usuarios</h2>
                                <div class="text-muted fw-bold">
                                    Usuarios<span class="mx-3">({{ $usuarios->count() }})</span> <span class="mx-3">
                                </div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pb-1">
                    
				</div>
				<!--end::Card body-->
			</div>
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Buscar usuario" />
                            		
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i>Crear Usuario</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-gray-900 fw-bold">Filtros</div>
                                    </div>
                                    
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Restaurar</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Aplicar</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--end::Modal - New Card-->
							@include('usuarios.crear')
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Nombre</th>
                                    <th class="min-w-100px">Nombre de Usuario</th>
                                    <th class="min-w-100px">Email</th>
                                    <th class="min-w-100px">Fecha de creacion</th>
                                    <th class="text-end min-w-100px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="#">
                                                <div class="symbol-label">
                                                    <img src="https://ui-avatars.com/api/?name={{ $usuario->nombre}}" alt="Tu imagen de perfil" class="w-100" />
                                        			
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <span class="text-gray-800 text-hover-primary mb-1">{{ $usuario->nombre }}</span>
                                            <span>{{ $usuario->correo }}</span>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <td>
                                        <span>{{ $usuario->nombre_usuario }}</span>
                                    </td>
                                   <td>{{ $usuario->email ?? 'No disponible' }}</td>
                                    <td>
                                        <span>{{ $usuario->created_at }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acciones <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" style="display: flex; align-content: center; justify-content: center; align-items: center;">
                                                <a href="#" class="btn btn-warning px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $usuario->id }}">Editar</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" style="display: flex; align-content: center; justify-content: center; align-items: center;">
                                               <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" style="display:inline;">
            									@csrf
            									@method('DELETE')
            									<button type="submit" class="btn btn-danger px-3" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
        									   </form>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                        
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <div class="px-3">
            {{ $usuarios->links('pagination::bootstrap-4') }}
			</div>
            </div>
            <!--end::Content container-->
            
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    @foreach($usuarios as $usuario)
    	@include('usuario.editar', [$usuario])
    @endforeach
</div>
@endsection
<!-- <a href="#" class="badge badge-light-primary fs-7 m-1">Administrador</a>
                                        <a href="#" class="badge badge-light-danger fs-7 m-1">Desarrollo</a>
                                        <a href="#" class="badge badge-light-success fs-7 m-1">Analista</a>
                                        <a href="#" class="badge badge-light-info fs-7 m-1">Soporte</a> -->