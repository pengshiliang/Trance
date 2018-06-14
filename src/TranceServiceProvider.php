<?php

namespace Trance;

use Illuminate\Support\ServiceProvider;

class TranceServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = false; // 延迟加载服务
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentPath = $this->path('resources/views');
        $configPath = $this->path('config/trance.php');
        $this->loadViewsFrom($currentPath, 'Trance'); // 视图目录指定
        $this->publishes([
            $currentPath => base_path('resources/views/vendor/trance'),  // 发布视图目录到resources 下
            $configPath => config_path('trance.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('trance', function ($app) {
            return new Trance();
        });
    }

    private function path($path = '')
    {
        return __DIR__ . '/../../' . $path;
    }
}
