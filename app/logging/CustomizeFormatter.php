<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\WebProcessor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomizeFormatter
{
    /**
     * ログフォーマット
     */
    private $logFormat = '[(UTC)%datetime% (JST)%extra.localdate%][ID:%extra.userid%][%extra.ip%][%extra.class%@%extra.function%(%extra.line%)][%level_name%] %message% %context%' . PHP_EOL;

    /**
     * 日付フォーマット
     */
    private $dateFormat = 'Y-m-d H:i:s.v';

    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {

        // LineFormatterで出力フォーマット指定
        $formatter = new LineFormatter($this->logFormat, $this->dateFormat, true, true);

        // extra(class,method)
        //{"file":"C:\\path\\to\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Writer.php","line":201,"class":"Illuminate\\Log\\Writer","function":"writeLog"}
        //                              ↓
        //{"file":"C:\\path\\to\\app\\Http\\Controllers\\WelcomeController.php","line":39,"class":"App\\Http\\Controllers\\WelcomeController","function":"index"}}
        $ip = new IntrospectionProcessor(Logger::DEBUG, ['Illuminate\\']);

        // ip address
        $wp = new WebProcessor();

        //それぞれのハンドラーに各設定を設置する。
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter($formatter);
            $handler->pushProcessor($ip);
            $handler->pushProcessor($wp);
            $handler->pushProcessor([$this, 'processLogRecord']);
        }

    }

    /**
     * edit record data
     *
     * @return array
     */

    public function processLogRecord(array $record): array //arrayは戻り値の型
    {
        $userid = 'ログインしていない';
        if (Auth::check()) {
            $userid = Auth::id();
        }

        $record['extra'] += [
            'userid' => $userid,
            'localdate' => Carbon::now('JST')
        ];
        return $record;
    }

    public function test(array $record) {
        return record[0];
    }


}
