<?php

include_once 'DB.php';

class cesta {

    protected $productos = array();
    protected $unidades = array();

    public function nuevo_articulo($codigo) {
        if ($this->unidades[$codigo] > 0) {
            $this->unidades[$codigo] ++;
        } else {
            $cod = DB::obtieneProducto($codigo);
            
            $this->productos[] = $cod;
            $this->unidades[$codigo] = 1;
        }
    }

    public function get_productos() {
        return $this->productos;
    }

    public function get_unidades() {
        return $this->unidades;
    }

    public function borrar_articulo($codigo) {
        if ($this->unidades[$codigo] <= 1) {
            unset($this->unidades[$codigo]);
            foreach ($this->productos as $indice => $producto) {
                foreach ($producto as $dato) {
                    if ($dato->getCod() == $codigo) {
                        unset($this->productos[$indice]);
                    }
                }
            }
        } else {
            $this->unidades[$codigo] --;
        }
    }

    public function coste() {
        $suma = 0;
        foreach ($this->productos as $fila) {
            foreach ($fila as $dato) {
                if (array_key_exists($dato->getCod(), $this->unidades)) {
                    $suma+=$dato->getPVP() * ($this->unidades[$dato->getCod()]);
                } else {
                    $suma+=$dato->getPVP();
                }
            }
        }
        return $suma;
    }
    
    public function coste_productos(){
        $suma = 0;
        foreach ($this->productos as $fila) {
            foreach ($fila as $dato) {
                
            }
        }
    }

    public function vacia() {
        $vacia = true;
        if (count($this->productos) == 0) {
            $vacia = false;
        }
        return $vacia;
    }

    public function guarda_cesta() {
        $_SESSION['cesta'] = $this->productos;
        $_SESSION['unidades'] = $this->unidades;
    }

    public function carga_cesta() {
        session_start();
        if (!isset($_SESSION['cesta'])) {
            return new cesta();
        } else {
            $this->productos = $_SESSION['cesta'];
            $this->unidades = $_SESSION['unidades'];
        }
    }

}
?>

