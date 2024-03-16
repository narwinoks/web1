<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Dashboard', route('admin.home'));
});
Breadcrumbs::for('admin.booking', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Booking', route('admin.booking'));
});
Breadcrumbs::for('admin.image', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Image', route('admin.image'));
});
