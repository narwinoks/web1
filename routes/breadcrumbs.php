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
Breadcrumbs::for('admin.pricelist', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Pricelist', route('admin.pricelist'));
});
Breadcrumbs::for('admin.qa', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('QA', route('admin.qa'));
});
Breadcrumbs::for('admin.review', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Review', route('admin.review'));
});
Breadcrumbs::for('admin.banner', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Banner', route('admin.banner'));
});
Breadcrumbs::for('admin.products', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Product', route('admin.products'));
});
Breadcrumbs::for('admin.productAdd', function ($trail) {
    $trail->parent('admin.products');
    $trail->push('Add Product', route('admin.productAdd'));
});
Breadcrumbs::for('admin.productEdit', function ($trail, $author) {
    $trail->parent('admin.products');
    $trail->push('Edit Product', route('admin.productEdit', $author));
});
Breadcrumbs::for('admin.order', function ($trail) {
    $trail->parent('admin.products');
    $trail->push('Order', route('admin.order'));
});
Breadcrumbs::for('account.profile', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Profile', route('account.profile'));
});
Breadcrumbs::for('admin.plRequest', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Pl Request', route('admin.plRequest'));
});
Breadcrumbs::for('admin.bank', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Bank', route('admin.bank'));
});
