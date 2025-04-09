DROP DATABASE IF EXISTS filelec;
CREATE DATABASE filelec;
USE filelec;
 
-- Table Client
CREATE TABLE client (
    id_client INT(5) NOT NULL AUTO_INCREMENT,
    nom_client VARCHAR(50) NOT NULL,
    prenom_client VARCHAR(50) NOT NULL,
    adresse_client VARCHAR(50) NOT NULL,
    email_client VARCHAR(50) NOT NULL UNIQUE,
    tel_client CHAR(12) NOT NULL UNIQUE,
    mdp_client VARCHAR(30) NOT NULL,
    date_creation_client DATE NOT NULL,
    url_client VARCHAR(255) NOT NULL,
    type_client ENUM('Particulier', 'Professionnel') NOT NULL,
    PRIMARY KEY (id_client)
);
 
-- Table Catégorie
CREATE TABLE categorie (
    id_cat INT(10) NOT NULL AUTO_INCREMENT,
    nom_cat VARCHAR(25) NOT NULL,
    url VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_cat)
);
 
-- Table Article
CREATE TABLE article (
    id_article INT(10) NOT NULL AUTO_INCREMENT,
    nom_article VARCHAR(25) NOT NULL,
    description_article VARCHAR(100) NOT NULL,
    prix_article FLOAT(10,2) NOT NULL,
    stock_article INT DEFAULT 0,
    id_cat INT(10) NOT NULL,
    PRIMARY KEY (id_article),
    FOREIGN KEY (id_cat) REFERENCES categorie(id_cat)
);
 
-- Table Image Article (corrigée)
CREATE TABLE image (
    id_image INT(10) NOT NULL AUTO_INCREMENT,  
    nom_image VARCHAR(255) NOT NULL,                       
    url_image VARCHAR(255) NOT NULL,
    id_article INT(10) NOT NULL,
    PRIMARY KEY (id_image),
    FOREIGN KEY (id_article) REFERENCES article(id_article)
);
 
 
 

 
-- Table Technicien
CREATE TABLE technicien (
    id_technicien INT(12) NOT NULL AUTO_INCREMENT,
    nom_technicien VARCHAR(25) NOT NULL,
    prenom_technicien VARCHAR(25) NOT NULL,
    email_technicien VARCHAR(50) NOT NULL UNIQUE,
    mdp_technicien VARCHAR(30) NOT NULL,
    telephone_technicien VARCHAR(20),
    role_technicien enum ("technicien", "admin", "user"),
    PRIMARY KEY (id_technicien)
);
 
 
-- Table Commande
CREATE TABLE commande (
    id_commande INT(10)  AUTO_INCREMENT,
    id_client INT(5) NOT NULL,
    date_commande DATE NOT NULL,
    statut ENUM('en preparation', 'en chemin', 'livré') NOT NULL,
    montant_total FLOAT(10,2),
    adresse_livraison VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_commande),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);
 
CREATE TABLE panier (
    id_panier INT(10) NOT NULL AUTO_INCREMENT,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_commande INT(10),
    id_client INT(5) NOT NULL,
    PRIMARY KEY (id_panier),   
    FOREIGN KEY (id_client) REFERENCES client(id_client) ON DELETE CASCADE,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande) ON DELETE CASCADE  
);

-- Table Ligne de Commande
CREATE TABLE ligne (
    id_ligne INT(12) NOT NULL AUTO_INCREMENT,
    id_article INT(10) NOT NULL,
    quantite INT(5) NOT NULL,
     id_panier INT(10) NOT NULL,
   
    PRIMARY KEY (id_ligne),
    FOREIGN KEY (id_panier) REFERENCES panier(id_panier) ON DELETE CASCADE,
    FOREIGN KEY (id_article) REFERENCES article(id_article)ON DELETE CASCADE
);

 
create view vuePanier as (
select ligne.*, panier.id_client, article.nom_article, article.prix_article
from ligne 
inner join panier on panier.id_panier = ligne.id_panier
inner join article on ligne.id_article = article.id_article
) ;



insert into article values (null,"pneu été 5 pouces", "Un pneu d’été de 5 pouces est conçu pour une adhérence optimale sur routes sèches et humides.", "167.95", "12", 1) ,
(null,"pneu hiver", "Pneu été compact offrant une bonne tenue de route et une faible usure.", "169.99", "10", 1),  
(null,"pneu toutes saison", "Pneu performant conçu pour une meilleure stabilité et adhérence sur route sèche.", "165.50", "15", 1),  
(null,"pneu tout terrain", "Modèle résistant avec une structure optimisée pour le confort et la sécurité.", "172.00", "8", 1),  
(null,"pneu noir" , "Idéal pour les longs trajets, ce pneu réduit la consommation de carburant.", "168.75", "14", 1),