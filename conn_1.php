<?php

class Conn
{

    private static $_instance;

    private $_conn;

    private function __construct ()
    {
        $this->conectar();
    }

    private function conectar ()
    {
        // dados para a conexão com o banco de dados
        $servidor = 'localhost';
        $usuario = 'usuario_banco';
        $senha = 'senha_banco';
        $banco = 'nome_banco';

        // executa conexao com o mysql
        $this->_conn = mysql_connect($servidor, $usuario, $senha) or die('Erro banco: ' . mysql_error());

        // seleciona o banco
        mysql_select_db($banco);

        // Evitar caracteres especiais e problemas de insert nas tabelas BD
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    }

    public static function instance ()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new Conn();
        }
        return self::$_instance;
    }
	
	public function query($sql)
    {
        $result = mysql_query($sql, $this->_conn);

        if (! $result) {
            die('Erro query (' . $sql . '): ' . mysql_error());
        }

        $list = array();

        while($row = mysql_fetch_assoc($result)){
        	$list[] = $row;
        }

        mysql_free_result($result);

        return $list;
    }

    public function queryNoResult ($sql)
    {
        $result = mysql_query($sql, $this->_conn);

        if (! $result) {
            die('Erro query (' . $sql . '): ' . mysql_error());
        }
    }
	
	public function queryNum($sql)
    {
        $result = mysql_query($sql, $this->_conn);

        if (! $result) {
            die('Erro query (' . $sql . '): ' . mysql_error());
        }
		return $result;
    }
	
	public function queryA($res){
		$total = mysql_result($res, 0, 'total');
		//limpa a consulta na memória
		mysql_free_result($res);
		return $total;
	}
}

?>