<?php
    require_once "Conexao.class.php";
    class Disciplina{
        private $nome;
        private $cargaHoraria;
        private $ementa;

        public function exibirDados(){
            echo "<br />";
            echo "O nome da ". __CLASS__ ." é ". $this->nome;
            echo "<br />";
            echo "A carga Horaria da ". __CLASS__ ." é ". $this->cargaHoraria;
            echo "<br />";
            echo "A ementa da ".__CLASS__." é ". $this->ementa;
        }

        public function __construct($nome, $cargaHoraria, $ementa){
            $this->nome = $nome;
            $this->cargaHoraria = $cargaHoraria;
            $this->ementa = $ementa;
            echo "<br />classe criada...";
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function inserirDisciplina()
        {
            $cn = new Conexao(); //Variável de conexão
            $conexaoBanco = $cn->getInstance();

            $stmt = $conexaoBanco->prepare("INSERT INTO disciplina VALUES (:nome, :cargaHoraria, :ementa)"); //:variavel dois pontos equivale a variável
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cargaHoraria', $this->cargaHoraria);
            $stmt->bindParam(':ementa', $this->ementa);

            $resultado = $stmt->execute();

            if(!$resultado){
                echo "<br /> Erro, não foi possível inserir a disciplina.";
                exit;
            }
            echo "<br /> Disciplina inserida com sucesso!";
        }
        
    }