<?php

/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 2:08 PM
 */
class Produto
{

    private $db;
    private $id;
    private $nome;
    private $unidade;
    private $fornecedor;
    private $fornecedorId;

    public function __construct(ConexaoInterface $conexao)
    {
        $this->db = $conexao->connect();
    }

    public function listar(){
        $query = "SELECT p.id, p.nome, p.unidade, p.id_fornecedor, f.nome as fornecedor_nome FROM produto p LEFT JOIN fornecedor f ON p.id_fornecedor = f.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function inserir(){
        $query = "INSERT INTO produto (nome, unidade, id_fornecedor) VALUES ('{$this->nome}','{$this->unidade}', {$this->fornecedorId})";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function alterar(){
        $query = "UPDATE produto SET nome = '{$this->nome}', unidade = '{$this->unidade}', id_fornecedor = {$this->fornecedorId} WHERE id = {$this->id} ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->get();
    }

    public function excluir(){
        $query = "DELETE FROM produto WHERE id = {$this->id} ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function get(){

        $query = "SELECT p.nome, p.unidade, p.id_fornecedor, f.nome as fornecedor_nome, f.id as fornecedor_id FROM produto p LEFT JOIN fornecedor f ON p.id_fornecedor = f.id WHERE p.id = {$this->getId()}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch();


        $this->setNome($resultado['nome']);
        $this->setUnidade($resultado['unidade']);
        $this->setFornecedor($resultado['fornecedor_nome']);
        $this->setFornecedorId($resultado['fornecedor_id']);

        return $resultado;
    }

    /**
     * @return mixed
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * @param mixed $unidade
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
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
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * @param mixed $fornecedor
     */
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    /**
     * @return mixed
     */
    public function getFornecedorId()
    {
        return $this->fornecedorId;
    }

    /**
     * @param mixed $fornecedorId
     */
    public function setFornecedorId($fornecedorId)
    {
        $this->fornecedorId = $fornecedorId;
    }



}