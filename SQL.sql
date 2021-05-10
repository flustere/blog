#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE CATEGORIE(
        idCategorie          Int  Auto_increment  NOT NULL ,
        nomCategorie         Varchar (255) NOT NULL ,
        descriptionCategorie Text NOT NULL
	,CONSTRAINT CATEGORIE_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ARTICLE
#------------------------------------------------------------

CREATE TABLE ARTICLE(
        idArticle              Int  Auto_increment  NOT NULL ,
        titreArticle           Varchar (255) NOT NULL ,
        dateCreationArticle    Date NOT NULL ,
        datePublicationArticle Date NOT NULL ,
        statutArticle          Varchar (255) NOT NULL ,
        contenuArticle         Text NOT NULL ,
        idCategorie            Int
	,CONSTRAINT ARTICLE_PK PRIMARY KEY (idArticle)

	,CONSTRAINT ARTICLE_CATEGORIE_FK FOREIGN KEY (idCategorie) REFERENCES CATEGORIE(idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TAG
#------------------------------------------------------------

CREATE TABLE TAG(
        idTag          Int  Auto_increment  NOT NULL ,
        nomTag         Varchar (255) NOT NULL ,
        descriptionTag Text NOT NULL
	,CONSTRAINT TAG_PK PRIMARY KEY (idTag)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: APPARTENIR
#------------------------------------------------------------

CREATE TABLE APPARTENIR(
        idArticle Int NOT NULL ,
        idTag     Int NOT NULL
	,CONSTRAINT APPARTENIR_PK PRIMARY KEY (idArticle,idTag)

	,CONSTRAINT APPARTENIR_ARTICLE_FK FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle)
	,CONSTRAINT APPARTENIR_TAG0_FK FOREIGN KEY (idTag) REFERENCES TAG(idTag)
)ENGINE=InnoDB;

