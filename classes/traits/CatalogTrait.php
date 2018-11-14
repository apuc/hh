<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.11.2018
 * Time: 14:21
 */

namespace classes\traits;


trait CatalogTrait
{
    protected function checkTree($tree, $subtreeField, $searchField, $searchValue, $returnField){
        if($searchValue === $tree->$searchField)
            return $tree->$returnField;
        else if(!$tree->$subtreeField)
            return false;
        else {
            foreach ($tree->$subtreeField as $subtree){
                if($tmp = $this->checkTree($subtree, $subtreeField, $searchField, $searchValue, $returnField)){
                    return $tmp;
                }
            }
        }
        return false;
    }
}