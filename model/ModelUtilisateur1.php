<?php
require_once (File::build_path(array('model','Model.php')));

class ModelUtilisateur1 extends Model{
    protected static $primary='loginUtilisateur';
    protected static $object = 'utilisateur1';
    private $loginUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $adresseFacturationUtilisateur;
    private $adresseLivraisonUtilisateur;
    private $passUtilisateur;
    private $emailUser;
    private $typeUser;
    private $nonce;

    // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // Constructeur
    public function __construct($data = array()) {
        if (!empty($data)) {
            $this->loginUtilisateur = $data['loginUtilisateur'];
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->prenomUtilisateur = $data['prenomUtilisateur'];
            $this->adresseFacturationUtilisateur = $data['adresseFacturationUtilisateur'];
            $this->adresseLivraisonUtilisateur = $data['adresseLivraisonUtilisateur'];
            $this->passUtilisateur = $data['passUtilisateur'];
            $this->emailUser = $data['emailUser'];
            $this->typeUser = $data['typeUser'];
            $this->nonce = $data['nonce'];
        }
    }
    
    //vérifie si le mot de passe crypté passé en argument est le meme que celui dans la base de données pour le login
    //donné en argument
    public static function checkPassword($loginUtilisateur, $mot_de_passe_chiffre) { 
        $u = static::select($loginUtilisateur);
        if($u) {
            if ($mot_de_passe_chiffre === $u->get('passUtilisateur')) {
                return true;
            }
        }
        else {
            return false;
        }
        return false;
    } 

}
