-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 22 Février 2018 à 18:22
-- Version du serveur :  5.7.21-0ubuntu0.17.10.1
-- Version de PHP :  7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `AlertComments`
--

CREATE TABLE `AlertComments` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `summary` text,
  `content` text,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `visibility` char(10) NOT NULL DEFAULT 'prive',
  `chapter_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Articles`
--

INSERT INTO `Articles` (`id`, `author_id`, `title`, `summary`, `content`, `creation_date`, `visibility`, `chapter_id`) VALUES
(1, 2, 'Le dÃ©part', 'Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.', '<h4 style=\"text-align: justify;\">Le d&eacute;part</h4>\r\n<p style=\"text-align: justify;\">Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre <strong>imperatoris</strong>, matreque Galla sorore Rufini et Cerealis, <strong>quos</strong> trabeae consulares nobilitarunt et praefecturae.Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio</p>\r\n<h4 style=\"text-align: justify;\">Ensuite</h4>\r\n<p style=\"text-align: justify;\">Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et <strong>Cerealis</strong>, quos trabeae consulares nobilitarunt et praefecturae.Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita</p>\r\n<p>aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.</p>', '2018-02-19 23:48:47', 'public', 1),
(2, 2, 'Le dÃ©part suite', 'entre les brins d&#39;herbe des milliers de vermisseaux, d&#39;insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j&#39;entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l&#39;auguste pr&eacute;sence de l&#39;&Ecirc;tre tout-puissant qui cr&eacute;a l&#39;homme &agrave; son image, le souffle vivifiant du Dieu d&#39;amour et de', '<h4>Tous mes sens sont &eacute;mus</h4>\r\n<p>d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu,</p>\r\n<h4>&agrave; la chute d\'un ruisseau</h4>\r\n<p>Je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de</p>', '2018-02-20 17:19:05', 'public', 1),
(3, 2, 'une rencontre', 'Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d&#39;une l&eacute;g&egrave;re vapeur; qu&#39;au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d&#39;un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu&#39;&eacute;tendu sur le gazon touffu, &agrave; la chute d&#39;un ruisseau, je d&eacute;couvre', '<h4>Tous mes sens sont &eacute;mus</h4>\r\n<p>d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe</p>\r\n<h4>des milliers de vermisseaux</h4>\r\n<p>d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles! Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il</p>\r\n<p><strong>donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles! Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans</strong></p>\r\n<h4>le sentiment de ma paisible existence</h4>\r\n<p>que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles!Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche,</p>\r\n<blockquote>\r\n<p>jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre</p>\r\n</blockquote>\r\n<p>&nbsp;</p>', '2018-02-20 17:20:59', 'public', 1),
(4, 2, 'Le jardin', 'ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m&#39;est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles!Tous mes sens sont &eacute;mus d&#39;une volupt&eacute; douce et pure, comme l&#39;haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d&#39;une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j&#39;y go&ucirc;te &agrave; longs traits l&#39;ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d&#39;une l&eacute;g&egrave;re vapeur; qu&#39;au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d&#39;un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu&#39;&eacute;tendu sur le gazon touffu, &agrave; la chute d&#39;un ruisseau, je d&eacute;couvre', '<h4>Titre</h4>\r\n<p>Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles! Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre.</p>\r\n<h4>Titre</h4>\r\n<h5>Sous titre</h5>\r\n<p><strong>Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu</strong>, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles! Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles!Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvr</p>', '2018-02-20 17:24:52', 'public', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Chapters`
--

CREATE TABLE `Chapters` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `summary` text,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Chapters`
--

INSERT INTO `Chapters` (`id`, `name`, `summary`, `img`) VALUES
(1, 'Direction Alaska', 'Novitates autem si spem adferunt, ut tamquam in herbis non fallacibus fructus appareat, non sunt illae quidem repudiandae, vetustas tamen suo loco conservanda; maxima est enim vis vetustatis et consuetudinis. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus, in quibus diutius commorati sumus.', '/Web/assets/img/users/alaska.jpg'),
(2, 'Alaska HIGHWAY', 'Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.', '/Web/assets/img/users/Alaska-highway.gif'),
(3, 'Balade au sommet', 'Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.', '/Web/assets/img/users/denali_summit_unknown.jpg'),
(4, 'Un voyage sans fin', 'Metuentes igitur idem latrones Lycaoniam magna parte campestrem cum se inpares nostris fore congressione stataria documentis frequentibus scirent, tramitibus deviis petivere Pamphyliam diu quidem intactam sed timore populationum et caedium, milite per omnia diffuso propinqua, magnis undique praesidiis conmunitam.', '/Web/assets/img/users/images.jpeg'),
(5, 'Aurore borÃ©ale', 'Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.', '/Web/assets/img/users/theres-a-lot-that-you-dont-know-about-good-ol-alaska-25-photos-16.jpg'),
(6, 'On se dÃ©tend', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', '/Web/assets/img/users/FAIRBANKS ALASKA.jpg'),
(7, 'Le paysage', 'Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.', '/Web/assets/img/users/2019_09_01_vallÃ©e_de_l_aigue_agnelle_pano_2_2_g__large.jpg'),
(8, 'Retour du froid', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', '/Web/assets/img/users/VUEAIGUILLESVERTES-600x300.jpg'),
(9, 'Lac gelÃ©', 'Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.', '/Web/assets/img/users/ileserpentssigne.jpg'),
(10, 'L&#39;ascension', 'Proinde die funestis interrogationibus praestituto imaginarius iudex equitum resedit magister adhibitis aliis iam quae essent agenda praedoctis, et adsistebant hinc inde notarii, quid quaesitum esset, quidve responsum, cursim ad Caesarem perferentes, cuius imperio truci, stimulis reginae exsertantis aurem subinde per aulaeum, nec diluere obiecta permissi nec defensi periere conplures.', '/Web/assets/img/users/denali_summit_unknown.jpg'),
(11, 'Encore un lac gelÃ©', 'Intellectum est enim mihi quidem in multis, et maxime in me ipso, sed paulo ante in omnibus, cum M. Marcellum senatui reique publicae concessisti, commemoratis praesertim offensionibus, te auctoritatem huius ordinis dignitatemque rei publicae tuis vel doloribus vel suspicionibus anteferre. Ille quidem fructum omnis ante actae vitae hodierno die maximum cepit, cum summo consensu senatus, tum iudicio tuo gravissimo et maximo. Ex quo profecto intellegis quanta in dato beneficio sit laus, cum in accepto sit tanta gloria.', '/Web/assets/img/users/236A8D87E1FFBF51B04E2723F9F26C28.jpg'),
(12, 'Coin dÃ©tente', 'Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.', '/Web/assets/img/users/spa_hotel_levitunturi_spa_water_world_8_20160427152145.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `article_id` int(11) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `content` text,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) UNSIGNED NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) CHARACTER SET ascii NOT NULL,
  `content` text,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `rights` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `pseudo`, `email`, `password`, `content`, `creation_date`, `rights`) VALUES
(1, 'Visiteur', '', '', 'Simple visiteur', '2018-02-19 17:45:48', 1),
(2, 'JeanForteroche', 'JeanForteroche@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Auteur des nouvelles et administrateur du site.N\'hÃ©sitez pas Ã  me contacter JeanForteroche@gmail.com', '2018-02-19 17:47:29', 4),
(3, 'auteur', 'autheur@autheur.com', '098f6bcd4621d373cade4e832627b4f6', 'Édite des articles et chapitres.', '2018-02-21 13:19:45', 3),
(4, 'moderateur', 'moderateur@moderateur.com', '098f6bcd4621d373cade4e832627b4f6', 'modère les commentaires', '2018-02-21 13:47:10', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `AlertComments`
--
ALTER TABLE `AlertComments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AlertComments_ibfk_1` (`comment_id`);

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `Chapters`
--
ALTER TABLE `Chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_parent_comment_id` (`parent_id`) USING BTREE,
  ADD KEY `Comments_ibfk_3` (`author_id`),
  ADD KEY `Comments_ibfk_1` (`article_id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `AlertComments`
--
ALTER TABLE `AlertComments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Chapters`
--
ALTER TABLE `Chapters`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `AlertComments`
--
ALTER TABLE `AlertComments`
  ADD CONSTRAINT `AlertComments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `Comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `Chapters_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Articles_id_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `Articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
