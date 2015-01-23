<?php

namespace Drupal\Driver\Cores;

use Drupal\Component\Utility\Random;

/**
 * Drupal core interface.
 */
interface CoreInterface {
  /**
   * Instantiate the core interface.
   *
   * @param string $drupalRoot
   *
   * @param string $uri
   *   URI that is accessing Drupal. Defaults to 'default'.
   *
   * @param \Drupal\Component\Utility\Random $random
   *   Random string generator.
   */
  public function __construct($drupalRoot, $uri = 'default', Random $random);

  /**
   * Return random generator.
   */
  public function getRandom();

  /**
   * Bootstrap Drupal.
   */
  public function bootstrap();

  /**
   * Clear caches.
   */
  public function clearCache();

  /**
   * Run cron.
   *
   * @return boolean
   *   True if cron runs, otherwise false.
   */
  public function runCron();

  /**
   * Create a node.
   */
  public function nodeCreate($node);

  /**
   * Delete a node.
   */
  public function nodeDelete($node);

  /**
   * Create a user.
   */
  public function userCreate(\stdClass $user);

  /**
   * Delete a user.
   */
  public function userDelete(\stdClass $user);

  /**
   * Add a role to a user.
   *
   * @param \stdClass $user
   *   The Drupal user object.
   * @param string
   *   The role name.
   */
  public function userAddRole(\stdClass $user, $role_name);

  /**
   * Validate, and prepare environment for Drupal bootstrap.
   *
   * @throws \Drupal\Driver\Exception\BootstrapException
   *
   * @see _drush_bootstrap_drupal_site_validate()
   */
  public function validateDrupalSite();

  /**
   * Create a taxonomy term.
   */
  public function termCreate(\stdClass $term);

  /**
   * Delete a taxonomy term,
   */
  public function termDelete(\stdClass $term);

  /**
   * Create a role
   *
   * @param array $permissions
   *   An array of permissions to create the role with.
   *
   * @return integer
   *   The created role name.
   */
  public function roleCreate(array $permissions);

  /**
   * Delete a role
   *
   * @param string $role_name
   *   A role name to delete.
   */
  public function roleDelete($role_name);

  /**
   * Creates a language.
   *
   * @param \stdClass $language
   *   An object with the following properties:
   *   - langcode: the langcode of the language to create.
   */
  public function languageCreate($language);

  /**
   * Deletes a language.
   *
   * @param \stdClass $language
   *   An object with the following properties:
   *   - langcode: the langcode of the language to delete.
   */
  public function languageDelete($language);

}
