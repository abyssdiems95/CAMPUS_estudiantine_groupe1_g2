<?php
interface IDao
{
    public function add($obj);
    public function update($obj);
    public function delete($id);
    public function findAll($limit,$offset);
    public function findById($id);
}