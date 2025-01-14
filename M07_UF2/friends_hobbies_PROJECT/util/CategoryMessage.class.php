<?php

//Aquest fitxer, encara que es digui CategoryMessage, s'utilitza tant per friends com hobbies

class CategoryMessage {

    const INF_FORM =
        array(
            'insert' => 'Dades afegides correctament',
            'update' => 'Dades actualitzades correctament',
            'delete' => 'Dades esborrades correctament',
            'found'  => 'Data found',
            'count' => 'Number of categories is ',
            '' => ''
        );
    
    const ERR_FORM =
        array(
            'empty_id'      => 'Id must be filled',
            'delete'        => 'Ha hagut un error esborrant les dades',
            'empty_name'    => 'Name must be filled',
            'invalid_id'    => 'Id must be valid values',
            'invalid_name'  => 'Name must be valid values',
            'exists_id'     => 'Id already exists',
            'not_exists_id' => 'Id not exists',
            'not_found'     => 'No data found',
            '' => ''
        );

    const ERR_DAO =
        array(
            'insert' => 'Error inserting data',
            'update' => 'Error updating data',
            'delete' => 'Error deleting data',
            'used'   => 'No data deleted, Category in use',
            '' => ''
        );

        const NUM_CATEGORY =
        array(
            'zero'   => 'No categories',
            'one'    => 'One category',
            'other'  => '%s categories',
            '' => ''
        );
    
}
