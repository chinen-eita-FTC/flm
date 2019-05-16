<?php
declare(strict_types=1);

namespace App\Libraries;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

/**
 * 外部の書籍検索APIから取得した情報をサービスレイヤに提供するクラス
 *
 * @package App\Libraries
 */
class BookGateway
{

    /**
     * @var Client Httpクライアント
     */
    private $client;

    /**
     * @var Client Httpクライアント
     */
    private $baseUrl;

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = env('BOOK_API_BASE_URL');
    }

    /**
     * ISBNコードを指定して書籍検索を行う。
     *
     * @param string $isbn ISBNコード
     * @return Collection
     */
    public function getBookByIsbn(string $isbn): Collection
    {
        $url = $this->baseUrl.'volumes';
        $jsonResult = $this->client->get($url,['query' => $this->composeQueryByIsbn($isbn)])->getBody()->getContents();
        $result = json_decode($jsonResult);
        if($result->totalItems === 1){
            return collect($result->items)->pluck('volumeInfo');
        }
        return collect([]);
    }

    /**
     * ISBNコードを指定したときのクエリパラメータを配列形式で生成する。
     * @todo [v1.0 リファクタリング]  外部API呼び出しのクエリパラメータはISBN項目以外は固定項目のため定数化を行うこと
     * 
     * @return array ISBNコードを指定したときのクエリパラメータ
     */
    private function composeQueryByIsbn(string $isbn): array
    {
        
        return [
            'country' => 'JP',
            'projection' => 'lite',
            'q' => 'isbn:' . $isbn
        ];
    }
}