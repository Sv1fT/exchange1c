<?php

namespace Sv1fT\Exchange1C\Services;

class SaleService extends AbstractService
{

    /**
     * Начало сеанса
     * Выгрузка данных начинается с того, что система "1С:Предприятие" отправляет http-запрос следующего вида:
     * http://<сайт>/<путь> /1c-exchange?type=catalog&mode=checkauth.
     * В ответ система управления сайтом передает системе «1С:Предприятие» три строки (используется разделитель строк "\n"):
     * - слово "success";
     * - имя Cookie;
     * - значение Cookie.
     * Примечание. Все последующие запросы к системе управления сайтом со стороны "1С:Предприятия" содержат в заголовке запроса имя и значение Cookie.
     *
     * @return string
     */
    public function checkauth(): string
    {
        return $this->authService->checkAuth();
    }

    /**
     * Запрос параметров от сайта
     * Далее следует запрос следующего вида:
     * http://<сайт>/<путь> /1c-exchange?type=catalog&mode=init
     * В ответ система управления сайтом передает две строки:
     * 1. zip=yes, если сервер поддерживает обмен
     * в zip-формате -  в этом случае на следующем шаге файлы должны быть упакованы в zip-формате
     * или zip=no - в этом случае на следующем шаге файлы не упаковываются и передаются каждый по отдельности.
     * 2. file_limit=<число>, где <число> - максимально допустимый размер файла в байтах для передачи за один запрос.
     * Если системе "1С:Предприятие" понадобится передать файл большего размера, его следует разделить на фрагменты.
     *
     * @return string
     */
    public function init(): string
    {
        $this->authService->auth();
        $this->loaderService->clearImportDirectory();
        $zipEnable = function_exists('zip_open') && $this->config->isUseZip();
        $response = 'zip='.($zipEnable ? 'yes' : 'no')."\n";
        $response .= 'file_limit='.$this->config->getFilePart();

        return $response;
    }

    /**
     * Загрузка и сохранение файлов на сервер
     *
     * @return string
     */
    public function file(): string
    {
        $this->authService->auth();

        return $this->loaderService->load();
    }

    public function query()
    {

    }
}