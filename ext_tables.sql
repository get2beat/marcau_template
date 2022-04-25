#
# Add SQL definition of database tables
#
CREATE TABLE tt_content (
    tx_modul_trennline int(11) DEFAULT '0' NOT NULL,
    tx_modul_select_trennlinie int(11) DEFAULT '0' NOT NULL,
    tx_modul_link varchar(255) DEFAULT '' NOT NULL,
    tx_modul_link_title varchar(255) DEFAULT '' NOT NULL,
    tx_modul_showtitle int(11) DEFAULT '0' NOT NULL,
    tx_modul_h1 int(11) DEFAULT '0' NOT NULL,
    tx_modul_spalten varchar(255) DEFAULT '' NOT NULL,
    tx_modul_textspalterechts text,
    tx_modul_textposition varchar(255) DEFAULT '' NOT NULL,
    tx_modul_subtitle varchar(255) DEFAULT '' NOT NULL,
    tx_modul_backgroundcolor varchar(255) DEFAULT '' NOT NULL,
    tx_modul_topslider_config int(11) DEFAULT '0' NOT NULL,
    tx_modul_bild int(11) unsigned DEFAULT '0' NOT NULL,
    tx_modul_bildposition tinytext,
    tx_modul_bilddimension tinytext,
    tx_modul_slides int(11) unsigned DEFAULT '0' NOT NULL,
    tx_modul_accordions int(11) unsigned DEFAULT '0' NOT NULL
);
CREATE TABLE tx_modul_slides (
    parentid int(11) DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    t3ver_id int(11) DEFAULT '0' NOT NULL,
    t3ver_label varchar(255) DEFAULT '' NOT NULL,
    tx_modul_link tinytext,
    tx_modul_link_title tinytext,
    tx_modul_media int(11) unsigned DEFAULT '0' NOT NULL,
    tx_modul_titel tinytext,
    tx_modul_h1 int(11) DEFAULT '0' NOT NULL,
    KEY language (l10n_parent,sys_language_uid)
);
CREATE TABLE tx_modul_accordions (
     parentid int(11) DEFAULT '0' NOT NULL,
     parenttable varchar(255) DEFAULT '' NOT NULL,
     t3ver_id int(11) DEFAULT '0' NOT NULL,
     t3ver_label varchar(255) DEFAULT '' NOT NULL,
     tx_modul_titel tinytext,
     tx_modul_text text,
     tx_modul_link tinytext,
     tx_modul_link_title tinytext,
     KEY language (l10n_parent,sys_language_uid)
);

