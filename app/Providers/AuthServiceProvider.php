<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Novedades
        Gate::define('novedade_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content categories
        Gate::define('content_category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content tags
        Gate::define('content_tag_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content pages
        Gate::define('content_page_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Catalogo
        Gate::define('catalogo_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product categories
        Gate::define('product_category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product tags
        Gate::define('product_tag_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_tag_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_tag_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Products
        Gate::define('product_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Internal notifications
        Gate::define('internal_notification_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Manufacturers
        Gate::define('manufacturer_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('manufacturer_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('manufacturer_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('manufacturer_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('manufacturer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Slideshows
        Gate::define('slideshow_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slideshow_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slideshow_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slideshow_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slideshow_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Eventos
        Gate::define('evento_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('evento_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('evento_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('evento_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('evento_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Settings
        Gate::define('setting_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Pedidos
        Gate::define('pedido_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pedido_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pedido_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pedido_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pedido_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Encuesta
        Gate::define('encuestum_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('encuestum_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('encuestum_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('encuestum_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('encuestum_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Messages
        Gate::define('message_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('message_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('message_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('message_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('message_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Pedidos y consultas
        Gate::define('pedidos_y_consulta_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Inquiries
        Gate::define('inquiry_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('inquiry_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('inquiry_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('inquiry_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('inquiry_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
                // Auth gates for: Subscriptions
        Gate::define('subscription_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscription_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscription_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscription_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscription_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Library
        Gate::define('library_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
  // Auth gates for: Library categories
        Gate::define('library_category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Library items
        Gate::define('library_item_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_item_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_item_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_item_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('library_item_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
