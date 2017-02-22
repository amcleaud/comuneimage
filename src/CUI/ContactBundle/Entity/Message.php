<?php

namespace CUI\ContactBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Message
{
    /**
     * @Assert\NotBlank()
     */
    public $nom;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\NotBlank()
     */
    public $adresse;

    /**
     * @Assert\NotBlank()
     */
    public $telephone;

    public $fonction;

    /**
     * @Assert\NotBlank()
     */
    public $entreprise;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 5,
     *      minMessage = "Le code postal doit faire au moins {{ limit }} charactères de long.",
     *      maxMessage = "Le code postal doit faire au maximum {{ limit }} charactères de long."
     * )
     */
    public $codePostal;

    /**
     * @Assert\NotBlank()
     */
    public $ville;

    /**
     * @Assert\NotBlank()
     */
    public $contenu;

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }


    /**
     * Gets the value of adresse.
     *
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Sets the value of adresse.
     *
     * @param mixed $adresse the adresse
     *
     * @return self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Gets the value of telephone.
     *
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the value of telephone.
     *
     * @param mixed $telephone the telephone
     *
     * @return self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Gets the value of fonction.
     *
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Sets the value of fonction.
     *
     * @param mixed $fonction the fonction
     *
     * @return self
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Gets the value of Entreprise.
     *
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Sets the value of Entreprise.
     *
     * @param mixed $Entreprise the entreprise
     *
     * @return self
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Gets the value of codePostal.
     *
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Sets the value of codePostal.
     *
     * @param mixed $codePostal the code postal
     *
     * @return self
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Gets the value of ville.
     *
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Sets the value of ville.
     *
     * @param mixed $ville the ville
     *
     * @return self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }
}