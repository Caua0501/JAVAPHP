CREATE TABLE usuarios (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_usuario)
);

CREATE TABLE pedidos (
    id_pedido INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    produto VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
);
CREATE TABLE produtos (
    id_produto INT NOT NULL AUTO_INCREMENT,
    nome_produto VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_produto)
);

CREATE TABLE categorias (
    id_categoria INT NOT NULL AUTO_INCREMENT,
    nome_categoria VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_categoria)
);
CREATE TABLE clientes (
    id_cliente INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_cliente)
);
CREATE TABLE vendas (
    id_venda INT NOT NULL AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    produto_vendido VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_venda),
    FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);



