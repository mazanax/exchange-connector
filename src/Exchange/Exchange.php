<?php
declare(strict_types=1);

namespace MZNX\ExchangeConnector\Exchange;

use MZNX\ExchangeConnector\Connection;
use MZNX\ExchangeConnector\Symbol;
use MZNX\ExchangeConnector\WaitResponse;

interface Exchange
{
    /**
     * @param string $symbol
     *
     * @return Symbol
     */
    public static function splitMarketName(string $symbol): Symbol;

    /**
     * @param Connection $connection
     *
     * @return string
     */
    public function auth(Connection $connection): string;

    /**
     * @param Connection $connection
     *
     * @return Exchange
     */
    public function with(Connection $connection): Exchange;

    /**
     * @return bool
     */
    public function authenticated(): bool;

    /**
     * @deprecated
     *
     * @param Symbol $symbol
     * @param string $interval
     * @param int $limit
     *
     * @return array
     */
    public function candles(Symbol $symbol, string $interval, int $limit): array;

    /**
     * @return array
     */
    public function wallet(): array;

    /**
     * @param int $limit
     *
     * @return WaitResponse|array
     */
    public function orders(int $limit = 10);

    /**
     * @param Symbol $symbol
     * @param $id
     *
     * @return array
     */
    public function orderInfo(Symbol $symbol, $id): array;

    /**
     * @param Symbol $symbol
     * @param int $limit
     *
     * @return array
     */
    public function ordersBySymbol(Symbol $symbol, int $limit = 10): array;

    /**
     * @param string $side
     * @param Symbol $symbol
     * @param float $price
     * @param float $qty
     *
     * @return string
     */
    public function createOrder(string $side, Symbol $symbol, float $price, float $qty): string;

    /**
     * @param Symbol|int $symbolOrId
     *
     * @return bool
     */
    public function cancelOrder($symbolOrId): bool;

    /**
     * @param Symbol $symbol
     *
     * @return array
     */
    public function openOrders(Symbol $symbol): array;

    /**
     * @return array
     */
    public function deposits(): array;

    /**
     * @return array
     */
    public function withdrawals(): array;

    /**
     * @param Symbol $symbol
     * @param int $depth
     *
     * @return array
     */
    public function market(Symbol $symbol, int $depth = 10): array;

    /**
     * @return array
     */
    public function symbols(): array;
}