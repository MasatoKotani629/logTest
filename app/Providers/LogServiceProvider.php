<!-- <?php

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

// class LogServiceProvider extends ServiceProvider
// {
//     /**
//      * Register services.
//      *
//      * @return void
//      */
//     public function register()
//     {
//         //
//     }

//     /**
//      * Bootstrap services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//         //
//     }
// }


// namespace App\Providers;

// use InvalidArgumentException;
// use Illuminate\Log\LogServiceProvider AS BaseLogServiceProvider;
// use Illuminate\Log\Writer;
// use Monolog\Logger AS MonologLogger;
// use Monolog\Processor\IntrospectionProcessor;
// use Monolog\Handler\StreamHandler;
// use Monolog\Handler\RotatingFileHandler;
// use Hikaeme\Monolog\Formatter\LtsvFormatter;

// class LogServiceProvider extends BaseLogServiceProvider
// {
//     /**
//      * The Log levels.
//      * ※「Illuminate\Log\Writer」から移植
//      *
//      * @var array
//      */
//     protected $levels = [
//         'debug'     => MonologLogger::DEBUG,
//         'info'      => MonologLogger::INFO,
//         'notice'    => MonologLogger::NOTICE,
//         'warning'   => MonologLogger::WARNING,
//         'error'     => MonologLogger::ERROR,
//         'critical'  => MonologLogger::CRITICAL,
//         'alert'     => MonologLogger::ALERT,
//         'emergency' => MonologLogger::EMERGENCY,
//     ];

//     /**
//      * singleモードの出力
//      *
//      * @param  \Illuminate\Log\Writer $log
//      * @return void
//      * @throws \Exception
//      */
//     protected function configureSingleHandler(Writer $log)
//     {
//         // コメントアウト (フォーマットが変更できない)
//         #$log->useFiles(
//         #    $this->app->storagePath().'/logs/laravel.log',
//         #    $this->logLevel()
//         #);

//         $monolog = $log->getMonolog();

//         // フォーマット変更 (LTSV形式)
//         $monolog->pushHandler(
//             $handler = new StreamHandler(
//                 $this->path().$this->file(),
//                 $this->parseLevel($this->logLevel())
//             )
//         );
//         $handler->setFormatter(new LtsvFormatter());

//         // ログ追加 (ファイル名、行番号、クラス名、メソッド名)
//         $monolog->pushProcessor(
//             new IntrospectionProcessor(MonologLogger::DEBUG, ['Monolog\\', 'Illuminate\\',])
//         );
//     }

//     /**
//      * 日付ローテートモードでの出力
//      *
//      * @param  \Illuminate\Log\Writer $log
//      * @return void
//      * @throws \Exception
//      */
//     protected function configureDailyHandler(Writer $log)
//     {
//         // コメントアウト (フォーマットが変更できない)
//         #$log->useDailyFiles(
//         #    $this->app->storagePath().'/logs/laravel.log', $this->maxFiles(),
//         #    $this->logLevel()
//         #);

//         $monolog = $log->getMonolog();

//         // フォーマット変更 (LTSV形式)
//         $monolog->pushHandler(
//             $handler = new RotatingFileHandler(
//                 $this->path().$this->file(),
//                 $this->maxFiles(),
//                 $this->parseLevel($this->logLevel())
//             )
//         );
//         $handler->setFormatter(new LtsvFormatter());

//         // ログ追加 (ファイル名、行番号、クラス名、メソッド名)
//         $monolog->pushProcessor(
//             new IntrospectionProcessor(MonologLogger::DEBUG, ['Monolog\\', 'Illuminate\\',])
//         );
//     }

//     /**
//      * ログ出力先
//      *
//      * @return string
//      */
//     private function path(): string
//     {
//         return env('APP_LOG_DIR', $this->app->storagePath().'/logs/');
//     }

//     /**
//      * ファイル名
//      *
//      * @return string
//      */
//     private function file(): string
//     {
//         return 'laravel.log';
//     }

//     /**
//      * Parse the string level into a Monolog constant.
//      * ※「Illuminate\Log\Writer」から移植
//      *
//      * @param  string  $level
//      * @return int
//      *
//      * @throws \InvalidArgumentException
//      */
//     protected function parseLevel($level): int
//     {
//         if (isset($this->levels[$level])) {
//             return $this->levels[$level];
//         }

//         throw new InvalidArgumentException('Invalid log level.');
//     }
// } -->
