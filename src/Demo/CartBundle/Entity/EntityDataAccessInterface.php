<?php

namespace Demo\CartBundle\Entity;

/**
 * Interface EntityDataAccessInterface
 * @package Demo\CartBundle\Entity
 *
 * Defines basic data access methods for entities
 */
interface EntityDataAccessInterface
{
    /**
     * Store element to the database
     *
     * @return mixed
     */
    public function save();

    /**
     * Removes element from the database
     *
     * @return mixed
     */
    public function remove();

    /**
     * Updates element in the database
     *
     * @return mixed
     */
    public function update();

    /**
     * Retrieve entity from database by id
     *
     * @param $id
     * @return mixed
     */
    public static function find($id);

}