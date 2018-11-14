<?php
namespace classes\entities;
/**
 * Class Vacancy
 *
 * @property int $id
 * @property boolean $premium
 * @property object $billing_type
 * @property string $name
 * @property object $department
 * @property boolean $allow_messages
 * @property object $site
 * @property object $experience
 * @property object $schedule
 * @property object $employment
 * @property string $description
 * @property int $has_test
 * @property int $response_letter_required
 * @property object $area
 * @property object $salary
 * @property object $type
 * @property object $address
 * @property object $employer
 * @property string $published_at
 * @property string $created_at
 * @property string $archived
 * @property string $apply_alternate_url
 * @property string $url
 * @property string $alternate_url
 * @property object $relations
 * @property object $snippet
 * @property object $contacts
 *
 */

class Vacancy
{
    public function __construct($params)
    {
        foreach($params as $key => $value){
            $this->$key = $value;
        }
    }
}