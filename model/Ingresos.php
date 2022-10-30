<?php

class Ingresos
{
private $idingreso;
private $idusuario;
private $tipodocumento;
private $numerodocumento;
private $numerocomprobante;
private $fecha;
private $total;
private $descripcion;

    /**
     * @return mixed
     */
    public function getIdingreso()
    {
        return $this->idingreso;
    }

    /**
     * @param mixed $idingreso
     * @return Ingresos
     */
    public function setIdingreso($idingreso)
    {
        $this->idingreso = $idingreso;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     * @return Ingresos
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipodocumento()
    {
        return $this->tipodocumento;
    }

    /**
     * @param mixed $tipodocumento
     * @return Ingresos
     */
    public function setTipodocumento($tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumerodocumento()
    {
        return $this->numerodocumento;
    }

    /**
     * @param mixed $numerodocumento
     * @return Ingresos
     */
    public function setNumerodocumento($numerodocumento)
    {
        $this->numerodocumento = $numerodocumento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumerocomprobante()
    {
        return $this->numerocomprobante;
    }

    /**
     * @param mixed $numerocomprobante
     * @return Ingresos
     */
    public function setNumerocomprobante($numerocomprobante)
    {
        $this->numerocomprobante = $numerocomprobante;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     * @return Ingresos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     * @return Ingresos
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     * @return Ingresos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }



}