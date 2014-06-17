<?php

namespace Drupal\devconnect_developer_apps;
use \Drupal\devconnect\ArrayEntity;

class ApiProductEntity extends ArrayEntity {
  /**
   * @var string
   */
  public $orgName = '';
  /**
   * @var array
   */
  public $apiResources = array();
  /**
   * @var string
   * 'manual' or 'auto'
   */
  public $approvalType = '';
  /**
   * @var int
   */
  public $createdAt = 0;
  /**
   * @var string
   */
  public $createdBy = '';
  /**
   * @var int
   */
  public $modifiedAt = 0;
  /**
   * @var string
   */
  public $modifiedBy = '';
  /**
   * @var string
   */
  public $description = '';
  /**
   * @var string
   */
  public $displayName = '';
  /**
   * @var array
   */
  public $environments = array();
  /**
   * @var string
   */
  public $name = '';
  /**
   * @var array
   * The purpose of this member is unknown
   */
  public $proxies = array();
  /**
   * @var int
   * Quota limit. It's safer to use attributes['developer.quota.limit'] instead.
   */
  public $quota = 0;
  /**
   * @var int
   * It's safer to use attributes['developer.quota.interval'] instead.
   */
  public $quotaInterval = 0;
  /**
   * @var string
   * It's safer to use attributes['developer.quota.timeunit'] instead.
   */
  public $quotaTimeUnit = '';
  /**
   * @var array
   * FIXME: the purpose of this member is unknown
   */
  public $scopes = array();

  /**
   * @var array
   */
  public $attributes = array();

  /**
   * @var bool
   */
  public $isPublic = TRUE;
}
