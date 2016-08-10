CREATE SCHEMA diservice;

CREATE TABLE `diservice`.`fornecedor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `diservice`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `unidade` VARCHAR(45) NULL,
  `id_fornecedor` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_id_fornecedor_idx` (`id_fornecedor` ASC),
  CONSTRAINT `fk_id_fornecedor`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `diservice`.`fornecedor` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL);


INSERT INTO `diservice`.`fornecedor` (`nome`, `email`) VALUES ('welton', 'welton@teste.com');
INSERT INTO `diservice`.`fornecedor` (`nome`, `email`) VALUES ('code education', 'code@education.com');


INSERT INTO `diservice`.`produto` (`nome`, `unidade`, `id_fornecedor`) VALUES ('curso', 'local', '2');
INSERT INTO `diservice`.`produto` (`nome`, `unidade`, `id_fornecedor`) VALUES ('video aula', 'local', '2');
INSERT INTO `diservice`.`produto` (`nome`, `unidade`, `id_fornecedor`) VALUES ('aluno', 'geral', '1');
