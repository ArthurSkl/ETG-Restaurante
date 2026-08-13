-- =====================================================
-- ETG-Restaurante - Migração do schema publicado
-- Para rodar no phpMyAdmin (aba SQL) do banco free.
-- O app usa estas colunas/views; o dump antigo não as tem.
-- =====================================================

-- 1) responder_check: observações de pré e pós aula
ALTER TABLE `responder_check`
  ADD COLUMN `observacao` TEXT NULL AFTER `id_checklist`,
  ADD COLUMN `observacao_pos` TEXT NULL AFTER `observacao`;

-- 2) responder_check: conf_logis precisa aceitar 'p' (pendente de ação corretiva)
ALTER TABLE `responder_check`
  MODIFY COLUMN `conf_logis` ENUM('s','n','p') DEFAULT 'n';

-- 3) cadastro_perfil: permissão "ver relatórios"
ALTER TABLE `cadastro_perfil`
  ADD COLUMN `ver_relatorios` ENUM('0','1') DEFAULT NULL AFTER `gerenciar_perguntas`;

-- 3.1) Perfis administrativos passam a enxergar o menu de relatórios
UPDATE `cadastro_perfil`
SET `ver_relatorios` = '1'
WHERE `gerenciar_perfis` = '1' AND `gerenciar_usuarios` = '1';

-- 4) view perfil_do_user: expor ver_relatorios (menu.php lê $perfil['ver_relatorios'])
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

-- 5) VIEW salas_encerradas_docente
--    Usada por Relatorio::getTudo() -> listar_relatorio.php ("Informações administrativas")
DROP VIEW IF EXISTS `salas_encerradas_docente`;
CREATE VIEW `salas_encerradas_docente` AS
SELECT
  `cadastro_sala`.`nome` AS `nome_sala`,
  `cadastro_sala`.`img_sala` AS `img_sala`,
  `responder_check`.`data_fechamento` AS `data_fechamento`,
  `responder_check`.`conf_logis` AS `conf_logis`,
  COUNT(`reg_nc`.`id`) AS `qnt_nc`,
  `cadastro_usuario`.`nome` AS `nome`
FROM `responder_check`
JOIN `cadastro_sala` ON (`cadastro_sala`.`id` = `responder_check`.`id_sala`)
JOIN `cadastro_usuario` ON (`cadastro_usuario`.`id` = `responder_check`.`id_usuario`)
LEFT JOIN `reg_nc` ON (`reg_nc`.`id_realiza` = `responder_check`.`id`)
WHERE `responder_check`.`data_fechamento` IS NOT NULL
GROUP BY `responder_check`.`id`, `cadastro_sala`.`id`, `cadastro_usuario`.`id`;

-- 6) VIEW checklist_respondidas
--    Usada por Checklist::getRespostasChecklist() -> dropdown do relatório de usuário
DROP VIEW IF EXISTS `checklist_respondidas`;
CREATE VIEW `checklist_respondidas` AS
SELECT
  `responder_check`.`id_usuario` AS `id_user`,
  `responder_check`.`id_checklist` AS `id_check`,
  `cadastro_checklist`.`nome` AS `nome_check`
FROM `responder_check`
JOIN `cadastro_checklist` ON (`cadastro_checklist`.`id` = `responder_check`.`id_checklist`);

-- 7) VIEW quantidade_nc_user
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
