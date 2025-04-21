## Automatic Relation Loading (Laravel 12.8.0+)

このプロジェクトでは、Laravel 12.8.0で導入された自動リレーションロード機能を試しています。

### 機能概要

EloquentモデルがJSONなどにシリアライズされる際に、アクセスされたリレーションシップを自動的にEager Loadingする機能です。
これにより、コントローラー等で `with()` を明示的に指定しなくても、N+1問題を自動的に回避できます。

### 有効化方法

`app/Providers/AppServiceProvider.php` の `boot` メソッド内で以下のコードを呼び出すことで有効になります。

```php
use Illuminate\Database\Eloquent\Model;

// ...

public function boot(): void
{
    Model::automaticallyEagerLoadRelationships();
}
```

### 確認方法

例えば、リソースクラス (`app/Http/Resources/PostResource.php` など) でリレーション (`$this->comments`) にアクセスしている場合、コントローラー (`app/Http/Controllers/Api/UserController.php`) で `with('comments')` を記述していなくても、APIレスポンスにはコメントが含まれ、かつN+1問題は発生しません。

Laravel TelescopeのQueriesタブなどで発行されるクエリを確認すると、Eager Loadingが適切に行われていることが分かります。

### 参考

*   [Laravel News - Automatic Relation Loading (Laravel 12.8.0)](https://laravel-news.com/laravel-12-8-0#content-automatic-relation-loading)
