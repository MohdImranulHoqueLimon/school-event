<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});


// Admin Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admin', route('dashboard'));
});

//Users
Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Users', route('users.index'));
});

Breadcrumbs::register('users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Create', route('users.create'));
});

Breadcrumbs::register('users.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Edit', route('users.edit', 0));
});

Breadcrumbs::register('users.show', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Details', route('users.show', 0));
});

//Testimonial
Breadcrumbs::register('testimonials.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Testimonials', route('testimonials.index'));
});

Breadcrumbs::register('testimonial.create', function ($breadcrumbs) {
    $breadcrumbs->parent('testimonials.index');
    $breadcrumbs->push('Create', route('testimonial.create'));
});

Breadcrumbs::register('testimonial.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('testimonials.index');
    $breadcrumbs->push('Edit/Update', route('testimonial.create'));
});

Breadcrumbs::register('testimonial.show', function ($breadcrumbs) {
    $breadcrumbs->parent('testimonials.index');
    $breadcrumbs->push('Details', route('testimonial.show', 0));
});

//News
Breadcrumbs::register('news.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('News', route('news.index'));
});

Breadcrumbs::register('news.create', function ($breadcrumbs) {
    $breadcrumbs->parent('news.index');
    $breadcrumbs->push('Create', route('news.create'));
});

Breadcrumbs::register('news.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('news.index');
    $breadcrumbs->push('Edit/Update', route('news.create'));
});

Breadcrumbs::register('news.show', function ($breadcrumbs) {
    $breadcrumbs->parent('news.index');
    $breadcrumbs->push('Details', route('news.show', 0));
});

//Roles
Breadcrumbs::register('roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Roles', route('roles.index'));
});

Breadcrumbs::register('roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Create', route('roles.create'));
});

Breadcrumbs::register('roles.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Edit', route('roles.edit', 0));
});

Breadcrumbs::register('roles.show', function ($breadcrumbs) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Details', route('roles.show', 0));
});

//Permissions
Breadcrumbs::register('permissions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Permissions', route('permissions.index'));
});

Breadcrumbs::register('permissions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push('Create', route('roles.create'));
});

Breadcrumbs::register('permissions.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push('Edit', route('permissions.edit', 0));
});

Breadcrumbs::register('permissions.show', function ($breadcrumbs) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push('Details', route('permissions.show', 0));
});

//Employee
Breadcrumbs::register('employees.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Employees', route('employees.index'));
});

Breadcrumbs::register('employees.create', function ($breadcrumbs) {
    $breadcrumbs->parent('employees.index');
    $breadcrumbs->push('Create', route('employees.create'));
});

Breadcrumbs::register('employees.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('employees.index');
    $breadcrumbs->push('Edit/Update', route('employees.create'));
});

Breadcrumbs::register('employees.show', function ($breadcrumbs) {
    $breadcrumbs->parent('employees.index');
    $breadcrumbs->push('Details', route('employees.show', 0));
});

//Refill
Breadcrumbs::register('refills.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Refill', route('refills.index'));
});

Breadcrumbs::register('refills.create', function ($breadcrumbs) {
    $breadcrumbs->parent('refills.index');
    $breadcrumbs->push('Create', route('refills.create'));
});

Breadcrumbs::register('refills.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('refills.index');
    $breadcrumbs->push('Edit/Update', route('refills.create'));
});

Breadcrumbs::register('refills.show', function ($breadcrumbs) {
    $breadcrumbs->parent('refills.index');
    $breadcrumbs->push('Details', route('refills.show', 0));
});

//Provision
Breadcrumbs::register('provisions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Provision', route('provisions.index'));
});

Breadcrumbs::register('provisions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('provisions.index');
    $breadcrumbs->push('Create', route('provisions.create'));
});

Breadcrumbs::register('provisions.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('provisions.index');
    $breadcrumbs->push('Edit/Update', route('provisions.create'));
});

Breadcrumbs::register('provisions.show', function ($breadcrumbs) {
    $breadcrumbs->parent('provisions.index');
    $breadcrumbs->push('Details', route('provisions.show', 0));
});
