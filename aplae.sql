CREATE DATABASE aplae;

USE aplae;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `sobrenome` varchar(25) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `organizacao` varchar(50) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(512) NOT NULL,
  `chave` varchar(512) NOT NULL
)

INSERT INTO `users` (`id`, `nome`, `sobrenome`, `telefone`, `organizacao`, `email`, `senha`, `chave`) VALUES
(4, 'Andre', 'Muniz', '(11) 9 5706-5555', 'Pedro', 'pholiveira.2001@gmail.com', '$2y$10$xKwWzs6ANR5wN4Xz/yEbvOrv./eIYLFLw1pdaSMNx6qi0bz4kqDpm', '$2y$10$9CQJFGIYT6dZd6nUY0z/ueDvwHGdEscK8TWevZrwZ/1/I8N0wDtyu');


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
