
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `email3` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `fid` varchar(255) DEFAULT NULL,
  `gid` varchar(20) DEFAULT NULL,
  `social` varchar(255) DEFAULT NULL,
  `lid` varchar(255) DEFAULT NULL,
  `tid` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;