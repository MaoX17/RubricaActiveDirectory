<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $nome;
    protected $cognome;
    protected $nomeCompleto;
    protected $tel;
    protected $email;
    protected $vcard;
    protected $jobTitle;
    protected $servizio;
    protected $area;




    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getVcard()
    {
        return $this->vcard;
    }

    public function setVcard($vcard)
    {
        $this->vcard = $vcard;
    }

    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    public function getServizio()
    {
        return $this->servizio;
    }

    public function setServizio($servizio)
    {
        $this->servizio = $servizio;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }


}

