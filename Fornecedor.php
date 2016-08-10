<?php

/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 2:08 PM
 */
class Fornecedor
{
    private $db;
    private $id;
    private $nome;
    private $email;

    public function __construct(ConexaoInterface $conexao)
    {
        $this->db = $conexao->connect();
    }

    public function listar(){
        $query = "SELECT * FROM fornecedor";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir(){
        $query = "INSERT INTO fornecedor (nome, email) VALUES ('{$this->nome}','{$this->email}')";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function alterar(){
        $query = "UPDATE fornecedor SET nome = '{$this->nome}', email = '{$this->email}' WHERE id = {$this->id} ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->get();
    }

    public function excluir(){
        $query = "DELETE FROM fornecedor WHERE id = {$this->id} ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function get(){

        $query = "SELECT * FROM fornecedor WHERE id = {$this->getId()}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch();

        $this->setNome($resultado['nome']);
        $this->setEmail($resultado['email']);

        return $resultado;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }




}