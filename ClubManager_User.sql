--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`name`, `roles`) VALUES
('Bureau', 'a:1:{i:0;s:11:"ROLE_MEMBER";}'),
('MembreUCV', 'a:1:{i:0;s:11:"ROLE_PLAYER";}'),
('Admin', 'a:1:{i:0;s:10:"ROLE_ADMIN";}');
-- --------------------------------------------------------

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`username`, `password`, `salt`, `roles`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
('admin', 'uYiDuXgmQ7iY2O/JbKk27+MGOjUP1N2SGXkaVoQCq3ycwxBksYZ8LF9CRXLMD5JYe3dNa9gY8mPWOUZbcCUbdA==', '952y1gw7bxgkckcs0oooskwswscs808', 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 'admin', 'admin@test.com', 'admin@test.com', 1, '2015-09-17 14:29:10', 0, 0, NULL, NULL, NULL, 0, NULL, '2015-09-08 16:11:04', '2015-09-17 14:29:10', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
('tommy', 'k2vF7GOD/dKMpUpTiM4OuZS06Lyi/KWolXt9913FLdio8+UQ3vUzxjBeGQGuKFYoNjVWj+ovQ2lbievQDCdLlQ==', 'tcpux2gevvkk040ccckck4ow448o0kw', 'a:1:{i:0;s:11:"ROLE_MEMBER";}', 'tq', 'tommy@ucv.fr', 'tommy@ucv.fr', 1, '2015-09-09 09:16:44', 0, 0, NULL, NULL, NULL, 0, NULL, '2015-09-09 09:09:43', '2015-09-09 10:39:08', NULL, NULL, NULL, NULL, NULL, 'm', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
('joseph', 'FdGTbeTH5ELj/7uPqZwtFmNUT8zs/DNONlUlph22yTeiTEGbazd8umHEs/wISuM6TrZ6oPTLusBc4mSSji9gHw==', '32e4n5vh4r6s84kswg4840g0c8ow00c', 'a:0:{}', 'joseph', 'joseph.mesny@gmail.com', 'joseph.mesny@gmail.com', 1, '2015-09-25 16:20:47', 0, 0, NULL, NULL, NULL, 0, NULL, '2015-09-09 11:08:05', '2015-09-25 16:20:47', NULL, NULL, NULL, NULL, NULL, 'm', 'fr_FR', 'Europe/Paris', NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
('clem', 'OlxKLViGWozrKU5Wuh+1XT0IQgVyey635COkP4hJBasokNF5YuN9OadfX4iB6fZsOjP4DMK6FNXkQytNrPbQbg==', '4ojh60ljqvc40ssgkg80woc44oowws4', 'a:0:{}', 'clem', 'clem@ucv.com', 'clem@ucv.com', 0, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, '2015-09-09 11:09:12', '2015-09-09 11:09:12', NULL, NULL, NULL, NULL, NULL, 'f', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
('gaetch', 'LbykTR6vCwBPWBLy49Dv2n9Wlr0fFefujESDkbmjhLvZuHzc7hxwgPiBwa+IkM3d9nbo+ygJb+vJ/3gxeeXSTw==', 'mms2jjpbgu80s880k8ok4ocoo0wcg4c', 'a:0:{}', 'gaetch', 'gaetch@ucv.fr', 'gaetch@ucv.fr', 1, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, '2015-09-10 14:22:01', '2015-09-10 14:22:01', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);
-- --------------------------------------------------------


--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 3),
(2, 1),
(3, 3);
