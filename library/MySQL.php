<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.01.2019
 * Time: 19:50
 */
class MySQL
{
    const DB_NAME = "veles_mag";

    /**
     * Ссылка на подключение к БД
     * @var null
     */
    private $db = null;

    /**
     * MySQL constructor.
     */
    public function __construct($db = null, $host = "localhost", $user = "root", $pass = "")
    {
        if (!$db) $db = self::DB_NAME;
        $this->db = new mysqli($host, $user, $pass, $db);
        if ($this->db->connect_errno) {
            exit("Ошибка !!! " . $this->db->connect_error);
        }
        $this->db->set_charset("utf8");
    }

    /**
     * Запрос SELECT к БД
     * @param string        $table      имя таблицы
     * @param string        $fields     выбираемые поля
     * @param string|null   $where      условие выборки
     * @param string|null   $sort       сортировка
     * @param string|null   $limit      лимит
     * @return array|bool
     */
    protected function select($table, $fields = "*", $where = null, $sort = null, $limit = null)
    {
        $query = "SELECT {$fields} FROM {$table}";
        if ($where) {
            $query .= " WHERE {$where}";
        }
        if ($sort) {
            $query .= " ORDER BY {$sort}";
        }
        if ($limit) {
            $query .= " LIMIT {$limit}";
        }

        return $this->query($query);
    }

    /**
     * Запрос DELETE к БД
     * @param string        $table      имя таблицы
     * @param string|null   $where      условие выборки
     * @param string|null   $sort       сортировка
     * @param string|null   $limit      лимит
     * @return bool
     */
    protected function delete($table, $where = null, $sort = null, $limit = null)
    {
        $query = "DELETE FROM {$table}";
        if ($where) {
            $query .= " WHERE {$where}";
        }
        if ($sort) {
            $query .= " ORDER BY {$sort}";
        }
        if ($limit) {
            $query .= " LIMIT {$limit}";
        }
        return $this->query($query);
    }

    /**
     * Запрос UPDATE к БД
     * @param string        $table      имя таблицы
     * @param array         $fields     изменяемые поля
     * @param string|null   $where      условие выборки
     * @param string|null   $sort       сортировка
     * @param string|null   $limit      лимит
     * @return bool
     */
    protected function update($table, $fields, $where = null, $sort = null, $limit = null)
    {
        $query = "UPDATE {$table} SET {$this->arrToStr($fields)}";
        if ($where) {
            $query .= " WHERE {$where}";
        }
        if ($sort) {
            $query .= " ORDER BY {$sort}";
        }
        if ($limit) {
            $query .= " LIMIT {$limit}";
        }
        return $this->query($query);
    }

    /**
     * Запрос INSERT к БД
     * @param string        $table      имя таблицы
     * @param array         $fields     вставляемые поля
     * @return bool
     */
    protected function insert($table, $fields)
    {
        $query = "INSERT INTO `{$table}` SET {$this->arrToStr($fields)}";
        return $this->query($query);
    }

    /**
     * Делает запрос к БД
     * @param string    $query  Запрос SQL
     * @return array|bool
     */
    private function query($query)
    {
        $res = $this->db->query($query);
        if ($res === false) {
            return false;
        } elseif ($res === true) {
            return true;
        } else {
            $result = array();
            while ($row = $res->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }
    }

    /**
     * Формирует строку полей в запросах вставки/обновления
     * @param array $arr    массив полей
     * @return string
     */
    private function arrToStr($arr)
    {
        $result = array();
        foreach ($arr as $k => $v) {
            $result[] = "`{$k}` = " . (($v === null) ? "NULL" : "'{$v}'");
        }
        return implode(", ", $result);
    }

}