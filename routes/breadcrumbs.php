<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Dashboard', route('admin.home'));
});
