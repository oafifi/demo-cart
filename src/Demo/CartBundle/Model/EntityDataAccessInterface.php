<?php

namespace Demo\CartBundle\Model;

/**
 * Interface EntityDataAccessInterface
 * @package Demo\CartBundle\Model
 *
 * Defines basic data access methods for entities
 */
interface EntityDataAccessInterface
{
    public function save();

    public function remove();

    public function update();

    public static function find($id);

    public static function findAll();
}