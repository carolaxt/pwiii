
CREATE SCHEMA IF NOT EXISTS `ETIMPWIIIproduto` DEFAULT CHARACTER SET utf8 ;
USE `ETIMPWIIIproduto` ;

CREATE TABLE IF NOT EXISTS `ETIMPWIIIproduto`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(100) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ETIMPWIIIproduto`.`imagens` (
  `idimagens` INT NOT NULL AUTO_INCREMENT,
  `nome_imagem` VARCHAR(100) NOT NULL,
  `produto_idproduto` INT NOT NULL,
  PRIMARY KEY (`idimagens`, `produto_idproduto`),
  INDEX `fk_imagens_produto_idx` (`produto_idproduto` ASC),
  CONSTRAINT `fk_imagens_produto`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `ETIMPWIIIproduto`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

