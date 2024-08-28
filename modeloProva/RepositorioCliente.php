<?php
require_once 'Usuario.php';

interface RepositorioCliente {

    /**
     * @throws RepositorioException
     */
    function adicionar( Usuario &$u );

    /**
     * @throws RepositorioException
     */    
    function removerPeloId( $id );

    /**
     * @throws RepositorioException
     */    
    function todos();    

}

?>