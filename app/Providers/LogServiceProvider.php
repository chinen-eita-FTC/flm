<?php
declare(strict_types=1);

namespace App\Providers;

use App\Libraries\CurrentBatchNameContainer;
use Illuminate\Log\LogServiceProvider as ServiceProvider;
use Illuminate\Log\Writer;

/**
 * ログサービスプロバイダのクラス
 *
 * @package App\Services
 */
class LogServiceProvider extends ServiceProvider
{

    private $filePath;

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(app());
        $this->filePath = config('app.log_output');
    }

    /**
     * @param Writer $log 出力されるログ情報
     * @return void
     */
    protected function configureSingleHandler(Writer $log)
    {
        $log->useFiles($this->filePath, $this->logLevel());
    }
}