-- =====================================================
-- ETG-Restaurante - Migração do schema publicado
-- Para rodar no phpMyAdmin (aba SQL) do banco free.
-- Aplicar APENAS as pendências em relação ao banco publicado
-- (observacao/observacao_pos e a view salas_encerradas_docente
-- já existem em produção e por isso não estão aqui).
-- =====================================================

-- 0) view quem_abriu: 1 linha por sala (responsavel = resposta mais recente)
--    Antes: LEFT JOIN responder_check SEM GROUP BY -> cada resposta duplicava a sala.
DROP VIEW IF EXISTS `quem_abriu`;
CREATE VIEW `quem_abriu` AS
SELECT
  `cadastro_sala`.`id` AS `id`,
  `cadastro_sala`.`nome` AS `nome`,
  `cadastro_sala`.`codigo` AS `codigo`,
  `cadastro_sala`.`cor_itens` AS `cor_itens`,
  `cadastro_sala`.`img_sala` AS `img_sala`,
  `cadastro_sala`.`descricao` AS `descricao`,
  `cadastro_sala`.`status` AS `status`,
  `cadastro_sala`.`horarios` AS `horarios`,
  `cadastro_sala`.`id_check` AS `id_check`,
  `responder_check`.`id_usuario` AS `responsavel`
FROM `cadastro_sala`
LEFT JOIN `responder_check` ON (`responder_check`.`id` = (
  SELECT MAX(`respostas`.`id`)
  FROM `responder_check` `respostas`
  WHERE `respostas`.`id_sala` = `cadastro_sala`.`id`
));

-- 1) responder_check: conf_logis precisa aceitar 'p' (pendente de ação corretiva)
ALTER TABLE `responder_check`
  MODIFY COLUMN `conf_logis` ENUM('s','n','p') DEFAULT 'n';

-- 2) cadastro_perfil: permissão "ver relatórios"
ALTER TABLE `cadastro_perfil`
  ADD COLUMN `ver_relatorios` ENUM('0','1') DEFAULT NULL AFTER `gerenciar_perguntas`;

-- 2.1) Perfis administrativos passam a enxergar o menu de relatórios
UPDATE `cadastro_perfil`
SET `ver_relatorios` = '1'
WHERE `gerenciar_perfis` = '1' AND `gerenciar_usuarios` = '1';

-- 3) view perfil_do_user: expor ver_relatorios (menu.php lê $perfil['ver_relatorios'])
DROP VIEW IF EXISTS `perfil_do_user`;
CREATE VIEW `perfil_do_user` AS
SELECT
  `cadastro_usuario`.`id` AS `id_user`,
  `cadastro_perfil`.`gerenciar_usuarios` AS `gerenciar_usuarios`,
  `cadastro_perfil`.`realizar_acao_corretiva` AS `realizar_acao_corretiva`,
  `cadastro_perfil`.`realizar_checklist` AS `realizar_checklist`,
  `cadastro_perfil`.`gerenciar_salas` AS `gerenciar_salas`,
  `cadastro_perfil`.`gerenciar_checklist` AS `gerenciar_checklist`,
  `cadastro_perfil`.`gerenciar_recados` AS `gerenciar_recados`,
  `cadastro_perfil`.`gerenciar_notificacoes` AS `gerenciar_notificacoes`,
  `cadastro_perfil`.`gerenciar_perfis` AS `gerenciar_perfis`,
  `cadastro_perfil`.`gerenciar_perguntas` AS `gerenciar_perguntas`,
  `cadastro_perfil`.`ver_relatorios` AS `ver_relatorios`
FROM `cadastro_usuario`
JOIN `cadastro_perfil` ON (`cadastro_perfil`.`id` = `cadastro_usuario`.`id_perfil`);

-- 4) VIEW checklist_respondidas
--    Usada por Checklist::getRespostasChecklist() -> dropdown do relatório de usuário
DROP VIEW IF EXISTS `checklist_respondidas`;
CREATE VIEW `checklist_respondidas` AS
SELECT
  `responder_check`.`id_usuario` AS `id_user`,
  `responder_check`.`id_checklist` AS `id_check`,
  `cadastro_checklist`.`nome` AS `nome_check`
FROM `responder_check`
JOIN `cadastro_checklist` ON (`cadastro_checklist`.`id` = `responder_check`.`id_checklist`);

-- 5) VIEW quantidade_nc_user
--    Usada por NaoConformidade::getNCLogistica() -> contagem + PDF do relatório de usuário
DROP VIEW IF EXISTS `quantidade_nc_user`;
CREATE VIEW `quantidade_nc_user` AS
SELECT
  `responder_check`.`id_usuario` AS `id_user`,
  `responder_check`.`id_checklist` AS `id_checklist`,
  `responder_check`.`data_fechamento` AS `data_fechamento`,
  `cadastro_usuario`.`nome` AS `nome`,
  `cadastro_sala`.`nome` AS `nome_sala`,
  `cadastro_checklist`.`nome` AS `nome_check`,
  (SELECT COUNT(*) FROM `reg_nc`
     WHERE `reg_nc`.`id_realiza` = `responder_check`.`id`) AS `qnt_nc`,
  (SELECT COUNT(*) FROM `reg_correcao`
     JOIN `reg_nc` ON (`reg_nc`.`id` = `reg_correcao`.`reg_NC_id`)
     WHERE `reg_nc`.`id_realiza` = `responder_check`.`id`) AS `qnt_c`
FROM `responder_check`
JOIN `cadastro_usuario` ON (`cadastro_usuario`.`id` = `responder_check`.`id_usuario`)
JOIN `cadastro_sala` ON (`cadastro_sala`.`id` = `responder_check`.`id_sala`)
JOIN `cadastro_checklist` ON (`cadastro_checklist`.`id` = `responder_check`.`id_checklist`)
WHERE `responder_check`.`data_fechamento` IS NOT NULL;
