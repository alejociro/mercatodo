<?php

return [
    'products' => [
        'fields' => [
            'code' => 'Codigo',
            'name' => 'Nombre',
            'price' => 'Precio',
            'stock' => 'Cantidad',
            'status' => 'Estado',
            'category' => 'Categoría',
            'image' => 'Imagen',
            'images' => 'Imagenes del producto',
            'description' => 'Descripcion',
            'upload image' => 'Cargar imagen',
            'select image' => 'Seleccionar imagen',
            'select category' => 'Seleccione una categoría',
            'export' => 'Exportes',
            'search' => 'Busca aqui...',
            'import' => 'Importes',
            'value' => 'Precio',
            'new' => 'Crear un nuevo producto',
            'delete' => 'Eliminar producto',
            'change status' => 'Cambiar estado',
            'actions' => 'Acciones',
            'top' => 'Productos más Vendidos!',
            'edit' => 'Editar',
            'show' => 'Ver producto',
            'cancel' => 'Cancelar',
            'save' => 'Guardar'
        ],
        'titles' => [
            'title' => 'Tabla de productos',
            'create a product' => 'Crear un producto',
            'edit a product' => 'Editar el producto'
        ]
    ],
    'users' => [
        'fields' => [
            'id' => 'Id',
            'name' => 'Nombre',
            'email' => 'Correo electronico',
            'password' => 'Contraseña',
            'confirm password' => 'Confirmar contraseña',
            'rol' => 'Rol',
            'select rol' => 'Seleccione un rol',
            'cancel' => 'Cancelar',
            'save' => 'Crear usuario',
            'update' => 'Actualizar usuario',
            'change status' => 'Cambiar estado',
            'actions' => 'Acciones',
            'status' => 'Estado',
            'enabled' => 'Activado',
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'disabled' => 'Desactivado desde: ',
            'new' => 'Crear un nuevo usuario',
            'request' => '# de peticion',
            'value' => 'Valor',
            'payer document' => 'Documento del pagador',
            'paid at' => 'Pagado el',
            'exports' => 'Exportes',
            'see payment' => 'Ver factura',
            'surname' => 'Apellido',
            'phone' => 'Celular',
            'document' => 'Documento',
            'graph' => 'Grafica de los pagos',
            'reports' => 'Reportes pagos'
        ],
        'titles' => [
            'create' => 'Crear un usuario',
            'edit' => 'Editar usuario',
            'index' => 'Tabla de usuarios',
            'payments' => 'Pagos de los usuarios',
            'actions' => 'Acciones de los trabajadores'
        ]
    ],
    'categories' => [
        'fields' => [
            'name' => 'Nombre',
            'description' => 'Descripción',
            'categories' => 'Categorias',
            'cancel' => 'Devolverse',
            'save' => 'Crear',
            'edit' => 'Editar',
            'delete' => 'Eliminar categoría',
            'new' => 'Crear una nueva categoría'
        ],
        'titles' => [
            'create' => 'Crear una categoría',
            'edit' => 'Editar una categoría',
            'index' => 'tabla de categorias'
        ]
    ],
    'roles' => [
        'fields' => [
            'name' => 'Nombre del rol',
            'rol' => 'Rol',
            'delete' => 'Elminar rol',
            'permissions' => 'Permisos para el rol',
            'save' => 'Crear rol',
            'actions' => 'Acciones'
        ],
        'titles' => [
            'index' => 'Tabla de roles',
            'create' => 'Crear un rol',
            'edit' => 'Editar el rol'
        ]
    ],
    'export' => [
        'products' => [
            'fields' => [
                'categories' => 'Categorias',
                'price min' => 'Precio mínimo',
                'price max' => 'Precio maxímo',
                'stock min' => 'Stock minimo',
                'stock max' => 'Stock maximo',
                'cancel' => 'Regresar',
                'done' => 'Generar exporte',
            ],
            'titles' => [
                'export' => 'Generar exporte de productos'
            ],
        ],
        'payments' => [
            'fields' => [
                'status' => 'Estado del pago',
                'all' => 'Todos',
                'pending' => 'Pendiente',
                'rejected' => 'Rechazado',
                'successful' => 'Completado',
                'since' => 'Desde',
                'to' => 'Hasta',
                'price min' => 'Precio mínimo',
                'price max' => 'Precio maxímo',
                'done' => 'Generar exporte',
            ],
            'titles' => [
                'payments' => 'Pagos de los usuarios',
            ]
        ]
    ],
    'import' => [
        'fields' => [
            'cancel' => 'Regresar',
            'done' => 'Generar importe',
        ],
        'titles' => [
            'title' => 'Generar importe de productos'
        ]
    ],
    'solds' => [
        'fields' => [
            'graph' => 'Grafica de productos más vendidos'
        ],
        'titles' => [
            'title' => 'Productos más vendidos'
        ]
    ],
    'reports' => [
        'payments' => [
            'fields' => [
                'graph' => 'Grafico de los pagos'
            ],
            'titles' => [
                'payments' => 'Pagos de los usuarios'
            ],
        ]
    ],
    'actions' => [
        'fields' => [
            'name' => 'Nombre',
            'email' => 'Correo electronico',
            'document' => 'Document',
            'rol' => 'Rol',
            'action' => 'Acción',
            'date' => 'Fecha',
            'user' => 'Id usuario'
        ],
        'titles' => [
            'index' => 'Acciones de adminsitración',
            'actions' => 'Reporte de Acciones'
        ],
    ],
];
