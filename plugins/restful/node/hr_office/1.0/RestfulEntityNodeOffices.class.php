<?php

/**
 * @file
 * Contains \RestfulEntityNodeOffices.
 */

class RestfulEntityNodeOffices extends \RestfulEntityBaseNode {

  /**
   * Overrides RestfulEntityBaseNode::addExtraInfoToQuery()
   * 
   * Adds proper query tags
   */
  protected function addExtraInfoToQuery($query) {
    parent::addExtraInfoToQuery($query);
    $filters = $this->parseRequestForListFilter();
    if (!empty($filters)) {
      foreach ($query->tags as $i => $tag) {
        if ($tag == 'node_access') {
          unset($query->tags[$i]);
        }
      }
      $query->addTag('entity_field_access');
    }
  }

  /**
   * Overrides \RestfulEntityBase::publicFieldsInfo().
   */
  public function publicFieldsInfo() {
    $public_fields = parent::publicFieldsInfo();

    $public_fields['location'] = array(
      'property' => 'field_location',
      'resource' => array(
        'hr_location' => 'locations',
      ),
    );

    $public_fields['address'] = array(
      'property' => 'field_address',
    );

    $public_fields['phones'] = array(
      'property' => 'field_phones',
    );

    $public_fields['email'] = array(
      'property' => 'field_email',
    );

    $public_fields['organizations'] = array(
      'property' => 'field_organizations',
      'resource' => array(
        'hr_organization' => 'organizations',
      ),
    );

    $public_fields['operation'] = array(
      'property' => 'og_group_ref',
      'resource' => array(
        'hr_operation' => 'operations',
      ),
    );

    return $public_fields;
  }

}