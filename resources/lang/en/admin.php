<?php
return [
    'products' => [
        'fields' => [
            'code' => 'Code',
            'name' => 'Name',
            'price' => 'Price',
            'stock' => 'Quantity',
            'status' => 'Status',
            'category' => 'Category',
            'image' => 'Image',
            'images' => 'Images of the product',
            'description' => 'Description',
            'upload image' => 'Upload image',
            'select image' => 'Select image',
            'select category' => 'Select category',
            'export' => 'Exports',
            'search' => 'Search here...',
            'import' => 'Imports',
            'new' => 'Create a product',
            'delete' => 'Delete product',
            'change status' => 'Change status',
            'actions' => 'Actions',
            'top' => 'Products!',
            'edit' => 'Edit',
            'show' => 'Show product',
            'cancel' => 'Cancel',
            'save' => 'Save'
        ],
        'titles' => [
            'title' => 'Table of products',
            'create a product' => 'Create a product',
            'edit a product' => 'Edit a product'
        ]
    ],
    'users' => [
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirm password' => 'Confirm password',
            'rol' => 'Role',
            'select rol' => 'Select a role',
            'cancel' => 'Cancel',
            'save' => 'Create user',
            'update' => 'Update user',
            'change status' => 'Change status',
            'actions' => 'Actions',
            'status' => 'Status',
            'enabled' => 'Active',
            'edit' => 'Edit',
            'delete' => 'Deleted',
            'disabled' => 'Disabled since: ',
            'new' => 'Create a new user',
            'request' => '# of Request',
            'value' => 'Value',
            'payer document' => 'Payer document',
            'paid at' => 'Paid at',
            'exports' => 'Exports',
            'see payment' => 'Show payment',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'document' => 'Document'
        ],
        'titles' => [
            'create' => 'Create an user',
            'edit' => 'Edit an user',
            'index' => 'Table of users',
            'payments' => 'Payments of the users',
        ]
    ],
    'categories' => [
        'fields' => [
            'name' => 'Name',
            'description' => 'Description',
            'categories' => 'Categories',
            'cancel' => 'Cancel',
            'save' => 'Create',
            'edit' => 'Edit',
            'delete' => 'Delete category',
            'new' => 'Create a new category'
        ],
        'titles' => [
            'create' => 'Create a category',
            'edit' => 'Edit a category',
            'index' => 'Table of the categories'
        ]
    ],
    'roles' => [
        'fields' => [
            'name' => 'Name of the role',
            'rol' => 'Role',
            'delete' => 'Delete role',
            'permissions' => 'Permissions for the role',
            'save' => 'Create role',
            'actions' => 'Actions'
        ],
        'titles' => [
            'index' => 'Table of the roles',
            'create' => 'Create a role',
            'edit' => 'Edit a role'
        ]
    ],
    'export' => [
        'products' => [
            'fields' => [
                'categories' => 'Categories',
                'price min' => 'Price min',
                'price max' => 'Price max',
                'stock min' => 'Stock min',
                'stock max' => 'Stock max',
                'cancel' => 'Back',
                'done' => 'Generate export',
            ],
            'titles' => [
                'export' => 'Generate export of products'
            ],
        ],
        'payments' => [
            'fields' => [
                'status' => 'Status of the payment',
                'all' => 'All',
                'pending' => 'Pending',
                'rejected' => 'Rejected',
                'successful' => 'Successful',
                'since' => 'Since',
                'to' => 'Hasta',
                'price min' => 'Price min',
                'price max' => 'Price max',
                'done' => 'Generate export',
            ],
            'titles' => [

            ]
        ]
    ],
    'import' => [
        'fields' => [
            'cancel' => 'Cancel',
            'done' => 'Generate import',
        ],
        'titles' => [
            'title' => 'Do import of products'
        ]
    ],
    'solds' => [
        'fields' => [
            'graph' => 'Chart of best selling products'
        ],
        'titles' => [
            'title' => 'Best selling products'
        ]
    ],
];
