SET FOREIGN_KEY_CHECKS=0;

-- Dumping data for table: cache
TRUNCATE TABLE `cache`;

-- Dumping data for table: cache_locks
TRUNCATE TABLE `cache_locks`;

-- Dumping data for table: devices
TRUNCATE TABLE `devices`;
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('1', 'ee3508f0-5684-4dce-8e78-866707315f15', 'Zahro', '32647248202073', NULL, 'Iphone 12 Pro Max', 'Hitam', 'pemilik/CCkEqZ3uVLR1VoUT1vaz6iMEsqTQ61pouSvJbzNy.jpg', 'hp/E571dTR2bFfybMvZ8i1iRLWVYEpvTgQH1RlV2DJU.jpg', '2026-02-15 03:18:12', '2026-02-15 03:18:12');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('2', 'a16fcb97-d123-4947-84ca-6f08d699f674', 'Stevania', '1932645882479', NULL, 'Vivo Y12', 'Biru', 'pemilik/zHZEEKZyRngfQe3BLjmuBttXzl2scEonUs5vLY2U.png', 'hp/pXQNHG1SOwhdfnkN0vplWBuZ06mPVviT8Cb1bjBE.png', '2026-02-15 03:30:48', '2026-02-15 03:30:48');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('3', '99753334-2511-4e1e-803d-2c89c30fa9ff', 'Putri', '1987672352489', NULL, 'Xiaomi Note 15 Pro', 'Hitam', 'pemilik/PjeWP9Qnm6wPA53NToCNeSeiaovTs3GVlSGjW6LA.jpg', 'hp/SrEbTQEtOZmVn4UDD1LFfxUe7GMuEEblRcaJL4ax.jpg', '2026-02-15 04:46:16', '2026-02-15 04:46:16');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('4', '8291b8e6-221e-4bfc-93d5-6028d64e79f2', 'Zai', '130802924685', NULL, 'Iphone 15 Pro', 'Hitam', 'pemilik/jmRNLzz3IAHS6m56285OSPhRT96tP58aeWdhSzLt.png', 'hp/sf6p20Y88DvHj9o9rH3F7UJtfgNHTIpaqapEiTtd.png', '2026-02-15 04:47:09', '2026-02-15 04:47:09');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('5', 'eaf23b29-a57b-4b89-adb9-be10f2f4c9b4', 'Dila', '72841938103838', NULL, 'Oppo X7', 'Biru', 'pemilik/ChqyhacB2FpTv3ZNH0IyZ9OeCKhY9CXYDJfVUhTW.jpg', 'hp/2O1oW54joqAK3rqtNGnaFrlISD9CYm1xRPdXmW36.jpg', '2026-02-19 01:50:41', '2026-02-19 01:50:41');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('6', '62d1d4ed-64d7-47a3-ae04-81c7417853ec', 'Sofiana Rahma', '892378912233', NULL, 'Xiaomi 17 Ultra', 'Hitam', 'pemilik/AHhXVYgSfFRcK25zJpMOCPnF8YIdDaXdhcIm3fAn.jpg', 'hp/GMKfTZaVofCSCMQPMzGv5lXB67TB6s8btjDluXgg.jpg', '2026-02-19 02:12:20', '2026-02-19 02:12:20');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('7', '9b300d2e-bce5-49cf-a1a6-c1d836c312cf', 'Andrean', '781236790221', NULL, 'Iphone 12 Pro Max', 'Putih', 'pemilik/Foax0bPAKXQLkmq0oxsUrMlcvnirZOcHqoiNQmpo.jpg', 'hp/BTzLXaWTBiYCjIdirZsoX59jfXpp6wK7oS8IJOzA.jpg', '2026-02-19 02:13:40', '2026-02-19 02:13:40');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('8', '43ea8692-b7c3-4eb1-bc96-779105c78888', 'Wahyudin', '4267812908777', NULL, 'Vivo Y27s', 'Hitam', 'pemilik/mBdn157mJDWjWzJTp5XdmCei3VUck899XGR90kuX.jpg', 'hp/cHTlsasDd8pe5TDaGCLYfrWd3AAsk0dRQYfEvUaM.jpg', '2026-02-19 02:14:35', '2026-02-19 02:14:35');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('9', '009b9411-9abf-4663-a9da-c8b6231d0411', 'Bambang Yudhistira', '234678190888', NULL, 'Xiaomi Note 15 Pro', 'Putih', 'pemilik/ETOItCGJdAKhl6CRiay58DPLJtHbwzk2N4FE5QNL.jpg', 'hp/HLUpwQQ8kBEsD3lIktHA83enKs6zzGz6bXpa1sws.jpg', '2026-02-19 02:15:44', '2026-02-19 02:15:44');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('10', '3d1b790b-6038-416f-ac81-41601eb8f369', 'Lukman Haris', '3452671899760', NULL, 'Oppo 18', 'Hitam', 'pemilik/Lki2OtRrPa7QPyFn2PTvBUPQBxYywdn6IIorrX73.jpg', 'hp/81okbYm7w8QrrjqF2C8c7Ll6CHhSqZyh6xeNbKLj.jpg', '2026-02-19 02:17:12', '2026-02-19 02:17:12');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('11', '625ea8b5-b000-4915-b5f4-3943cf02cdb4', 'Aprilliya Putri', '237891000893', NULL, 'Samsung', 'Hitam', 'pemilik/hKZ7T1KxEMsq7ilusMihssXVv3qn41KGY6lweAvj.jpg', 'hp/gsZgm5oGRbVoAck6IEgqZKJz862jOYMJClZdRP7o.jpg', '2026-02-19 02:18:33', '2026-02-19 02:18:33');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('12', '45e3d1f6-bc1c-48c1-ba57-2356bf975f00', 'Rizki Dwi', '127890340008', NULL, 'Xiaomi Note 15 Pro', 'Putih', 'pemilik/myeNZVeZ5CgRwXlDzyGcwIixZzQ8lR3duJZkLfnA.jpg', 'hp/s5bfvJUAfHLd0mcQKY6uzmorY605shTwTypZHOYe.jpg', '2026-02-19 02:21:23', '2026-02-19 02:21:23');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('13', '935ae999-96fb-4402-ae0e-5a9d5c696ef7', 'Khayla Annasya', '2678910887000', NULL, 'Xiaomi Note 15 Pro', 'Pink', 'pemilik/XgxZ4NU10Z1ZKRLaRabP7ePn4T1Cro69uwosfgLx.jpg', 'hp/6IoQOYQaFeixTNMm59RAnt4fccVMhK99irydM6jU.jpg', '2026-02-19 02:23:28', '2026-02-19 02:23:28');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('14', '8b7fcc98-b835-4b5a-95fc-afb9996ce61e', 'Fetty Dwi', '290180006728', NULL, 'Iphone 15 Pro', 'Hitam', 'pemilik/ofqGpgRbqspA4JReEwzN0Tf5e2RNhgDNbEfLdi6C.jpg', 'hp/6Fupb7UtHdFXyVNuCMSBcieZ7eZcJpQwlxZnhwMk.jpg', '2026-02-19 02:24:11', '2026-02-19 02:24:11');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('15', 'b673997a-7fdd-4390-9f1f-4d5baf8abf87', 'Lutfi Maulidha', '230008129800', NULL, 'Iphone 15 Pro', 'Hitam', 'pemilik/kSrdGzLJgl3RXniqfdxiIQzFNJmhTJKjzM4SKkaO.jpg', 'hp/Y6WnXWG7XOT99JOOiKr9wpIERZCVHVweCzZDGLVL.jpg', '2026-02-19 02:25:41', '2026-02-19 02:25:41');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('16', 'dcfb5d11-2b9e-4675-9d26-43db814fba8c', 'Dhimas Agung', '129080007840', NULL, 'Iphone 12 Pro Max', 'Putih', 'pemilik/fvMqO1Q5dnDn5L7ltnKu9A8kJnXXTpgCwG5Kw2vP.jpg', 'hp/4Gg5ACQYkkWz6k6C3rvpcLWHCxj4adPmzryoEUCs.jpg', '2026-02-19 02:27:00', '2026-02-19 02:27:00');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('17', '21fbae06-f686-4d13-8825-fb672b2a9b5d', 'Zumrotul Fitri', '23400008176', NULL, 'Iphone 12 Pro Max', 'Hitam', 'pemilik/CezuyznQBKfZ6cEt56MckL5ulSTHCvQbSgl61BLf.jpg', 'hp/Z0n8gp9Q2CZAr3VVUkyYXb2JluWXIqXPQL8VzkTd.jpg', '2026-02-19 02:28:20', '2026-02-19 02:28:20');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('18', '922630cd-69cc-42f3-8248-3c1afe2160d4', 'Yuliana', '348790112800', NULL, 'Iphone 15 Pro', 'Hitam', 'pemilik/TMPgieIqQjpIoNHqcfmN2fBjMjsPxVuSgsC7xeR5.jpg', 'hp/h8nZu1KUWBmujI55yQzCSrXe5EDXOuFbStxNilTV.jpg', '2026-02-19 02:29:38', '2026-02-19 02:29:38');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('20', '3560c33d-e8e9-4ad8-acb9-b18af213a5d0', 'Febrian', '23490188000', NULL, 'Iphone 12 Pro Max', 'kuning', 'pemilik/irdzuGPKSI4FEylDHMJGNfrVcS2bn8DBCKD2hNKv.jpg', 'hp/EOwoQw0DTox3esNyBE0xbSZGymjP3rJCFksiNXnv.jpg', '2026-02-19 02:31:26', '2026-02-19 02:31:26');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('21', '443d6f73-49c2-40fd-a10b-f29733f3efff', 'Wawan', '23091800078', NULL, 'Xiaomi Note 15 Pro', 'Putih', 'pemilik/qmPIKXHnhU2P9GwFSbjBR8od7kUuxq0twA2gho6h.jpg', 'hp/lE7X0PSRvcEe6JC9xxpb1xiDFnhq4oeKylyQLzxa.jpg', '2026-02-19 02:33:14', '2026-02-22 10:00:40');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('22', '3a8660e6-999a-4702-9831-fd6d644c49a1', 'Arin', '2301890007', NULL, 'Samsung Ultra', 'Hitam', 'pemilik/yTyDIEK5fOQiaoUoXLr2eQfhf5E9jA4UQc2qR22Q.jpg', 'hp/Iafrqcd30iKXxORuHXVRph6qtKlQdn9qCuqW8XIk.jpg', '2026-02-19 02:35:04', '2026-02-19 02:35:04');
INSERT INTO `devices` (`id`, `uuid`, `nama_pemilik`, `imei`, `imei2`, `merek_hp`, `warna_hp`, `foto_pemilik`, `foto_hp`, `created_at`, `updated_at`) VALUES ('23', '8dcfa981-ae30-410d-a937-028ddafbdd32', 'huda', '862544046265', '8742105426348', 'Xiaomi Note 15 Pro', 'Putih', 'pemilik/VBXTWKySxPMt94cGg6NW2Tg2eKMvUoWkfp1rxvO9.jpg', 'hp/11Evnrobb0h26KJ1r1W7JusdiEi1T1JU0x2eJMec.jpg', '2026-02-23 11:43:11', '2026-02-23 11:43:11');

-- Dumping data for table: failed_jobs
TRUNCATE TABLE `failed_jobs`;

-- Dumping data for table: job_batches
TRUNCATE TABLE `job_batches`;

-- Dumping data for table: jobs
TRUNCATE TABLE `jobs`;

-- Dumping data for table: password_reset_tokens
TRUNCATE TABLE `password_reset_tokens`;

-- Dumping data for table: sessions
TRUNCATE TABLE `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('w1znN6KhhoOzFzQsnaOne6Wim5YEqj57DebJPbyI', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTzZMNmszaGpxbDFHTENLMXRPTHQwanFMY2Eyb1FiM3JmcFJrbDE2MyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', '1772423532');

-- Dumping data for table: tasks
TRUNCATE TABLE `tasks`;

-- Dumping data for table: users
TRUNCATE TABLE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Admin Adkamtib', 'admin@gmail.com', NULL, '$2y$12$5CUVSdd3PVw0znzNRj.bD.Fiw05n.9WjLczFwyfDAo2nKvUD.yU4K', NULL, '2026-02-13 03:08:21', '2026-02-21 05:44:29');

SET FOREIGN_KEY_CHECKS=1;
