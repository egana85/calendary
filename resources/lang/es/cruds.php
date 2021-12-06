<?php

return [
    'userManagement' => [
        'title'          => 'Administración de usuarios',
        'title_singular' => 'Administración de usuario',
    ],
    'permission'     => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Titulo',
            'title_helper'      => '',
            'created_at'        => 'Creado',
            'created_at_helper' => '',
            'updated_at'        => 'Actualizado',
            'updated_at_helper' => '',
            'deleted_at'        => 'Borrado',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Titulo',
            'title_helper'       => '',
            'permissions'        => 'Permisos',
            'permissions_helper' => '',
            'created_at'         => 'Creado',
            'created_at_helper'  => '',
            'updated_at'         => 'Actualizado',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Borrado',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nombre',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verificado',
            'email_verified_at_helper' => '',
            'password'                 => 'Contraseña',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Creado',
            'created_at_helper'        => '',
            'updated_at'               => 'Actualizado',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'venue'          => [
        'title'          => 'Salas',
        'title_singular' => 'Sala',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nombre',
            'name_helper'       => '',
            'address'           => 'Ubicación',
            'address_helper'    => '',
            'created_at'        => 'Creado',
            'created_at_helper' => '',
            'updated_at'        => 'Actualizado',
            'updated_at_helper' => '',
            'deleted_at'        => 'Borrado',
            'deleted_at_helper' => '',
        ],
    ],
    'event'          => [
        'title'          => 'Eventos',
        'title_singular' => 'Evento',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nombre',
            'name_helper'       => '',
            'start_time'        => 'Inicio',
            'start_time_helper' => '',
            'end_time'        => 'Termino',
            'end_time_helper' => '',
            'venue'             => 'Sala',
            'venue_helper'      => '',
            'created_at'        => 'Creado',
            'created_at_helper' => '',
            'updated_at'        => 'Actualizado',
            'updated_at_helper' => '',
            'deleted_at'        => 'Borrado',
            'deleted_at_helper' => '',
        ],
    ],
    'meeting'        => [
        'title'          => 'Reuniones',
        'title_singular' => 'Reunión',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'attendees'         => 'Attendees',
            'attendees_helper'  => '',
            'start_time'        => 'Start Time',
            'start_time_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
